<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformesController extends Controller
{
    
    public function index_analisis_de_capturas()
    {
        return view('pages.informes.analisis_de_capturas.index', ['active' => 'analisis_de_capturas']);

    }

    public function index_evaluaciones_modificadas()
    {
        return view('pages.informes.evaluaciones_modificadas.index', ['active' => 'evaluaciones_modificadas']);

    }
    public function index_con_precio()
    {
        return view('pages.informes.con_precio.index', ['active' => 'con_precio']);

    }
    public function index_informes_de_los_vehiculos()
    {
        return view('pages.informes.informes_de_los_vehiculos.index', ['active' => 'informes_de_los_vehiculos']);

    }
    public function index_evaluaciones_por_venta()
    {
        return view('pages.informes.evaluaciones_por_venta.index', ['active' => 'evaluaciones_por_venta']);

    }
    public function index_oferta()
    {
        return view('pages.informes.oferta.index', ['active' => 'oferta']);

    }
    public function index_tiempo_de_mesa()
    {
        return view('pages.informes.tiempo_de_mesa.index', ['active' => 'tiempo_de_mesa']);

    }
    public function index_tipo_de_evaluacion()
    {
        return view('pages.informes.tipo_de_evaluacion.index', ['active' => 'tipo_de_evaluacion']);

    }
    public function create()
    {
        
    }
    


}