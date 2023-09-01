<?php

use App\Http\Controllers\ApiAuthUserController;
use App\Http\Controllers\PatientController;
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
Route::post('auth/registro',[ApiAuthUserController::class,'store']);
Route::post('auth/ingresar',[ApiAuthUserController::class,'login']);

Route::middleware('auth:sanctum')->group( function () {
    Route::resource('pacientes', PatientController::class,[
        /* 'names' => [
            'index' => 'lista-pacientes',
            'create' => 'crear-paciente',
        ], */
        'parameters' => [
            'pacientes' => 'patient',
        ],
    ])->except('create','edit');
    //return $request->user();
    Route::get('auth/salir',[ApiAuthUserController::class,'logout']);
});


