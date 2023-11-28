<?php


use App\Http\Controllers\RolController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\SintomaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ReportesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta para obtener todas las personas
Route::apiResource('/personas', PersonaController::class);

//Ruta para obtener una persona
Route::get('/personas/{identificacion}', [PersonaController::class, 'show']);

// Ruta para obtener todas las unidades
Route::apiResource('/unidades', UnidadController::class);

// Ruta para obtener todas los conceptos
Route::apiResource('/conceptos', ConceptoController::class);

// Ruta para obtener un concepto
Route::get('/conceptos/{id_concepto}', [ConceptoController::class, 'show']);

// Ruta para insertar un concepto
Route::post('/conceptos', [ConceptoController::class, 'store']);

// Ruta para actualizar un concepto
Route::put('/conceptos/{id_concepto}', [ConceptoController::class, 'update']);

// Ruta para obtener todos los inventarios
Route::apiResource('/inventario', InventarioController::class);

// Ruta para insertar un inventario
Route::post('/inventario', [InventarioController::class, 'store']);

// Ruta para obtener todos los síntomas
Route::apiResource('/sintomas', SintomaController::class);

// Ruta para insertar un síntoma
Route::post('/sintomas', [SintomaController::class, 'store']);

// Ruta para actualizar un síntoma
Route::put('/sintomas/{id_sintoma}', [SintomaController::class, 'update']);

// Ruta para obtener todos los diagnósticos
Route::apiResource('/diagnosticos', DiagnosticoController::class);

// Ruta para insertar un diagnóstico
Route::post('/diagnosticos', [DiagnosticoController::class, 'store']);

// Ruta para actualizar un diagnóstico
Route::put('/diagnosticos/{id_diagnostico}', [DiagnosticoController::class, 'update']);

// Ruta para obtener todas las consultas
Route::apiResource('/consultas', ConsultaController::class);

// Ruta para insertar una consulta
Route::post('/consultas', [ConsultaController::class, 'store']);

// Ruta para actualizar una consulta
Route::put('/consultas/{id_consulta}', [ConsultaController::class, 'update']);

// Ruta para obtener los usuarios
Route::get('/usuarios', [UsuarioController::class, 'index']);

// Ruta para obtener un usuario
Route::get('/usuarios/{id_usuario}', [UsuarioController::class, 'show']);

// Ruta para insertar un usuario
Route::post('/usuarios', [UsuarioController::class, 'store']);

// Ruta para actualizar un usuario
Route::put('/usuarios/{id_usuario}', [UsuarioController::class, 'update']);

// Ruta para obtener todos los roles
Route::apiResource('/roles', RolController::class);

// Ruta para obtener un rol
Route::get('/roles/{id_rol}', [RolController::class, 'show']);

// Ruta para obtener los movimientos
Route::apiResource('/movimientos', MovimientoController::class);

// Ruta para obtener un movimiento
Route::get('/movimientos/{id_movimiento}', [MovimientoController::class, 'show']);

// Ruta para insertar un movimiento
Route::post('/movimientos', [MovimientoController::class, 'store']);

// Ruta para generar el reporte de morbilidad
Route::get('/morbilidad', [ReportesController::class, 'morbilidad']);
