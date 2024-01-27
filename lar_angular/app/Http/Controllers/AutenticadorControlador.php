<?php

namespace App\Http\Controllers;

use App\Events\EventNovoRegistro;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use phpseclib\Crypt\Random;

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
            'token' => str_random(60)
        ]);

        $user->save();

        /**
         * Evento de envio de email
         */
        event(new EventNovoRegistro($user));
        
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
            'password' => $request->password,
            'active' => 1
        ];

        if(!Auth::attempt($credentials)){
            return response(['res' => 'Email ou senha inválido', 'success' => false], 401);
        }

        $user = $request->user();
        $token = $user->createToken("token_acesso")->accessToken;

        return response([
			'success' => true,
            'token' => $token,
            'name' => $user->name,
            'email' => $user->email,
			'id' => $user->id
        ], 200);
    }
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json(["res" => "Deslogado com sucesso!"]);
    }

    public function ativaregistro($id, $token){
        $user = User::find($id);
        if($user){
            if($user->token == $token){
                $user->active = true;
                $user->token = '';
                $user->save();
                return view('registroativo')->with(['nome' => $user->name]);
            }
        }
        return view('registroerro');
    }
}
