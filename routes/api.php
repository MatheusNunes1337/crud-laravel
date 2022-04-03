<?php

use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\GrupoController;
use App\Http\Controllers\Api\PostagemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('grupos', GrupoController::class);
Route::apiResource('postagens', PostagemController::class);

Route::get('usuarios/{usuario}/postagens', [UsuarioController::class, 'listPostagens'])
        ->name('usuarios.postagens');

Route::get('grupos/{grupo}/postagens', [GrupoController::class, 'listPostagens'])
        ->name('grupo.postagens');
