<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('loginEncrypt', 'Auth\\AuthController@customLogin')->name('logincustom');
Route::post('logoutEncrypt', 'Auth\\AuthController@LogOut')->name('logoutcustom');

Route::post('support/call', 'CallsController@newCall')->name('newCall');
Route::post('support/call/status', 'CallsController@callSatatus')->name('callSatatus');
Route::post('whats/call', 'CallsController@comesIn');
Route::post('whats/call/status', 'CallsController@whatsSatatus');
Route::get('enviarWhats', 'CallsController@enviarWhats');

//////////encuestas
Route::get('encuesta_landing/{id}', 'EncuestaGuestController@index_encuesta_landing');
Route::get('encuesta/{id}', 'EncuestaGuestController@index_encuesta');

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('lang/{locale}', 'LocalizationController@index');

    Route::resource('usuarios', UsersController::class)->name('usuarios', '*');
    Route::get('perfil', 'UsersController@index_perfil')->name('perfil.index');
    Route::get('usersL', 'UsersController@getUsuarios');
    Route::get('logoutOtherBrowserSessions', 'UsersController@logoutOtherBrowserSessions');

    Route::get('catalogos', 'HelperController@getCatalogos');

    ////pasteko

    //////////////////////dashboard///////////////////////////////
    Route::get('dashboard', 'DashboardController@indexGeneral');
    Route::get('dashboardG/{tipo}/{fecha_inicio}/{fecha_fin}', 'DashboardController@getGeneral');
    Route::get('dashboardEncuesta', 'DashboardController@indexEncuesta');
    Route::get('dashboardEncuestaG/{tipo}/{fecha_inicio}/{fecha_fin}', 'DashboardController@getEncusta');
    Route::get('dashboardEncuestaSuc', 'DashboardController@indexEncuestaSuc');
    Route::get('dashboardEncuestaSucG/{tipo}/{fecha_inicio}/{fecha_fin}', 'DashboardController@getEncustaSuc');

    ////////////////////// end  //////////////////////////////////
     Route::resource('sucursales', TblSucursaleController::class)->name('sucursales', '*');
    Route::get('sucursalesL', 'TblSucursaleController@getSucursales');
    
    Route::resource('encuestas', TblEncuestaController::class)->name('encuestas', '*');
    Route::post('encuestasA', 'TblEncuestaController@setEncuestasActiva');
    Route::post('encuestasG', 'TblEncuestaController@setEncuestasTipo');
    Route::get('encuestasL', 'TblEncuestaController@getEncuestas');

    Route::resource('respuestas', TblEncuestaRespuestaController::class)->name('respuestas', '*');
    Route::get('respuestasL', 'TblEncuestaRespuestaController@getRespuestas');


    Route::resource('encueta_preguntas', TblEncuestaPreguntaController::class)->name('encueta_preguntas','*');
    Route::post('af/encueta_preguntas', 'TblEncuestaPreguntaController@setAF');
    Route::get('preguntas', 'TblEncuestaPreguntaController@getPreguntaGeneral');
    Route::get('preguntas/{id}', 'TblEncuestaPreguntaController@');
    Route::post('order_question/','TblEncuestaPreguntaController@setPreguntaAF');

    //blog
    
    Route::resource('posts', TblPostController::class)->name('posts', '*');
    Route::get('postsL', 'TblPostController@getPosts');
    Route::post('status_post', 'TblPostController@setStatus');

    Route::resource('categorias', TblCategoriaController::class)->name('categorias', '*');
    Route::get('categoriasL', 'TblCategoriaController@getCategorias');

    Route::resource('tags', TblTagController::class)->name('tags', '*');
    Route::get('tagsL', 'TblTagController@getTags');

    Route::post('/save-token', 'HelperController@saveToken')->name('save-token');
    Route::get('/send_notification/{id}', 'HelperController@sendNotification')->name('send_notification');
    Route::get('/notificaciones/{id}', 'HelperController@getNotificaciones')->name('notificaciones');
    Route::get('helper/{id}/visto', 'HelperController@notificaciones')->name('helper.visto');

     ////////////////////// llamadas //////////////////////////
     Route::get('call/{id}', 'CallsController@index')->name('call');
     Route::post('call_token', 'CallsController@newToken')->name('call_token');
     Route::get('llamadas/{id}', 'CallsController@getLlamadas')->name('llamadas');
     Route::post('llamar', 'CallsController@setInicioLlamadas')->name('llamar');
     Route::post('llamar_fin', 'CallsController@setFinLlamadas')->name('llamar_fin');
     /////////////////////////////////////////////////////////


    ////////////////////////// archivos /////////////////////////////
    Route::resource('archivosM', 'TblArchivoController')->name('archivosM','*');
    Route::get('archivospdf/{id}', 'TblArchivoController@archivospdf')->name('archivospdf');
    
    Route::get('documentos/{path}/{filename}', 'TblArchivoController@getDocumentos');
});


require __DIR__.'/auth.php';
