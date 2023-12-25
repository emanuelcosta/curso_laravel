<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ProdutosControlador extends Controller
{
    public function index(){
        $expiracao = 2; //minutos
        $produtos = Cache::remember("todososprodutos", $expiracao, function(){
            return Produto::with('categorias')->get();
    });
        return view('index', compact('produtos'));
    }
}
