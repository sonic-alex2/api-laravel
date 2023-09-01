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
        $medicalTest = MedicalTest::all();
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
        $rules = ['nombre' => 'required'];

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
            'mensaje' => "Se creo la prueba medica!",
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalTest $medicalTest)
    {
        //
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
        $rules= ['nombre' => 'required'];

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
            'mensaje' => "Se actualizo la prueba medica!",
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalTest $medicalTest)
    {
        //
        $medicalTest->delete();

        return response()->json([
            'estatus' => true,
            'mensaje' => "Prueba medica eliminada!",
        ],200);
    }
}
