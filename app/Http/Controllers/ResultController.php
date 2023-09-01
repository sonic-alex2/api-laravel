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
        $rules = ['id_paciente' => 'required',
                'id_prueba' => 'required',
                'fecha_resultado' => 'required',
                'resultado' => 'required',
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
            'mensaje' => "Se creo el resultado!",
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
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
        $rules = ['id_paciente' => 'required',
                'id_prueba' => 'required',
                'fecha_resultado' => 'required',
                'resultado' => 'required',
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
            'mensaje' => "Se actualizo el resultado!",
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
        $result->delete();

        return response()->json([
            'estatus' => true,
            'mensaje' => "Resultado eliminado!",
        ],200);
    }
}
