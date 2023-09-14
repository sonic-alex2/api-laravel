<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $results = Result::with('patient:id_paciente,nombre,edad,genero')
        ->with('medicalTest:id_prueba,nombre,tipo,costo')
        ->paginate();

        return response()->json([
            'estatus'=> true,
            'datos'=> $results
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = ['id_paciente' => 'required|exists:patients,id_paciente',
            'id_prueba' => 'required|exists:medical_tests,id_prueba',
            'fecha_resultado' => 'required|date',
            'resultado' => 'required|string',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'estatus' => false,
                'errores' => $validator->errors()->all(),
            ],400);
        }

        $result = Result::create($request->all());

        return response()->json([
            'estatus' => true,
            'mensaje' => "Se creo el registro!",
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
        if(!$result){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        return response()->json([
            'estatus' => true,
            'datos' => $result,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Result $result)
    {
        //
        if(!$result){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        $rules = ['id_paciente' => 'required|exists:patients,id_paciente',
                'id_prueba' => 'required|exists:medical_tests,id_prueba',
                'fecha_resultado' => 'required|date',
                'resultado' => 'required|string',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'estatus' => false,
                'errores' => $validator->errors()->all(),
            ],400);
        }

        $result = $result->update($request->all());

        return response()->json([
            'estatus' => true,
            'mensaje' => "Se actualizo el registro!",
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
        if(!$result){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        $result->delete();

        return response()->json([
            'estatus' => true,
            'mensaje' => "Registro eliminado!",
        ],200);
    }
}
