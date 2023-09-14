<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Database\QueryException;

use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        /* $this->renderable(function (NotFoundHttpException $e, $request) {
            //
            if($request->is('api/pacientes/*')){
                return response()->json([
                    'status'=> false,
                    'mensaje' => 'uy, No se encontró el paciente!'
                ,404]);
            }else

            if($request->is('api/p-medicas/*')){
                return response()->json([
                    'status'=> false,
                    'mensaje' => 'uy, No se encontró la prueba!'
                ,404]);
            }

            if($request->is('api/resultados/*')){
                return response()->json([
                    'status'=> false,
                    'mensaje' => 'uy, No se encontró el resultado!'
                ,404]);
            }
        }); */

        $this->renderable(function (\Throwable $e, $request) {
            if ($request->is('api/pacientes/*')) {
                if ($e instanceof NotFoundHttpException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Uy, No se encontró el paciente!'
                    ], 404);
                } elseif ($e instanceof ValidationException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Error de validación: ' . $e->getMessage(),
                        'errores' => $e->errors(),
                    ], 422);
                } elseif ($e instanceof ModelNotFoundException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'El modelo solicitado no se encontró.',
                    ], 404);
                } elseif ($e instanceof AuthorizationException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'No tienes permiso para realizar esta acción.',
                    ], 403);
                } elseif ($e instanceof QueryException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Error en la consulta de base de datos: ' . $e->getMessage(),
                    ], 500);
                }
            } elseif ($request->is('api/p-medicas/*')) {
                if ($e instanceof NotFoundHttpException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Uy, No se encontró las pruebas!'
                    ], 404);
                } elseif ($e instanceof ValidationException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Error de validación: ' . $e->getMessage(),
                        'errores' => $e->errors(),
                    ], 422);
                } elseif ($e instanceof ModelNotFoundException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'El modelo solicitado no se encontró.',
                    ], 404);
                } elseif ($e instanceof AuthorizationException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'No tienes permiso para realizar esta acción.',
                    ], 403);
                } elseif ($e instanceof QueryException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Error en la consulta de base de datos: ' . $e->getMessage(),
                    ], 500);
                }
            } elseif ($request->is('api/resultados/*')) {
                if ($e instanceof NotFoundHttpException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Uy, No se encontró el resultado!'
                    ], 404);
                } elseif ($e instanceof ValidationException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Error de validación: ' . $e->getMessage(),
                        'errores' => $e->errors(),
                    ], 422);
                } elseif ($e instanceof ModelNotFoundException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'El modelo solicitado no se encontró.',
                    ], 404);
                } elseif ($e instanceof AuthorizationException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'No tienes permiso para realizar esta acción.',
                    ], 403);
                } elseif ($e instanceof QueryException) {
                    return response()->json([
                        'status' => false,
                        'mensaje' => 'Error en la consulta de base de datos: ' . $e->getMessage(),
                    ], 500);
                }
            }
        });
    }
}
