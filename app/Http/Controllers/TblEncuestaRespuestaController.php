<?php

namespace App\Http\Controllers;

use App\Models\tbl_encuesta_respuesta;
use App\Models\tbl_encuesta;
use App\Models\tbl_encuesta_pregunta;
use App\Models\tbl_sucursale;
use Illuminate\Http\Request;
use App\Http\Traits\SecurityTrait;

class TblEncuestaRespuestaController extends Controller
{
    use SecurityTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = [ 'encuestas' => new tbl_encuesta, 'sucursales' => new tbl_sucursale];

        return view('pages.encuestas.respuestas.index', ['active' => 'respuestas', 'inputs' => $this->encryptName($input,$request) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_encuesta_respuesta  $tbl_encuesta_respuesta
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_encuesta_respuesta $tbl_encuesta_respuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_encuesta_respuesta  $tbl_encuesta_respuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_encuesta_respuesta $tbl_encuesta_respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_encuesta_respuesta  $tbl_encuesta_respuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_encuesta_respuesta $tbl_encuesta_respuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_encuesta_respuesta  $tbl_encuesta_respuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_encuesta_respuesta $tbl_encuesta_respuesta)
    {
        //
    }

    public function getRespuestas() {
        $sucursales = tbl_sucursale::get();

        return response()->json([
            'data' => $sucursales ?? []
        ]);
    }
}
