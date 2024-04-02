<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_sucursale;

class EncuestaGuestController extends Controller
{
    public function index_encuesta_landing($id){
        $sucursal = tbl_sucursale::find($id);
        return view('pages.encuesta_guest.encuesta_landing');
    }
    
    public function index_encuesta($id){
        $sucursal = tbl_sucursale::find($id);
        return view('pages.encuesta_guest.encuesta');
    }
}
