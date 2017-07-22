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

Auth::routes();

Route::resource('/user', 'UserController', [
    'except' =>  ['destroy']
]);

Route::group(['prefix'  =>  '/admin', 'middleware'   =>  'auth'], function () {

    Route::resource('cobrador', 'CobradorController' , [
        'except' =>  ['destroy']
    ]);

    Route::name('home')
          ->get('/home', 'HomeController@cargarVisor');

    Route::resource('cliente', 'ClienteController', [
        'except' => ['destroy']
    ]);

    Route::resource('prestamo', 'PrestamoController', [
        'except' => ['edit', 'update', 'destroy']
    ]);

    Route::resource('abono', 'AbonoController', [
        'only' => ['create', 'store']
    ]);

    Route::get('/abono/create/{prestamo_id}',
        array('as' => 'abono.create',
              'uses' => 'AbonoController@create'
        )
    );

    Route::get('/autocomplete',
        array('as' => 'autocomplete',
            'uses' => 'AutocompleteController@autocomplete'
        ));

    Route::resource('utilidadPrestamos', 'UtilidadPrestamosController');

    Route::resource('excel', 'ExcelController');

    Route::name('excel.informe')
         ->post('/excel', 'ExcelController@informe');

    Route::name('color')
        ->get('/home/color', 'HomeController@index');



    Route::name('prestamo.utilidad')
        ->get('prestamo/informes/utilidad', 'UtilidadPrestamosController@cargarUtilidad');

    Route::get('pdf', function () {
        $users = App\User::all();

       // dd($users);
        $pdf = PDF::loadview('aplicacion.prestamo.informes.pdfUtilidad', ['users' => $users]);

        return $pdf->download('archivo.pdf');

    });

});
