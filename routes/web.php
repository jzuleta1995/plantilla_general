<?php

use Barryvdh\DomPDF\Facade AS PDF;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::name('pepito')
 ->get('/olvidastecontrasena', function () {
    return view('auth.passwords.nuevaClave');
});


Auth::routes();

Route::resource('/user', 'UserController', [
    'except' =>  ['destroy']
]);

Route::name('password.nuevaClave')
    ->post('/olvidastecontrasena', 'UserController@nuevaClave');

Route::get('/user/retornarRespuestaSecreta/{user_correo}',
    array('as' => 'user.retornarRespuestaSecreta',
        'uses' => 'UserController@retornarRespuestaSecreta'
    )
);

/*Route::name('pepito2')
    ->post('/olvidastecontrasena', 'UserController@nuevaClave');*/


Route::group(['prefix'  =>  '/admin', 'middleware'   =>  'auth'], function () {



    Route::name('home')
          ->get('/home', 'HomeController@cargarVisor');

    Route::resource('cliente', 'ClienteController', [
        'except' => ['destroy']
    ]);


//INICIO ABONO
        Route::resource('abono', 'AbonoController', [
            'only' => ['create', 'store']
        ]);

        Route::get('/abono/create/{prestamo_id}',
            array('as' => 'abono.create',
                  'uses' => 'AbonoController@create'
            )
        );

        Route::get('/abono/view/{prestamo_id}',
            array('as' => 'abono.view',
                'uses' => 'AbonoController@view'
            )
        );

        Route::post('/abono/updateAnulaAbono/{abono_id}',
            array('as' => 'abono.updateAnulaAbono',
                'uses' => 'AbonoController@updateAnulaAbono'
            )
        );


    //FIN ABONO

    //INICIO AUTOCOMPLETE

    Route::get('/autocomplete',
        array('as' => 'autocomplete',
            'uses' => 'AutocompleteController@autocomplete'
        ));
    //FIN AUTO COMPLETE


    //Route::resource('excel', 'ExcelController');

    //INIDIO INFORMES EXCEL

        Route::name('excel.indexInformeCliente')
            ->get('/excel/cliente', 'ExcelController@indexInformeCliente');

        Route::name('excel.informeCliente')
             ->post('/excel/cliente', 'ExcelController@informeCliente');

        Route::name('excel.indexInformeCobrador')
            ->get('/excel/cobrador', 'ExcelController@indexInformeCobrador');

       Route::name('excel.informeCobrador')
            ->post('/excel/cobrador', 'ExcelController@informeCobrador');

       Route::name('excel.indexInformeUsuario')
            ->get('/excel/user', 'ExcelController@indexInformeUsuario');

        Route::name('excel.informeUsuario')
        ->post('/excel/user', 'ExcelController@informeUsuario');

   //FIN INFORMES EXCEL


    //INICIO USUARIOS

        Route::name('user.indexcambioClave')
            ->get('/user/procedimientos/cambioclave', 'UserController@indexcambioClave');

        Route::name('user.cambioClave')
            ->post('/user/procedimientos/cambioclave', 'UserController@cambioClave');

        Route::get('/user/validaPasswordAdmin',
            array('as' => 'user.validaPasswordAdmin',
                'uses' => 'UserController@validaPasswordAdmin'
            )
        );
    //FIN USUARIOS

 // INICIO COBRADOR
        Route::resource('cobrador', 'CobradorController' , [
            'except' =>  ['destroy']
        ]);

        Route::name('cobrador.indexAsignaCobradorACliente')
            ->get('/cobrador/procedimientos/AsignaCobradorACliente', 'CobradorController@indexAsignaCobradorACliente');

        Route::name('cobrador.CargarClienteCobrador')
            ->get('/cobrador/procedimientos/CargarClienteCobrador', 'CobradorController@CargarClienteCobrador');

        Route::name('cobrador.AsignaCobradorACliente')
            ->get('/cobrador/procedimientos/AsignaCobradorAClientes', 'CobradorController@AsignaCobradorACliente');

    //FIN COBRADOR


  // INICIO PRESTAMO
        Route::resource('prestamo', 'PrestamoController', [
            'except' => ['edit', 'update', 'destroy']
        ]);

       Route::name('prestamo.utilidad')
        ->get('prestamo/informes/utilidad', 'PrestamoController@utilidad');

       /* Route::name('prestamo.utilidad2')
            ->get('/prestamo/informes/utilidad', 'UtilidadPrestamosController@cargarUtilidad');*/

        Route::resource('utilidadPrestamos', 'UtilidadPrestamosController');

        Route::get('/prestamo/view/{prestamo_id}',
            array('as' => 'prestamo.view',
                'uses' => 'PrestamoController@view'
            )
        );

        Route::post('/prestamo/updateAnulaPrestamo/{prestamo_id}',
            array('as' => 'prestamo.updateAnulaPrestamo',
                'uses' => 'PrestamoController@updateAnulaPrestamo'
            )
        );

        Route::get('/prestamo/validaUnicoPrestamoCliente/{cliente_id}',
            array('as' => 'prestamo.validaUnicoPrestamoCliente',
                'uses' => 'PrestamoController@validaUnicoPrestamoCliente'
            )
        );

    //FIN PRESTAMOS

    //OTRAS RUTAS
        Route::name('color')
            ->get('/home/color', 'HomeController@index');
    //FIN OTRAS RUTAS

    Route::get('pdf', function () {
        $users = App\User::all();

       // dd($users);
        $pdf = PDF::loadview('aplicacion.prestamo.informes.pdfUtilidad', ['users' => $users]);

        return $pdf->download('archivo.pdf');

    });

});


