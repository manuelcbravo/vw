<?php

namespace App\Http\Controllers;

use App\Models\tbl_categoria;
use Illuminate\Http\Request;
use App\Http\Traits\SecurityTrait;

use Auth;
use DB;

class TblCategoriaController extends Controller
{
    use SecurityTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Modals_inpit_names= [ 'posts' => new tbl_categoria ];

        return view('pages.blog.categorias.index', ['active' => 'categorias', 'inputs' => $this->encryptName($Modals_inpit_names, $request)]);
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
        $cadena = 'Categoría registrado | ';
        if($request->id){
            $cadena = 'Categoría editado | ';
        }
        
        $categoria = tbl_categoria::updateOrCreate(['id' => $store['id'] ?? null],$store);

        $cadena .= $request->nombre;

        \Notificaciones::agregarLog($cadena, $categoria->id, "tbl_categoria");

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
     * @param  \App\Models\tbl_categoria  $tbl_categoria
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_categoria $tbl_categoria, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_categoria  $tbl_categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_categoria $tbl_categoria,$id, Request $request)
    {
        $show = $this->encryptShow(tbl_categoria::find($id), $request);

        return response()->json([
            'status' => true,
            'categoria' => $show
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_categoria  $tbl_categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_categoria $tbl_categoria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_categoria  $tbl_categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_categoria $tbl_categoria, $id)
    {
        $user = tbl_categoria::withTrashed()->find($id);
        $user ->delete();
        \Notificaciones::agregarLog('Registro eliminado desde Mi empresa - Usuarios ', $id, "tbl_categoria");
        return response()->json([
            'status' => true,
        ], 200);
    }

    public function getCategorias(){
        if($user = tbl_categoria::oldest()->get()){
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
