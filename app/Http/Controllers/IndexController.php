<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    //
    public function configuracion(){
        return view('configuracion');
    }

    public function paciente(){
        return view('paciente');
    }

    public function pmedicas(){
        return view('p-medicas');
    }

    public function resultado(){
        return view('resultado');
    }

}
