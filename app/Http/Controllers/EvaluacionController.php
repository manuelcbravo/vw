<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvaluacionController extends Controller
{
    
    public function index()
    {
        return view('pages.evaluacion.index', ['active' => 'evaluacion']);

    }
    public function create()
    {
        
    }
    


}