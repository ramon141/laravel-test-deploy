<?php

use App\Http\Controllers\PeriodController;
use App\Http\Controllers\PreOfferController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
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

Route::post('login', [AuthController::class, 'login']);

# Rotas disponíeis para todos os usuários.
Route::group(['middleware' => ['apiJwt:DIAVE,DIRETOR,DOCENTE']], function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

# Rotas para o pessoal da DIAVE
Route::group(['middleware' => ['apiJwt:DIAVE']], function(){
    Route::apiResource('turma', TurmaController::class);
    Route::apiResource('preOffer', PreOfferController::class);
    Route::apiResource('period', PeriodController::class);
    Route::apiResource('user', UserController::class);
});

/*

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
