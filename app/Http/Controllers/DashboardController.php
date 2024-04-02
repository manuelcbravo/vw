<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexGeneral(){
        return view('pages.dashboard.general.index',['active' => 'dash_general']);
    }
    
    public function getGeneral($tipo, $fecha_inicio, $fecha_fin){
        
    }

    public function indexEncuesta(){
        return view('pages.dashboard.encuestas.index',['active' => 'dash_encuesta']);

    }
    
    public function getEncusta($tipo, $fecha_inicio, $fecha_fin){
        
    }
    
    public function indexEncuestaSuc(){
        return view('pages.dashboard.sucursal.index',['active' => 'dash_sucursal']);

    }
    
    public function getEncustaSuc($tipo, $fecha_inicio, $fecha_fin){
        
    }
}
