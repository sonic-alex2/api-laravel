<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = ['name'=>'required',
                'email'=>'required|email',
                'password'=>'required|min:8'];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'estatus' => false,
                'errores' => $validator->errors()->all(),
            ],400);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'estatus' => true,
            'mensaje' => "Se creo el usuario!",
            'toquen' => $user->createToken('Api Token')->plainTextToken,
        ],200);
    }


    public function login(Request $request)
    {
        //
        $rules = ['email'=>'required|email',
                'password'=>'required|min:8'];
        $validator = Validator::make($request->all(),$rules);

        if($validator->fails()){
            return response()->json([
                'estatus' => false,
                'errores' => $validator->errors()->all(),
            ],400);
        }

        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'estatus' => false,
                'errores' => "No se logro la autorizacion!",
            ],401);
        }

        $user = User::where('email', $request->email)->first();

        $tokenResult = $user->createToken('Personal Access Token');
        //$tokenResult->accessToken; //tiene todos los datos del toquen


        return response()->json([
            'estatus' => true,
            'mensaje' => "Ingreso autorizado!",
            'data' => $user,
            'acceso' => [
                'tipo' => "Bearer",
                //'toquen_acceso' => $tokenResult->accessToken,
                'toquen' => $tokenResult->plainTextToken,
            ],
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout()
    {
        //
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'mensaje' => 'A cerrado la session con exito!',
        ],200);

    }
}
