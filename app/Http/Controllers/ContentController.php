<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth, Mail, Str, Image, Config;
use App\Mail\UserSendRecover;
use App\Mail\UserSendNewPassword;
use App\User; 
use App\Http\Models\Demo;

class ContentController extends Controller
{
    public function getHome(){  
        $archivo = "contador.txt"; //el archivo de texto que contendra las visitas
        $f = fopen($archivo, "r"); //abrimos el fichero en modo de lectura
        if($f)
        {
            $contadorvisitas = fread($f, filesize($archivo)); //vemos el archivo de texto
            $contadorvisitas = $contadorvisitas + 1; //Le sumamos +1 al contador de visitas
            fclose($f);
        }   
        $f = fopen($archivo, "w+");
        if($f)
        {
            fwrite($f, $contadorvisitas);
            fclose($f);
        }
        return view('sitio.home');     
    } 



}             
