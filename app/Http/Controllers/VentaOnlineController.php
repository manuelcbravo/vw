<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaOnlineController extends Controller
{
    
    public function index()
    {
        return view('pages.venta_online.index', ['active' => 'venta_online']);

    }
    public function create()
    {
        
    }
    


}