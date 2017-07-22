<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::nombre($request->get('nombre'))
                 ->orderBy('id', 'ASC')
                 ->paginate(3);

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
}
