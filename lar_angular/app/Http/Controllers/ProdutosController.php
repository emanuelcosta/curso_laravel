<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){
        return response()->json(Post::all());
    }
}
