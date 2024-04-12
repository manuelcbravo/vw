<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaExpressController extends Controller
{
    
    public function index()
    {
        return view('pages.venta_express.index', ['active' => 'venta_express']);

    }
    public function create()
    {
        
    }
    


}