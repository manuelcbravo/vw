<?php

namespace App\Http\Controllers;

use App\Models\tbl_post;
use Illuminate\Http\Request;
use App\Http\Traits\SecurityTrait;
use App\Http\Traits\ImageTrait;

use Auth;
use Str;
use Config;

class TblPostController extends Controller
{
    use SecurityTrait;
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $Modals_inpit_names= [ 'posts' => new tbl_post ];
        
        return view('pages.blog.posts.index', ['active' => 'post', 'inputs' => $this->encryptName($Modals_inpit_names, $request)]);
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
        $categoria = $this->encryptSingle('categoria',$request);
        $tags = $this->encryptSingle('tags',$request);

        $request->merge([ $categoria => implode(',', $request->$categoria),
        $tags => implode(',', $request->$tags)]);

        $store = $this->decryptStore($request->all(), $request);
      
        if(array_key_exists('img_portada', $store)){
            $image = $store['img_portada'];
            $imageName = Str::uuid(). '.' . $image->extension();
            $this->guardar_imagen($image, $imageName, 'posts',);

            $store['img_portada'] = $imageName;
        }

        $store['slug'] = Str::slug($store['titulo']);

        $categoria = tbl_post::updateOrCreate(['id' => $store['id'] ?? null], $store);

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
     * @param  \App\Models\tbl_post  $tbl_post
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_post $tbl_post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_post  $tbl_post
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_post $tbl_post, $id , Request $request)
    {
        $show = $this->encryptShow(tbl_post::find($id), $request);

        return response()->json([
            'status' => true,
            'posts' => $show
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_post  $tbl_post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_post $tbl_post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_post  $tbl_post
     * @return \Illuminate\Http\Response
     */
    public function destroy(tbl_post $tbl_post, $id)
    {
        $user = tbl_post::withTrashed()->find($id);
        $user ->delete();
        \Notificaciones::agregarLog('Registro eliminado', $id, "tbl_posts");

        return response()->json([
            'status' => true,
        ], 200);
    }

    public function setStatus(Request $request){
        // dd($request->all());
        tbl_post::where('id', $request->id)->update($request->all());

        return response()->json([
                'respuesta' => true,
                'mensaje' => "Estatus cambiado correctamente"
            ]
        );
    }

    public function getPosts(){
        if($user = tbl_post::get()){
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
