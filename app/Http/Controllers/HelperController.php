<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cat_role;
use App\Models\tbl_categoria;
use App\Models\tbl_tag;
use App\Models\tbl_notificacione;
use App\Models\cat_estado;
use App\Models\cat_municipio;
use App\Models\User;

use DB;
use Auth;

class HelperController extends Controller
{
    public function getCatalogos(){
        return response()->json([
            'rol' => cat_role::where('id', '<>', 0)->get(),
            'tags' => tbl_tag::oldest()->get(),
            'categorias' => tbl_categoria::oldest()->get(),
            'estados' => cat_estado::orderBy('id','asc')->get(),
            'municipios' => cat_municipio::orderBy('municipio','asc')->get(),
        ]);
    }

    public function saveToken(Request $request){
        if(tbl_device_tokens::where('id_asesor',Auth::user()->id)->where('device_token',$request->token)->count() > 0){
            return response()->json(['already saved.']);
        }else{
            if(tbl_device_tokens::create(['device_token'=>$request->token , 'id_asesor' => Auth::user()->id])) {
                return response()->json(['token saved successsfully.']);
            }else{
                return response()->json(['not saved.']);
            }
        }
    }
    //// demo notificaciones
    public function sendNotification($id){
        \Notificaciones::sendNotification('Prueba','Esto es una prueba',0,$id);
        \Notificaciones::addNotificacion(3,$id,'prueba notificación','');
    }

    public function notificaciones($id){
        User::where('id',$id)->update(['visto'=>1]);
        return response()->json([
            'status' => true,
        ], 200);
    }

    public function getNotificaciones($id){
        $notificaciones = tbl_notificacione::select('tbl_notificaciones.*', DB::raw("CONCAT_WS(' ', users.name, users.apellidos) AS nombre_completo"))
            ->join('users', 'tbl_notificaciones.id_emisor', '=', 'users.id')->orderBy('tbl_notificaciones.id', 'desc')
            ->where('id_receptor', '=', Auth::user()->id)->paginate(8);

        $user = User::select('visto')->where('id', $id)->first();

        return response()->json([
            'notificaciones' => $notificaciones,
            'visto' => $user->visto,
            'status' => true,
        ], 200);
    }
}
