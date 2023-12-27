<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AutenticadorControlador extends Controller
{
    public function registro(Request $request){
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->save();
        return response([
            'res' => 'Usuário registrado com sucesso!'
        ], 201);

    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(!Auth::attempt($credentials)){
            return response(['res' => 'Email ou senha inválido'], 401);
        }

        $user = $request->user();
        $token = $user->createToken("token_acesso")->accessToken();

        return response([
            'token' => $token
        ], 200);
    }
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json(["res" => "Deslogado com sucesso!"]);
    }
}
