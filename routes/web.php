<?php

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
Route::resource('/user', 'UserController');

Route::group(['prefix'  =>  '/', 'middleware'   =>  'auth'], function () {
    Route::resource('cliente', 'ClienteController');
    Route::resource('cobrador', 'CobradorController');
    Route::resource('prestamo', 'PrestamoController');
    Route::resource('cobroPrestamo', 'CobroPrestamoController');
    //Route::resource('excel', 'ExcelController');
    Route::resource('utilidadPrestamos', 'UtilidadPrestamosController');


   // Route::get('cliente/general', 'ClienteController@general')->name('cliente.general');
   // Route::get('excel/informe', 'ExcelController@informe')->name('excel.informe');

    Route::resource('excel', 'ExcelController');

    Route::name('excel.informe')
        ->post('/excel', 'ExcelController@informe');

    /*Route::get('/excel/cliente', 'ExcelController@index')->name('excel.index');
    Route::post('/excel/cliente  ', 'ExcelController@informe')->name('excel.informe');*/



    //Route::get('/home','HomeController@cargarVisor')->name('home');
    //Route::get('/generar-informe', 'ExcelController@general')->name('general');
    Route::name('home')
        ->get('/home', 'HomeController@cargarVisor');


    Route::DELETE('/eliminar-user/{id}', 'UserController@destroy')->name('destroy');

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/cliente', 'ClienteController@index')->name('index');
    Route::get('/autocomplete',
        array('as' => 'autocomplete',
            'uses' => 'AutocompleteController@autocomplete'
        ));


    //Route::resource('cliente/informes/general', 'ExcelController');

    Route::name('prestamo.utilidad')
        ->get('prestamo/informes/utilidad', 'UtilidadPrestamosController@cargarUtilidad');

    /**
     * Route::name('excel')
     * ->get('cliente/informes/general', 'ExcelController@index');**
     */

    /*Route::get('/excel/cargar',
        [
            'as' => 'aplicacion.cliente.general',
            'uses' => 'ExcelController@excel'
        ]);*/


    Route::get('pdf', function () {
        $users = App\User::all();

        dd($users);
        $pdf = PDF::loadview('prestamo.pdfUtilidad', ['users' => $users]);

        return $pdf->download('archivo.pdf');

    });

});
