<?php

use App\Http\Controllers\SintomaController;
use App\Http\Controllers\UnidadController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ConceptoController;
use App\Http\Controllers\PersonaController;
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

Route::apiResource('/personas', PersonaController::class);

Route::apiResource('/unidades', UnidadController::class);

Route::apiResource('/conceptos', ConceptoController::class);

Route::post('/conceptos', [ConceptoController::class, 'store']);

Route::put('/conceptos/{id_concepto}', [ConceptoController::class, 'update']);

Route::apiResource('/inventario', InventarioController::class);

Route::post('/inventario', [InventarioController::class, 'store']);

Route::apiResource('/sintomas', SintomaController::class);
