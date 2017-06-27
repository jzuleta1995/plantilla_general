<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(3);

        return view('aplicacion.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aplicacion.user.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        return "Grabo exitosamente";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        return view('aplicacion.user.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        return "Usuario exitosamente";


        /* return Redirect()->route('profesors.index')
             ->with('info', 'El profesor fue actualizado');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
