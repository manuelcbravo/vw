<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use app\Models\cat_role;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Http\Traits\SecurityTrait;

use Auth;
use Hash;
use DB;
use Str;


class UsersController extends Controller{

    use SecurityTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $input = [ 'users' => new User ];
        return view('pages.config.users.index', ['active' => 'usuarios', 'inputs' => $this->encryptName($input,$request) ]);
    }

    public function index_perfil(Request $request){
        $input = [ 'users' => new User ];

        return view('pages.config.perfil.index', ['active' => 'perfil',
        'sessions' => $this->sessions($request)->all(), 'inputs' => $this->encryptName($input,$request)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $store = $this->decryptStore($request->all(), $request);

        $cadena = 'Usuario registrado | ';
        if($store['id'] != null){
            $cadena = 'Usuario editado | ';
        }else{
            $store['api_token'] = Str::random(60);
        }
        
        if($store['password_plain']) {
            $store['password'] = Hash::make($store['password_plain']);
        }

        $user = User::updateOrCreate(['id' => $store['id'] ?? null],$store);

        $user->roles()->attach(cat_role::where('id', $store['rol'])->first());
        $cadena .= $store['name']." ".$store['apellidos']." - Rol ".$store['rol']." - Email ".$store['email'];

        \Notificaciones::agregarLog($cadena, $user->id, "users");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request){
        $show = $this->encryptShow(User::find($id), $request);
        return response()->json([
            'status' => true,
            'usuario' => $show
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $user = User::withTrashed()->find($id);
        $user ->delete();
        \Notificaciones::agregarLog('Registro eliminado desde Mi empresa - Usuarios ', $id, "users");
        return response()->json([
            'status' => true,
        ], 200);
    }

    public function getUsuarios(){
        if($user = User::where('rol' ,'<>', 0)->get()){
            return response()->json([
                'data' => $user
            ]);
        }else{
            return response()->json([
                'status' => false,
            ], 200);
        }
    }

    public function sessions(Request $request)
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        return collect(
            DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
                    ->where('user_id', $request->user()->getAuthIdentifier())
                    ->orderBy('last_activity', 'desc')
                    ->get()
        )->map(function ($session) use ($request) {
            $agent = $this->createAgent($session);

            return (object) [
                'agent' => [
                    'is_desktop' => $agent->isDesktop(),
                    'platform' => $agent->platform(),
                    'browser' => $agent->browser(),
                ],
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === $request->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }

    public function logoutOtherBrowserSessions(StatefulGuard $guard)
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        $this->resetErrorBag();

        if (! Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }

        $guard->logoutOtherDevices($this->password);

        $this->deleteOtherSessionRecords();

        request()->session()->put([
            'password_hash_'.Auth::getDefaultDriver() => Auth::user()->getAuthPassword(),
        ]);

        $this->confirmingLogout = false;

        $this->emit('loggedOut');
    }

    protected function deleteOtherSessionRecords(Request $request)
    {
        if (config('session.driver') !== 'database') {
            return;
        }

        DB::connection(config('session.connection'))->table(config('session.table', 'sessions'))
            ->where('user_id', $request->user()->getAuthIdentifier())
            ->where('id', '!=', $request->session()->getId())
            ->delete();
    }
}
