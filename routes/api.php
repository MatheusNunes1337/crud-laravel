<?php

use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\GrupoController;
use App\Http\Controllers\Api\PostagemController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\LoginController;
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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('grupos', GrupoController::class);
    Route::apiResource('postagens', PostagemController::class);
    Route::post('grupos', [GrupoController::class, 'store'])->middleware(['ability:is-admin']);
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::apiResource('users', UserController::class);

Route::get('usuarios/{usuario}/postagens', [UsuarioController::class, 'listPostagens'])
        ->name('usuarios.postagens');

Route::get('grupos/{grupo}/postagens', [GrupoController::class, 'listPostagens'])
        ->name('grupo.postagens');
