<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::nombre($request->get('nombre'))
                 ->orderBy('id', 'ASC')
                 ->paginate(30);

        return view('aplicacion.user.index')
               ->with('users', $users);
    }

    public function create()
    {
        return view('aplicacion.user.create', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->nombre               = trim(strtoupper($request->nombre));
        $user->apellido             = trim(strtoupper($request->apellido));
        $user->nombre_completo      = trim(strtoupper($request->nombre . " " . $request->apellido));
        $user->documento            = trim($request->documento);
        $user->direccion            = trim(strtoupper($request->direccion));
        $user->telefono             = trim($request->telefono);
        $user->email                = trim($request->email);
        $user->password             = bcrypt($request->password);
        $user->pregunta_secreta     = $request->pregunta_secreta;
        $user->respuesta_secreta    = $request->respuesta_secreta;
        $user->tipo                 = $request->tipo;
        $user->estado               = $request->estado;
        $user->user_fechacreacion   = date("Y-m-d");

        //dd($user->password);

        $user->save();

        return Redirect()->route('user.index')
               ->with('info', 'El usuario ' . $user->nombre_completo . ' ha sido registrado  exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('aplicacion.user.edit', compact('user'));
    }

    public function update(UserEditRequest $request, $id)
    {
        $user = User::find($id);

        $user->nombre           = trim(strtoupper($request->nombre));
        $user->apellido         = trim(strtoupper($request->apellido));
        $user->nombre_completo  = trim(strtoupper($request->nombre . " " . $request->apellido));
        $user->documento        = $request->documento;
        $user->direccion        = trim(strtoupper($request->direccion));
        $user->telefono         = $request->telefono;
        $user->email            = $request->email;
        $user->tipo             = $request->tipo;
        $user->estado           = $request->estado;
        $user->save();

        return Redirect()->route('user.index')
               ->with('info', 'El usuario ' . $user->nombre_completo . ' ha sido actualizado  exitosamente');
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $users = User::find($id);
            $users->delete();
            $users_total = User::all()->count();

            return response()->json([
                'total'   => $users_total,
                'message' => $users->nombre .' fue eliminado correctamente'
            ]);
        }
    }

    public function indexcambioClave(Request $request)
    {        //dd("ingrese");
        return view('aplicacion.user.procedimientos.cambioClave');
    }

    public function cambioClave(Request $request)
    {
    // dd(bcrypt($request->nueva_password));

        if($request->nueva_password != $request->confirmacion_password){
            return Redirect()->route('user.cambioClave')
                ->with('info', 'La Contraseña Nueva ' . $request->nueva_password . ' no coincide con la contraseña de confirmacion '.$request->confirmacion_password);
        }

        $usuarios = User::find( Auth::id());

        $clave_encriptada     = $usuarios->password;
        $clave_sin_encriptadar = $request->password;
        $clave_nueva          = $request->nueva_password;

        //se valida si la clave actual es igual a la clave nueva
        if(Hash::check($clave_nueva, $clave_encriptada)){
            return Redirect()->route('user.cambioClave')
                ->with('info', 'La Contraseña Nueva  ' . $request->password . ' Debe Ser diferente a la Contraseña Guardada');
        }

       //se valida que la clave actual sin encriptar, sea igual a la clave encritada
        if(Hash::check($clave_sin_encriptadar, $clave_encriptada)){
            $usuarios->password           = bcrypt($request->nueva_password);
            $usuarios->save();
            //se desloguea de la aplicacion para que ingrese con la nueva clave
            Auth::logout();

            return redirect('/');

         }else{
            return Redirect()->route('user.cambioClave')
                ->with('info', 'La Contraseña Actual ' . $request->password . ' no coincide con la contraseña de Guardada');
         }
   }


    public function retornarRespuestaSecreta(Request $request, $email)
    {
        $users = DB::select('select id as codigo_usuario, pregunta_secreta from users where email = ?', [$email]);

        if($request->ajax()){
            return response()->json($users[0]);
        }
    }

    public function nuevaClave(Request $request)
    {

        if ($request->email !='' && $request->email!= 'null'){

                /* se trae la respuesta secreta con el correo ingresado*/
                //$users = DB::select('select respuesta_secreta from users where email = ?', [$request->email]);

                $usuarios = User::find($request->id);
                $respuesta_secreta     = trim(strtoupper($usuarios->respuesta_secreta));

                if($respuesta_secreta == trim(strtoupper($request->respuesta_secreta))) {

                        if($request->nueva_password != $request->confirmacion_password){
                            return Redirect()->route('password.nuevaClave')
                                ->with('info', 'La Contraseña Nueva  no coincide con la Contraseña de Confirmacion ');
                        }else{
                            $usuarios->password           = bcrypt($request->nueva_password);
                            $usuarios->save();
                            //se desloguea de la aplicacion para que ingrese con la nueva clave
                            Auth::logout();
                            return redirect('/');
                        }

                }else{
                    return Redirect()->route('password.nuevaClave')
                        ->with('info', 'La Respuesta Secreta Es Incorrecta');
                }

        }else{
            return Redirect()->route('password.nuevaClave')
                ->with('info', 'Debe Digitar Un Correo Valido');
        }

    }

    public function validaPasswordAdmin(Request $request)
    {
        $usuarios = User::find( Auth::id());

        $clave_encriptada     = $usuarios->password;
        $clave_sin_encriptadar = $request->input('psw');

        //se valida que la clave actual sin encriptar, sea igual a la clave encritada
        if(Hash::check($clave_sin_encriptadar, $clave_encriptada)) {

            if($request->ajax()){
                return response()->json($usuarios[0]);
            }
        }else{

            if($request->ajax()){
                return response()->view('errors.500', [], 500);
            }
        }

    }
}
