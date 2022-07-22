<?php

use App\Http\Controllers\Api\AreaController;
use App\Http\Controllers\Api\CargoController;
use App\Http\Controllers\Api\EstadoActividadController;
use App\Http\Controllers\Api\EstadoEvaluacionController;
use App\Http\Controllers\Api\EstadoGestionController;
use App\Http\Controllers\Api\EstadoProcesoController;
use App\Http\Controllers\Api\EvaluacionController;
use App\Http\Controllers\Api\FuncionController;
use App\Http\Controllers\Api\PrioridadController;
use App\Http\Controllers\Api\TipoActividadController;
use App\Http\Controllers\Api\TipoUsuarioController;
use App\Http\Controllers\Api\UsuarioResponsableController;
use App\Http\Controllers\Api\VinculoController;
use App\Http\Controllers\Api\PersonalController;
use App\Http\Controllers\Api\CandidatoController;


use App\Http\Controllers\Api\TipoUbigeoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('create-user', [UserController::class, 'createUser']);
Route::get("cargo/pagination", [CargoController::class, "pagination"]);
Route::resource("cargo", CargoController::class);
Route::get("funcion/pagination", [FuncionController::class, "pagination"]);
Route::resource("funcion", FuncionController::class);
Route::get("estadoEvaluacion/pagination", [EstadoEvaluacionController::class, "pagination"]);
Route::resource("estadoEvaluacion", EstadoEvaluacionController::class);
Route::get("vinculo/pagination", [VinculoController::class, "pagination"]);
Route::resource("vinculo", VinculoController::class);
Route::get('/candidato/{departamento}/{provincia}/{distrito}', 'App\Http\Controllers\Api\CandidatoController@list' );
Route::get('/periodo', 'App\Http\Controllers\Api\PeriodoController@lastPeriodo' );
Route::get("tipoUsuario/pagination", [TipoUsuarioController::class, "pagination"]);
Route::resource("tipoUsuario", TipoUsuarioController::class);

Route::get("tipoActividad/pagination", [TipoActividadController::class, "pagination"]);
Route::resource("tipoActividad", TipoActividadController::class);

Route::get("area/pagination", [AreaController::class, "pagination"]);
Route::resource("area", AreaController::class);


Route::get("prioridad/pagination", [PrioridadController::class, "pagination"]);
Route::resource("prioridad", PrioridadController::class);

Route::get("tipoUbigeo/pagination", [TipoUbigeoController::class, "pagination"]);
Route::resource("tipoUbigeo", TipoUbigeoController::class);


Route::get("estadoGestion/pagination", [EstadoGestionController::class, "pagination"]);
Route::resource("estadoGestion", EstadoGestionController::class);

Route::get("usuarioResponsable/pagination", [UsuarioResponsableController::class, "pagination"]);
Route::resource("usuarioResponsable", UsuarioResponsableController::class);

Route::get("estadoActividad/pagination", [EstadoActividadController::class, "pagination"]);
Route::resource("estadoActividad", EstadoActividadController::class);

Route::get("estadoProceso/pagination", [EstadoProcesoController::class, "pagination"]);
Route::resource("estadoProceso", EstadoProcesoController::class);

Route::get("evaluacion/pagination", [EvaluacionController::class, "pagination"]);
Route::resource("evaluacion", EvaluacionController::class);

Route::post("personal/cv", [PersonalController::class, "uploadCv"]);
Route::post("personal/image", [PersonalController::class, "uploadImage"]);

Route::get("personal/pagination", [PersonalController::class, "pagination"]);
Route::resource("personal", PersonalController::class);

Route::get('/departamentos', 'App\Http\Controllers\Api\DepartamentoController@index');
Route::get('/provincias/{id}', 'App\Http\Controllers\Api\ProvinciaController@showDep');
Route::get('/distritos/{idDepartamento}/{idProvincia}', 'App\Http\Controllers\Api\DistritoController@showDist' );
Route::get('/zonas/{idDepartamento}/{idProvincia}/{idDistrito}', 'App\Http\Controllers\Api\ZonaController@showZona' );
Route::get('/menu','App\Http\Controllers\Api\ApiMenuController@index');
Route::post('/menu','App\Http\Controllers\Api\ApiMenuController@store');
Route::put('/menu/{id}','App\Http\Controllers\Api\ApiMenuController@update');
Route::delete('/menu/{id}','App\Http\Controllers\Api\ApiMenuController@destroy');
Route::get('/opmenu','App\Http\Controllers\Api\ApiOptionMenuController@index');
Route::post('/opmenu','App\Http\Controllers\Api\ApiOptionMenuController@store');
Route::put('/opmenu/{id}','App\Http\Controllers\Api\ApiOptionMenuController@update');
Route::delete('/opmenu/{id}','App\Http\Controllers\Api\ApiOptionMenuController@destroy');
Route::get('/encuesta','App\Http\Controllers\Api\ApiEncuestaController@index');
Route::post('/encuesta','App\Http\Controllers\Api\ApiEncuestaController@store');
Route::put('/encuesta/{id}','App\Http\Controllers\Api\ApiEncuestaController@update');
Route::delete('/encuesta/{id}','App\Http\Controllers\Api\ApiEncuestaController@destroy');

Route::get('/lista/candidatos/{departamento}/{provincia}/{distrito}','App\Http\Controllers\Api\CandidatoController@list');
Route::get('/last-periodo', 'App\Http\Controllers\Api\PeriodoController@lastPeriodo');