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
    
    public function create()
    {
        
    }
    public function index_ofertas()
{
    return view('pages.informes.ofertas.index', ['active' => 'ofertas']);
}
public function index_tipo_evaluaciones()
{
    return view('pages.informes.tiempo_evaluaciones.index', ['active' => 'tiempo_evaluaciones']);
}
public function index_tiempo_mesa()
    {
        return view('pages.informes.tiempo_mesa.index', ['active' => 'tiempo_mesa']);

    }
    public function index_informes_vehiculos()
    {
        return view('pages.informes.informes_vehiculos.index', ['active' => 'informes_vehiculos']);

    }
    


}