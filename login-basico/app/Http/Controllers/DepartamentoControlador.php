<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoControlador extends Controller
{
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            echo "<h4> Você está logado!!</h4>";
            echo sprintf("Você está logado! <br> Nome: %s <br> Email: %s <br> Id: %s", $user->name, $user->email, $user->id);
        }else{
            echo "<h4> Você não está logado!!</h4>";
        }
        // return view('departamentos');
    }
}
