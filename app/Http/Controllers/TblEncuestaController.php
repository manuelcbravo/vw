<?php

namespace App\Http\Controllers;

use App\Models\tbl_encuesta;
use App\Models\tbl_encuesta_pregunta;
use App\Models\tbl_sucursale;
use Illuminate\Http\Request;
use App\Http\Traits\SecurityTrait;

use Auth;
use Str;
use Storage;

class TblEncuestaController extends Controller
{

    use SecurityTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = [ 'encuestas' => new tbl_encuesta, 'sucursales' => new tbl_sucursale, 'application' => new tbl_encuesta_pregunta ];

        return view('pages.encuestas.index', ['active' => 'encuestas', 'inputs' => $this->encryptName($input,$request) ]);
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
     * @param  \App\Models\tbl_encuesta  $tbl_encuesta
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_encuesta $tbl_encuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_encuesta  $tbl_encuesta
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_encuesta $tbl_encuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_encuesta  $tbl_encuesta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_encuesta $tbl_encuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_encuesta  $tbl_encuesta
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_encuesta $tbl_encuesta)
    {
        //
    }

    public function setEncuestasActiva(Request $request)
    {
        tbl_sucursale::where('id',$request->id)->update(['activo'=>$request->check]);

        return response()->json([
            'respuesta' => true,
        ], 200);

    }
    
    public function setEncuestasTipo(Request $request)
    {
        tbl_sucursale::where('id',$request->id)->update(['encuesta'=>$request->check]);

        return response()->json([
            'respuesta' => true,
        ], 200);
    }

    public function getEncuestas() {
        $sucursales = tbl_sucursale::get();

        return response()->json([
            'data' => $sucursales ?? []
        ]);
    }
}
