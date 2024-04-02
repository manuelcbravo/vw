<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VoiceGrant;
use Twilio\Jwt\ClientToken;

use Storage;
use Auth;
use DB;

class LlamadasController extends Controller
{
    public function index($id){
        $contacto = tbl_contacto::find($id);

        return view('llamadas.index',[
            'id'=>$id,
            'prospecto' => $contacto ,
           ]);
    }

    public function newToken(Request $request){
        $accountSid = getenv('TWILIO_ACCOUNT_SID');
        $applicationSid = getenv('TWILIO_APPLICATION_SID');
        $apiKey = getenv('API_KEY');
        $apiSecret = getenv('API_SECRET');

        $token = new AccessToken(
            $accountSid,
            $apiKey,
            $apiSecret,
            3600,
            'support_agent'
        );

        // Create Voice grant
        $voiceGrant = new VoiceGrant();
        $voiceGrant->setOutgoingApplicationSid($applicationSid);

        // Optional: add to allow incoming calls
        $voiceGrant->setIncomingAllow(true);

        // Add grant to token
        $token->addGrant($voiceGrant);

        return response()->json(['token' => $token->toJWT()]);
    }

    public function newCall(Request $request)
    {
        $response = new VoiceResponse();
        $callerIdNumber = env('TWILIO_PHONE_NUMBER');

        $dial = $response->dial(null, ['callerId'=>$callerIdNumber]);
        $phoneNumberToDial = $request->input('phoneNumber');

        if (isset($phoneNumberToDial)) {
            $dial->number($phoneNumberToDial, ['statusCallbackEvent' => 'initiated ringing answered completed',
                'statusCallback' => 'https://fielgroup.com.mx/villa/support/call/status',
                'statusCallbackMethod' => 'POST']);
        } else {
            $dial->client('support_agent');
        }

        return $response;
    }

    public function callSatatus(Request $request)
    {

//        Storage::put('status' . date("Y-m-d H:i:s") . '.txt', $request);

        $seguimiento = tbl_seguimiento::where('id_llamada' , $request->ParentCallSid ?? $request->CallSid)->first();
        if(!$seguimiento){
            $seguimiento = tbl_seguimiento::create(['fecha'=>now(),'medio_contacto'=>1, 'id_llamada' => $request->ParentCallSid ?? $request->CallSid]);
        }

        if($request->CallStatus == 'in-progress'){
            tbl_seguimiento::where('id_llamada', $request->ParentCallSid)->update(['llamada_en_progreso'=>now()]);
        }
        if($request->CallStatus == 'completed'){
            tbl_seguimiento::where('id_llamada', $request->CallSid)->update(['llamada_completada'=>now()]);
        }
        if($request->CallStatus == 'initiated'){
            tbl_seguimiento::where('id_llamada', $request->ParentCallSid)->update(['llamada_inicio'=>now()]);
        }
        if($request->CallStatus == 'ringing'){
            tbl_seguimiento::where('id_llamada', $request->ParentCallSid)->update(['llamada_sonando'=>now()]);
        }
        return true;
    }

    public function getLlamadas($id){
        $db = "SELECT A.id, A.fecha, A.comentario, CASE A.contesto WHEN 1  THEN 'SI' ELSE 'NO' END AS contesto, B.nombre AS contacto, (C.nombre || ' ' || C.ap_paterno) AS usuario
                ,A.llamada_inicio as inicio,A.llamada_en_progreso as progreso,A.llamada_sonando as sonando,A.llamada_completada as completada, A.numero
                FROM tbl_seguimientos AS A 
                    left JOIN cat_medio_contactos AS B ON A.medio_contacto = B.id 
                    INNER JOIN users AS C ON A.id_usuario_reg = C.id 
                WHERE A.id_lead = $id and medio_contacto = 1
                ORDER BY fecha DESC";

        return response()->json([
            'data' => DB::select($db),
        ], 200);
    }

    public function setInicioLlamadas(Request $request){
        tbl_seguimiento::create(['id_lead'=>$request->id_lead,'fecha'=>now(),
            'id_usuario_reg'=>Auth::user()->id,'medio_contacto'=>1, 'id_llamada' => $request->id_llamada,
            'numero' => $request->numero]);
    }

    public function setFinLlamadas(Request $request){
        $seguimiento = tbl_seguimiento::where('id_llamada',$request->id_llamada)->first();
        if(!$seguimiento->numero && !$seguimiento->id_llamada){
            tbl_seguimiento::where('id_llamada', $request->id_llamada)->
                update(['numero'=>$request->numero,'id_lead'=>$request->id_lead, 'id_usuario_reg'=>Auth::user()->id]);
        }
        return true;
    }

    public function comesIn(Request $request){
        Storage::put('ingreso' . date("Y-m-d H:i:s") . '.txt', $request);

    }
    public function whatsSatatus(Request $request){
        Storage::put('status1' . date("Y-m-d H:i:s") . '.txt', $request);
    }

    public function enviarWhats(Request $request){
        $sid    = getenv("TWILIO_ACCOUNT_SID");
        $token  = getenv("TWILIO_AUTH_TOKEN");
        $wa_from= '+14155238886';
//        $wa_from= '+16072142084';
//        $wa_from= '+527711318736';
        $wa_to= '+5217711615578';
        $twilio = new Client($sid, $token);

        $body = "Hello, welcome to codelapan.com.";

        return $twilio->messages->create("whatsapp:$wa_to",["from" => "whatsapp:$wa_from", "body" => 'prueba']);    }
}
