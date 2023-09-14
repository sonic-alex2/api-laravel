<?php

namespace App\Http\Controllers;

use App\Models\MedicalTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MedicalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $medicalTest = MedicalTest::paginate();
        return response()->json([
            'estatus'=> true,
            'datos'=> $medicalTest
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = ['nombre' => 'required|string',
                'tipo' => 'required|string',
                'costo' => 'required|numeric|min:0.01|max:999999.99',
                'tiempo_resultado' => 'required|date',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'estatus' => false,
                'errores' => $validator->errors()->all(),
            ],400);
        }

        $medicalTest = MedicalTest::create($request->all());

        return response()->json([
            'estatus' => true,
            'mensaje' => "Se creo el registro!",
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalTest $medicalTest)
    {
        //
        if(!$medicalTest){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        return response()->json([
            'estatus' => true,
            'datos' => $medicalTest,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalTest $medicalTest)
    {
        //
        if(!$medicalTest){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        $rules= ['nombre' => 'required|string',
            'tipo' => 'required|string',
            'costo' => 'required|numeric|min:0.01|max:999999.99',
            'tiempo_resultado' => 'required|date',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'estatus' => false,
                'errores' => $validator->errors()->all(),
            ],400);
        }

        $newMedicalTest = $medicalTest->update($request->all());

        return response()->json([
            'estatus' => true,
            'mensaje' => "Se actualizo el registro!",
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalTest $medicalTest)
    {
        //
        if(!$medicalTest){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        $medicalTest->delete();

        return response()->json([
            'estatus' => true,
            'mensaje' => "Registro eliminado!",
        ],200);
    }
}
