<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
       // dd($request->get('nombre'));
        //listar con scope
        $users = User::nombre($request->get('nombre'))->orderBy('id', 'ASC')->paginate(3);
       //listar normal
        //$users = User::orderBy('id', 'ASC')->paginate(3);

        return view('aplicacion.user.index')->with('users', $users);
    }

    public function create()
    {
        return view('aplicacion.user.create', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        return Redirect()->route('user.index')
            ->with('info', 'Cliente registrado  exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('aplicacion.user.edit', compact('users'));
    }

    public function update(UserRequest $request, $id)
    {
        $users = User::find($id);

       // dd($users);

        $users->nombre             = $request->nombre;
        $users->apellido           = $request->apellido;
        $users->documento          = $request->documento;
        $users->direccion          = $request->direccion;
        $users->telefono           = $request->telefono;
        $users->email              = $request->email;
        $users->pregunta_id        = $request->pregunta_id;
        $users->respuesta_secreta  = $request->respuesta_secreta;
        $users->estado             = $request->estado;

        $users->save();
        return Redirect()->route('user.index')
            ->with('info', 'Usuario Actualizado  exitosamente');

    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $users =User::find($id);
            $users->delete();
            $users_total = User::all()->count();

            return response()->json([
                'total'   => $users_total,
                'message' => $users->nombre .' fue eliminado correctamente'

            ]);
        }
    }
}
