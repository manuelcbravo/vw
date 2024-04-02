<?php

namespace App\Http\Controllers;

use App\Models\tbl_sucursale;
use Illuminate\Http\Request;
use App\Http\Traits\SecurityTrait;

use Auth;
use Str;
use Storage;

class TblSucursaleController extends Controller
{
    use SecurityTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $input = [ 'empresas' => new tbl_sucursale ];
        return view('pages.sucursales.index', ['active' => 'empresas', 'inputs' => $this->encryptName($input,$request) ]);
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

        if(!$store['id']){
            $store['id_usuario_reg'] = Auth::id();
        }

        tbl_sucursale::updateOrCreate(['id' => $store['id'] ?? null], $store);

        return response()->json(
            [
                'respuesta' => true,
                'mensaje' => "Acción realizada correctamente",
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_sucursale  $tbl_sucursale
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_sucursale $tbl_sucursale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_sucursale  $tbl_sucursale
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_sucursale $tbl_sucursale, $id , Request $request)
    {
        $data =tbl_sucursale::find($id);
        $show = $this->encryptShow($data, $request);

        return response()->json([
            'respuesta' => true,
            'posts' => $show
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_sucursale  $tbl_sucursale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_sucursale $tbl_sucursale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_sucursale  $tbl_sucursale
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_sucursale $tbl_sucursale, $id)
    {
        $user = tbl_sucursale::withTrashed()->find($id);
        $user ->delete();
        \Notificaciones::agregarLog('Registro eliminado', $id, "tbl_sucursale");

        return response()->json([
            'respuesta' => true,
        ], 200);
    }

    public function getSucursales()
    {
        $sucursales = tbl_sucursale::get();

        return response()->json([
            'data' => $sucursales ?? []
        ]);
    }
}
