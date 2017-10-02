<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Cobrador;
use App\Prestamo;

use Illuminate\Http\Request;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ExcelController extends Controller
{

    /*************************************************/
    /**********************CLIENTE ********************/
    /************************************************/

    public function indexInformeCliente(Request $request)
    {
        return view('aplicacion.cliente.informes.general');
    }

    public function informeCliente(Request $request)
    {
        /*++++++++++++++++++++++++++++++++++++++++++++++*/
        /*********validaciones ***************************/

            if ($request->cliente_id =='' && $request->fecha_inicial == '' && $request->fecha_final == '') {
                return Redirect()->route('excel.informeCliente')
                    ->with('info', 'Debe Ingresar Como Minimo Un Campo Para general el Informe');
            }
            if (($request->fecha_inicial != '' && $request->fecha_final == '') || ($request->fecha_inicial == '' && $request->fecha_final != '')) {
                return Redirect()->route('excel.informeCliente')
                    ->with('info', 'Debe Ingresar Los Dos Campos De Fecha Para general el Informe');
            }

            if ($request->fecha_inicial > $request->fecha_final) {
                return Redirect()->route('excel.informeCliente')
                    ->with('info', 'La Fecha Desde No Puede ser Mayor Que LA Fecha Hasta ');
            }
        /*********fin validaciones ***************************/
        /*++++++++++++++++++++++++++++++++++++++++++++++*/

        $clientes = Cliente::join('users', 'users.id', '=', 'clientes.user_id')
            ->join('cobradors', 'cobradors.id', '=', 'clientes.cobrador_id')
            ->select(
                'clientes.id',
                'clientes.cliente_nombre',
                'clientes.cliente_apellido',
                'clientes.cliente_documento',
                'clientes.cliente_direccion_casa',
                'clientes.cliente_direccion_trabajo',
                'clientes.cliente_lugar_trabajo',
                'clientes.cliente_telefono',
                'clientes.cliente_celular',
                'clientes.cliente_ciudad',
                'clientes.cliente_estado',
                'cobradors.cobrador_nombre',
                'users.nombre',
                'clientes.cliente_fechacreacion');

        if ($request->cliente_id != '') {
            $clientes->where('clientes.id', '=', $request->cliente_id);
        }
        if ($request->fecha_inicial != '' && $request->fecha_final != '') {
            $clientes->whereBetween('clientes.cliente_fechacreacion', array($request->fecha_inicial, $request->fecha_final));
        }
        $clientes = $clientes->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $clientesArray = [];

        // Define the Excel spreadsheet headers
        $clientesArray[] = ['id_cliente', 'nombre cliente', 'apellido', 'documento', 'direccion casa', 'direccion trabajo', 'lugar trabajo', 'telefono', 'celular', 'ciudad', 'estado', 'cobrador', 'usuario creador', 'fecha hora creacion'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($clientes as $cliente) {
            $clientesArray[] = $cliente->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Clientes', function ($excel) use ($clientesArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($clientesArray) {
                $sheet->fromArray($clientesArray, null, 'A1', false, false);
            });
        })->export('xls');

    }
    /*************************************************/
    /**********************COBRADOR ********************/
    /************************************************/

    public function indexInformeCobrador(Request $request)
    {
        return view('aplicacion.cobrador.informes.general');
    }

    public function informeCobrador(Request $request)
    {
        /*++++++++++++++++++++++++++++++++++++++++++++++*/
        /*********validaciones ***************************/

            if ($request->cobrador_id =='' && $request->fecha_inicial == '' && $request->fecha_final == '') {
                return Redirect()->route('excel.informeCobrador')
                    ->with('info', 'Debe Ingresar Como Minimo Un Campo Para general el Informe');
            }
            if (($request->fecha_inicial != '' && $request->fecha_final == '') || ($request->fecha_inicial == '' && $request->fecha_final != '')) {
                return Redirect()->route('excel.informeCobrador')
                    ->with('info', 'Debe Ingresar Los Dos Campos De Fecha Para general el Informe');
            }

            if ($request->fecha_inicial > $request->fecha_final) {
                return Redirect()->route('excel.informeCobrador')
                    ->with('info', 'La Fecha Desde No Puede ser Mayor Que LA Fecha Hasta ');
            }
        /*********fin validaciones ***************************/
        /*++++++++++++++++++++++++++++++++++++++++++++++*/

        $clientes = Cobrador::join('users', 'users.id', '=', 'cobradors.user_id')
            ->select(
                'cobradors.id',
                'cobradors.cobrador_nombre',
                'cobradors.cobrador_apellido',
                'cobradors.cobrador_documento',
                'cobradors.cobrador_direccion',
                'cobradors.cobrador_telefono',
                'cobradors.cobrador_celular',
                'cobradors.cobrador_ciudad',
                'cobradors.cobrador_estado',
                'users.nombre',
                'cobradors.cobrador_fechacreacion');

        if ($request->cobrador_id != '') {
            $clientes->where('cobradors.id', '=', $request->cobrador_id);
        }
        if ($request->fecha_inicial != '' && $request->fecha_final != '') {
            $clientes->whereBetween('cobradors.cobrador_fechacreacion', array($request->fecha_inicial, $request->fecha_final));
        }
        $clientes = $clientes->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $clientesArray = [];

        // Define the Excel spreadsheet headers
        $clientesArray[] = ['id_cliente', 'nombre cliente', 'apellido', 'documento', 'direccion casa', 'direccion trabajo', 'lugar trabajo', 'telefono', 'celular', 'ciudad', 'estado', 'cobrador', 'usuario creador', 'fecha hora creacion'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($clientes as $cliente) {
            $clientesArray[] = $cliente->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Cobradores', function ($excel) use ($clientesArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($clientesArray) {
                $sheet->fromArray($clientesArray, null, 'A1', false, false);
            });
        })->export('xls');

    }
    /*************************************************/
    /**********************USUARIO ********************/
    /************************************************/

    public function indexInformeUSuario(Request $request)
    {
        return view('aplicacion.user.informes.general');
    }

    public function informeUsuario(Request $request)
    {

        /*++++++++++++++++++++++++++++++++++++++++++++++*/
        /*********validaciones ***************************/

            if ($request->fecha_inicial == '' && $request->fecha_final == '') {
                return Redirect()->route('excel.informeUsuario')
                    ->with('info', 'Debe Ingresar Como Minimo Un Campo Para general el Informe');
            }
            if (($request->fecha_inicial != '' && $request->fecha_final == '') || ($request->fecha_inicial == '' && $request->fecha_final != '')) {
                return Redirect()->route('excel.informeUsuario')
                    ->with('info', 'Debe Ingresar Los Dos Campos De Fecha Para general el Informe');
            }

            if ($request->fecha_inicial > $request->fecha_final) {
                return Redirect()->route('excel.informeUsuario')
                    ->with('info', 'La Fecha Desde No Puede ser Mayor Que LA Fecha Hasta ');
            }
        /*********fin validaciones ***************************/
        /*++++++++++++++++++++++++++++++++++++++++++++++*/

        //$users = User::join('cobradors', 'cobradors.user_id', '=', 'users.id')
        $users = DB::table('users')
            ->select(
                'users.id',
                'users.nombre',
                'users.apellido',
                'users.documento',
                'users.direccion',
                'users.telefono',
                'users.email',
                'users.tipo',
                'users.estado',
                'users.user_fechacreacion');

        if ($request->fecha_inicial != '' && $request->fecha_final != '') {
            $users->whereBetween('users.user_fechacreacion', array($request->fecha_inicial, $request->fecha_final));
        }
        $users = $users->get();

        $usersArray = [];

        // Define the Excel spreadsheet headers
        $usersArray[] = ['id_usuario', 'nombre', 'apellido', 'documento', 'direccion casa', 'telefono', 'fecha hora creacion'];

        foreach ($users as $user) {
            $usersArray[] = (Array)$user;
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Usuarios', function ($excel) use ($usersArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($usersArray) {
                $sheet->fromArray($usersArray);
            });
        })->export('xls');

    }
    /*************************************************/
    /**********************PRESTAMO ********************/
    /************************************************/

    public function indexInformePrestamo(Request $request)
    {
        return view('aplicacion.prestamo.informes.general');
    }

    public function informePrestamo(Request $request)
    {

        $clientes = Prestamo::join('clientes', 'clientes.id', '=', 'prestamos.cliente_id')
            ->join('cobradors', 'cobradors.id', '=', 'clientes.cobrador_id')
            ->join('users', 'users.id', '=', 'prestamos.user_id')
            ->select(
                'cobradors.cobrador_nombre_completo',
                'clientes.cliente_nombre_completo',
                'prestamos.id',
                'prestamos.prestamo_valor',
                'prestamos.prestamo_tasa',
                'prestamos.prestamo_tipo',
                'prestamos.prestamo_tiempo_cobro',
                'prestamos.prestamo_numero_cuotas',
                'prestamos.prestamo_fecha',
                'prestamos.prestamo_fecha_inicial',
                'prestamos.prestamo_fecha_proximo_cobro',
                'prestamos.prestamo_valor_abonado',
                'prestamos.prestamo_valor_actual',
                'prestamos.prestamo_valor_proxima_cuota',
                'prestamos.prestamo_estado',
                'prestamos.prestamo_utilidad_mes',
                'users.nombre_completo',
                'prestamos.prestamo_fechacreacion');


        if ($request->cobrador_id != '') {
            $clientes->where('clientes.cobrador_id', '=', $request->cobrador_id);
        }
        if ($request->cliente_id != '') {
            $clientes->where('prestamos.cliente_id', '=', $request->cliente_id);
        }
        if ($request->prestamo_estado != '') {
            $clientes->where('prestamos.prestamo_estado', '=', $request->prestamo_estado);
        }


        if ($request->prestamo_fecha != '' && $request->prestamo_fecha1 != '') {
            $clientes->whereBetween('prestamos.prestamo_fechacreacion', array($request->prestamo_fecha, $request->prestamo_fecha1));
        }
        if ($request->fecha_proximo_cobro != '' && $request->fecha_proximo_cobro1 != '') {
            $clientes->whereBetween('prestamos.prestamo_fecha_proximo_cobro', array($request->fecha_proximo_cobro, $request->fecha_proximo_cobro1));
        }
        $clientes = $clientes->get();

        $clientesArray = [];

        // Define the Excel spreadsheet headers
        $clientesArray[] = ['nombre cobrador', 'nombre cliente', 'codigo_prestamo', 'prestamo_valor', 'prestamo_tasa', 'prestamo_tipo', 'prestamo_tiempo_cobro', 'prestamo_numero_cuotas', 'prestamo_fecha', 'prestamo_fecha_inicial', 'prestamo_fecha_proximo_cobro', 'prestamo_valor_abono', 'prestamo_valor_actual', 'prestamo_valor_proxima_cuota', 'usuario creador', 'fecha hora creacion'];

        foreach ($clientes as $cliente) {
            $clientesArray[] = $cliente->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Prestamos', function ($excel) use ($clientesArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($clientesArray) {
                $sheet->fromArray($clientesArray, null, 'A1', false, false);
            });
        })->export('xls');

    }


    /*************************************************/
    /**********************RUTA COBRO ********************/
    /************************************************/

    public function indexInformeRutaCobro(Request $request)
    {
        return view('aplicacion.cobrador.informes.rutaCobro');
    }

    public function informeRutaCobro(Request $request)
    {
        /*++++++++++++++++++++++++++++++++++++++++++++++*/
        /*********validaciones ***************************/

            if ($request->cobrador_id == '' && $request->cliente_id == '' && $request->fecha_proximo_cobro == '' && $request->fecha_proximo_cobro1 == '') {
                return Redirect()->route('excel.informeAbono')
                    ->with('info', 'Debe Ingresar Como Minimo Un Campo Para general el Informe');
            }
            if (($request->fecha_proximo_cobro != '' && $request->fecha_proximo_cobro1 == '') || ($request->fecha_proximo_cobro == '' && $request->fecha_proximo_cobro1 != '')) {
                return Redirect()->route('excel.informeAbono')
                    ->with('info', 'Debe Ingresar Los Dos Campos De Fecha Para general el Informe');
            }

            if ($request->fecha_proximo_cobro > $request->fecha_proximo_cobro1) {
                return Redirect()->route('excel.informeAbono')
                    ->with('info', 'La Fecha Desde No Puede ser Mayor Que LA Fecha Hasta ');
            }
        /*********fin validaciones ***************************/
        /*++++++++++++++++++++++++++++++++++++++++++++++*/

        $clientes = Prestamo::join('clientes', 'clientes.id', '=', 'prestamos.cliente_id')
            ->join('cobradors', 'cobradors.id', '=', 'clientes.cobrador_id')
            ->join('users', 'users.id', '=', 'prestamos.user_id')
            ->select(
                'cobradors.cobrador_nombre_completo',
                'clientes.cliente_nombre_completo',
                'prestamos.prestamo_valor_abonado',
                'prestamos.prestamo_valor_actual',
                'prestamos.prestamo_valor_proxima_cuota',
                'prestamos.prestamo_fecha_proximo_cobro',
                'users.nombre_completo');


        if ($request->cobrador_id != '') {
            $clientes->where('clientes.cobrador_id', '=', $request->cobrador_id);
        }
        if ($request->cliente_id != '') {
            $clientes->where('prestamos.cliente_id', '=', $request->cliente_id);
        }

        if ($request->fecha_proximo_cobro != '' && $request->fecha_proximo_cobro1 != '') {
            $clientes->whereBetween('prestamos.prestamo_fecha_proximo_cobro', array($request->fecha_proximo_cobro, $request->fecha_proximo_cobro1));
        }
        $clientes = $clientes->get();

        // Initialize the array which will be passed into the Excel
        // generator.
        $clientesArray = [];

        // Define the Excel spreadsheet headers
        $clientesArray[] = ['nombre cobrador', 'nombre cliente', 'Valor abonado', 'Valor deuada Actual', 'Valor Cuota A Pagar', 'fecha cobro', 'usuario creador prestamo'];

        // Convert each member of the returned collection into an array,
        // and append it to the payments array.
        foreach ($clientes as $cliente) {
            $clientesArray[] = $cliente->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Ruta De Cobro', function ($excel) use ($clientesArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($clientesArray) {
                $sheet->fromArray($clientesArray, null, 'A1', false, false);
            });
        })->export('xls');

    }
    /*************************************************/
    /**********************ABONO ********************/
    /************************************************/


    public function indexInformeAbono(Request $request)
    {
        return view('aplicacion.abono.informes.general');
    }

    public function informeAbono(Request $request)
    {

        /*++++++++++++++++++++++++++++++++++++++++++++++*/
        /*********validaciones ***************************/

        if ($request->cobrador_id == '' && $request->cliente_id == '' && $request->abono_fecha == '' && $request->abono_fecha1 == '') {
            return Redirect()->route('excel.informeAbono')
                ->with('info', 'Debe Ingresar Como Minimo Un Campo Para general el Informe');
        }
        if (($request->abono_fecha != '' && $request->abono_fecha1 == '') || ($request->abono_fecha == '' && $request->abono_fecha1 != '')) {
            return Redirect()->route('excel.informeAbono')
                ->with('info', 'Debe Ingresar Los Dos Campos De Fecha Para general el Informe');
        }

        if ($request->abono_fecha > $request->abono_fecha1) {
            return Redirect()->route('excel.informeAbono')
                ->with('info', 'La Fecha Desde No Puede ser Mayor Que LA Fecha Hasta ');
        }
        /*********fin validaciones ***************************/
        /*++++++++++++++++++++++++++++++++++++++++++++++*/

        $clientes = Prestamo::join('clientes', 'clientes.id', '=', 'prestamos.cliente_id')
            ->join('cobradors', 'clientes.cobrador_id', '=', 'cobradors.id')
            ->join('abonos', 'abonos.prestamo_id', '=', 'prestamos.id')
            ->join('users', 'users.id', '=', 'abonos.user_id')
            ->select(
                'cobradors.cobrador_nombre_completo',
                'clientes.cliente_nombre_completo',
                'prestamos.id as codigo_prestamo',
                'abonos.id',
                'abonos.abono_tipo_pago',
                'abonos.abono_valor_cuota',
                'abonos.abono_valor',
                'abonos.abono_observacion',
                'abonos.abono_estado',
                'abonos.abono_fecha',
                'users.nombre_completo');


        if ($request->cobrador_id != '') {
            $clientes->where('clientes.cobrador_id', '=', $request->cobrador_id);
        }
        if ($request->cliente_id != '') {
            $clientes->where('prestamos.cliente_id', '=', $request->cliente_id);
        }

        if ($request->abono_fecha != '' && $request->abono_fecha1 != '') {
            $clientes->whereBetween('abonos.abono_fecha', array($request->abono_fecha, $request->abono_fecha1));
        }
        $clientes = $clientes->get();

        $clientesArray = [];

        // Define the Excel spreadsheet headers
        $clientesArray[] = ['nombre cobrador', 'nombre cliente', 'Codigo Prestamo', 'Codigo Abono', 'Tipo Pago', 'Valor Couta A Pagar', 'Valor Cuota Pagada', 'Observacion Abono', 'Estado Abono', 'Fech Abono', 'Usuario Creador Abono'];

        foreach ($clientes as $cliente) {
            $clientesArray[] = $cliente->toArray();
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Ruta De Cobro', function ($excel) use ($clientesArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($clientesArray) {
                $sheet->fromArray($clientesArray, null, 'A1', false, false);
            });
        })->export('xls');

    }

    /*************************************************/
    /**********************VISOR UTILIDAD ********************/
    /************************************************/


    public function indexInformeVisorUtilidad(Request $request)
    {
        return view('aplicacion.prestamo.informes.visorutilidad');
    }

    public function informeVisorUtilidad(Request $request)
    {


        //$users = User::join('cobradors', 'cobradors.user_id', '=', 'users.id')
        $users = DB::table('view_utilidaprestamos')
            ->select(
                'cobrador',
                'cliente',
                'valor_real_pagado',
                'valor_pagado_a_capital',
                'valor_pagado_a_interes',
                'fecha_cobroprestamo');


        if ($request->cobrador_id != '') {
            $users->where('view_utilidaprestamos.cobrador_id', '=', $request->cobrador_id);
        }

        if ($request->fecha_inicial != '' && $request->fecha_final != '') {
            $users->whereBetween('view_utilidaprestamos.fecha_cobroprestamo', array($request->fecha_inicial, $request->fecha_final));
        }

        $users = $users->get();

        $usersArray = [];

        // Define the Excel spreadsheet headers
        $usersArray[] = ['cobrador', 'cliente', 'valor pagado', 'valor pagado a capital', 'valor pagado a interes', 'fecha fecha pago cuota'];

        foreach ($users as $user) {
            $usersArray[] = (Array)$user;
        }

        // Generate and return the spreadsheet
        Excel::create('Informe Usuarios', function ($excel) use ($usersArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Payments');
            $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function ($sheet) use ($usersArray) {
                $sheet->fromArray($usersArray);
            });
        })->export('xls');

    }


    public function validadFechas($fechaDesde, $fechaHasta, $ruta)
    {

        if ($fechaDesde > $fechaHasta){
            return Redirect()->route($ruta)
                ->with('info', 'La Fecha Desde No Puede ser Mayor Que LA Fecha Hasta ');
         }
     }
}
