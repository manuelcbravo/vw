<?php

namespace App\Http\Controllers;

use App\tbl_archivo;
use App\tbl_propiedade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use DB;
use Auth;
use File;
use Response;

class TblArchivoController extends Controller
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
        if($request->file('file')) {
            $image = $request->file('file');
            $imageName = Str::uuid(). '.' . $image->extension();
            $img = tbl_archivo::create(['id_propiedad' => $request->id_propiedad, 'nombre' => $image->getClientOriginalName(), 'nombre_original' => $image->getClientOriginalName(), 'tamaño' => $image->getSize(), 'tipo' => $image->extension(), 'id_tipo' => $request->id_tipo, 'direccion' => 'permisoVenta/'.$imageName, 'id_usuario_reg' => auth()->user()->id]);
            //$image->move(public_path('documentos'),$imageName);
            Storage::disk('permisoVenta')->put($imageName, file_get_contents($request->file('file')));
            \Notificaciones::agregarLog("Permiso de venta ".$image->getClientOriginalName()." de la propiedad agregado", 0, $img->id,"tbl_archivos"); //$request->id_lead_doc
            return response()->json(['success' => $img]);
        }

        if($request->id_d){
            tbl_archivo::where('id','=',$request->id_d)->update($request->except(['id_d']));
            return response()->json(['success' => "completado"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\tbl_archivo  $tbl_archivo
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_archivo $tbl_archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\tbl_archivo  $tbl_archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_archivo $tbl_archivo,$id)
    {
        $nombre = tbl_propiedade::where('id', '=', $id)->first();

        return response()->json([
            'status' => true,
            'documentos' => tbl_archivo::where('id_propiedad',"=",$id)->where('id_tipo', '=', 1)->get(),
            'nombre' => $nombre->nombre
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\tbl_archivo  $tbl_archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_archivo $tbl_archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\tbl_archivo  $tbl_archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_archivo $tbl_archivo,$id)
    {
        $documento = tbl_archivo::withTrashed()->find($id);
        $documento ->delete();

        \Notificaciones::agregarLog("Documento de la propiedad eliminado",0, $id ,"tbl_archivos");

        return response()->json([
            'status' => true,
            'documentos' => tbl_archivo::where('id_propiedad',"=",$documento->id_propiedad)->where('id_tipo', '=', $documento->id_tipo)->get(),
        ], 200);
    }

    public function archivospdf($id){
        $nombre = tbl_propiedade::where('id', '=', $id)->first();

        return response()->json([
            'status' => true,
            'documentos' => tbl_archivo::where('id_propiedad',"=",$id)->where('id_tipo', '=', 2)->get(),
            'nombre' => $nombre->nombre
        ], 200);
    }

    public function getDocumentos($path,$filename){
        $path = storage_path('app/'.$path.'/'.$filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
