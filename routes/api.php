<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientController;
use App\Http\Controllers\ApiAuthUserController;
use App\Http\Controllers\MedicalTestController;
use App\Http\Controllers\ResultController;

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
    Route::apiResource('pacientes', PatientController::class,[
        /* 'names' => [
            'index' => 'lista-pacientes',
            'create' => 'crear-paciente',
        ], */
        'parameters' => [
            'pacientes' => 'patient',
        ],
    ]);

    Route::apiResource('p-medicas', MedicalTestController::class,[
        'parameters' => [
            'p-medicas' => 'medicalTest',
        ],
    ]);

    Route::apiResource('resultados', ResultController::class,[
        'parameters' => [
            'resultados' => 'result',
        ],
    ]);

    Route::get('auth/salir',[ApiAuthUserController::class,'logout']);
});


