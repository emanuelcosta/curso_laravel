<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoControlador extends Controller
{
    private $produtos = ["Notebook", "TV", "Ferro de engomar", "Mesa Gamer"];

    public function __construct(){
        $this->middleware(\App\Http\Middleware\ProdutoAdmin::class);
    }
    public function index(){
        echo "<h3>Produtos</h3>";
        echo "<ol>";
        array_map(function($p){
            echo "<li>".$p."</li>";
        }, $this->produtos);
        echo "</ol>";
    }
}
