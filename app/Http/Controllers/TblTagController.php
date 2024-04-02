<?php

namespace App\Http\Controllers;

use App\Models\tbl_tag;
use Illuminate\Http\Request;
use App\Http\Traits\SecurityTrait;

use Auth;
use DB;

class TblTagController extends Controller
{
    use SecurityTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Modals_inpit_names= [ 'posts' => new tbl_tag ];

        return view('pages.blog.tags.index', ['active' => 'tags', 'inputs' => $this->encryptName($Modals_inpit_names, $request)]);
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

        $store = $this->decryptStore($request->all(), $request);
        // dd($request->all());
        $cadena = 'Tag registrado | ';
        if($request->id){
            $cadena = 'Tag editado | ';
        }
        
        $categoria = tbl_tag::updateOrCreate(['id' => $store['id'] ?? null],$store);
        // dd($store);

        $cadena .= $request->nombre;

        \Notificaciones::agregarLog($cadena, $categoria->id, "tbl_tag");

        return response()->json(
            [
                'respuesta' => true,
                'mensaje' => "Accion realizada correctamente"
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_tag  $tbl_tag
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_tag $tbl_tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_tag  $tbl_tag
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_tag $tbl_tag,$id, Request $request)
    {
        $show = $this->encryptShow(tbl_tag::find($id), $request);

        return response()->json([
            'status' => true,
            'tags' => $show
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_tag  $tbl_tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_tag $tbl_tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_tag  $tbl_tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_tag $tbl_tag,$id)
    {
        $row = tbl_tag::withTrashed()->find($id);
        $row ->delete();
        \Notificaciones::agregarLog('Registro eliminado desde Mi empresa - Usuarios ', $id, "tbl_tag");
        return response()->json([
            'status' => true,
        ], 200);
    }
    
    public function getTags(){
        if($user = tbl_tag::get()){
            return response()->json([
                'data' => $user
            ]);
        }else{
            return response()->json([
                'status' => false,
            ], 200);
        }
    }
}
