<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SolicitarEvaluacionController extends Controller
{
    
    public function index()
    {
        return view('pages.solicitar_evaluacion.index', ['active' => 'solicitar_evaluacion']);

    }
    public function create()
    {
        
    }
    


}