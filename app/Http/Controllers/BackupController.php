<?php
namespace App\Http\Controllers;

//if(!defined('BASEPATH')) exit('No direct acces allowed');

class BackupController extends Controller
{

    public function index()
    {

        echo exec('sudo -u empresarial /Library/PostgreSQL/9.5/bin/pg_dump --host localhost --port 5432 --username "postgres" --no-password  --format custom --verbose --file "/Applications/MAMP/htdocs/restore/copia_5" "bd_gestioncobranzas" 2>&1');

        /* $fecha_actual = date("Y-m-d");

        echo exec('sudo -u empresarial /Library/PostgreSQL/9.5/bin/pg_dump --host localhost --port 5432 --username "postgres" --no-password  --format custom --verbose --file "/Applications/MAMP/htdocs/restore/copia_"'.$fecha_actual.'" "bd_gestioncobranzas" 2>&1');
        */
        echo"<script type=\"text/javascript\">alert('Copia Realizada Satisfactoriamente'); </script>";
        return Redirect()->route('home');
    }
}
?>