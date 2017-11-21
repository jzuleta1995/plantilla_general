<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $fecha_actual = date("Y-m-d");

        //dd($fecha_actual);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'estado' => 'ACTIVO']) &&  $fecha_actual < '2018-01-31') {
            // Authentication passed...
            return redirect()->intended('admin/home');
        } else {
            $errors = ['email' => trans('auth.failed')];

            return redirect()->back()
                ->withErrors($errors);
        }
    }
}