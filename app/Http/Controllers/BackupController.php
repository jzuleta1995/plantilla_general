<?php
namespace App\Http\Controllers;

//if(!defined('BASEPATH')) exit('No direct acces allowed');

class BackupController extends Controller
{

    public function index()
    {
        $backup_nombre = "copia_restauracion_" . mktime(date("H"),date("i"),date("s"),date("m"),date("d"),date("Y")) ;
        echo exec('sudo -u empresarial /Library/PostgreSQL/9.5/bin/pg_dump --host localhost --port 5432 --username "postgres" --no-password  --format custom --verbose --file "/Applications/MAMP/htdocs/restore/'.$backup_nombre.'" "bd_gestioncobranzas" 2>&1');
        return Redirect()->route('home')->with('info', 'Copia de seguridad realizada satisfactoriamente!!');
    }
}
?>