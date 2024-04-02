<?php

namespace App\Http\Controllers;

use App\Models\tbl_encuesta_pregunta;
use App\Models\tbl_sucursale;
use Illuminate\Http\Request;

class TblEncuestaPreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\tbl_encuesta_pregunta  $tbl_encuesta_pregunta
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_encuesta_pregunta $tbl_encuesta_pregunta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_encuesta_pregunta  $tbl_encuesta_pregunta
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_encuesta_pregunta $tbl_encuesta_pregunta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_encuesta_pregunta  $tbl_encuesta_pregunta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_encuesta_pregunta $tbl_encuesta_pregunta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_encuesta_pregunta  $tbl_encuesta_pregunta
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_encuesta_pregunta $tbl_encuesta_pregunta)
    {
        //
    }

    public function getPreguntaGeneral($id){
        $nombre = tbl_sucursale::find($id);

        return response()->json([
            'respuesta' => true,
            'preguntas' => tbl_encuesta_pregunta::where('id_sucursal',$id)->orderBy('numero', 'asc')->get(),
            'nombre' => $nombre->nombre
        ], 200);
    }
    
    public function getPregunta($id){
        $nombre = tbl_sucursale::find($id);

        return response()->json([
            'respuesta' => true,
            'preguntas' => tbl_encuesta_pregunta::where('id_sucursal',$id)->orderBy('numero', 'asc')->get(),
            'nombre' => $nombre->nombre
        ], 200);
    }

    public function setAF(Request $request){
        $store = $this->decryptStore($request->all(), $request);
        $id_tratamiento = $store['id_tratamiento'];
        $pregunta = $store['pregunta'] ?? array();
        $tipo_pregunta = $store['tipo_pregunta'] ?? array();
        $numero = 1;
        $numero_preg = tbl_application_form_pregunta::where('id_tratamiento', $id_tratamiento)->where('idioma',App::getLocale())->count();
        if($numero_preg <> 0) $numero = $numero_preg + 1;
        for ($i = 0 ; $i < count($pregunta ?? 0); $i++){
            $respuesta = NULL;
            $especificar = NULL;
            if($pregunta[$i] <> ''){
                if($tipo_pregunta[$i] == 1){
                    $especificar = 1;
                }elseif($tipo_pregunta[$i] == 2){
                    $respuesta = 1;
                }elseif($tipo_pregunta[$i] == 3){
                    $respuesta = 1;
                    $especificar = 1;
                }
                tbl_application_form_pregunta::create(['id_tratamiento' => $id_tratamiento, 'pregunta' => $pregunta[$i], 'tipo_pregunta' => $tipo_pregunta[$i], 'respuesta' => $respuesta, 'especificar'=>$especificar, 'numero' => $numero, 'idioma' => App::getLocale()]);
                $numero += 1;
            }
        }

        return response()->json([
            'respuesta' => true,
            'mensaje' => "Preguntas registradas correctamente"
        ], 200);
    }

    public function setPreguntaAF(Request $request){
        $store = $this->decryptStore($request->all(), $request);
        $id_tratamiento = $store['id_tratamiento'];
        $pregunta = explode(",", $store['pregunta']);
        $numero = 1;
        for ($i = 0 ; $i < count($pregunta ?? 0); $i++){
            tbl_application_form_pregunta::where('id',$pregunta[$i])->where('id_tratamiento',$id_tratamiento)->update(['numero' => $numero]);
            $numero += 1;
        }
        return response()->json([
            'respuesta' => true,
            'mensaje' => "Preguntas actualizadas correctamente",
            'preguntas' => tbl_application_form_pregunta::where('id_tratamiento',$id_tratamiento)->orderBy('numero', 'asc')->get(),
        ], 200);
    }

    public function getPreguntaAF(Request $request)
    {
        return response()->json([
            'respuesta' => true,
        ], 200);
    }
}
