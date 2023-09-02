<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $patients = Patient::paginate();
        return response()->json([
            'estatus'=> true,
            'datos'=> $patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = ['nombre' => 'required',
                'edad' => 'required|numeric|min:18|max:100',
                'genero' => 'required|in:m,f',
                'fecha_ingreso' => 'required|date',
            ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'estatus' => false,
                'errores' => $validator->errors()->all(),
            ],400);
        }

        $patient = Patient::create($request->all());

        return response()->json([
            'estatus' => true,
            'mensaje' => "Se creo el paciente!",
        ],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
        if(!$patient){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        return response()->json([
            'estatus' => true,
            'datos' => $patient,
        ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
        if(!$patient){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        $rules= ['nombre' => 'required',
            'edad' => 'required|numeric|min:18|max:100',
            'genero' => 'required|in:m,f',
            'fecha_ingreso' => 'required|date',
        ];

        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'estatus' => false,
                'errores' => $validator->errors()->all(),
            ],400);
        }

        $patient = $patient->update($request->all());

        return response()->json([
            'estatus' => true,
            'mensaje' => "Se actualizo el paciente!",
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        if(!$patient){
            return response()->json([
                'estatus' => false,
                'mensaje' => "Registro no encontrado!",
            ],404);
        }

        $patient->delete();

        return response()->json([
            'estatus' => true,
            'mensaje' => "Paciente eliminado!",
        ],200);
    }
}
