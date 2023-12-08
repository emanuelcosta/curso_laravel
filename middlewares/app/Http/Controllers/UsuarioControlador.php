<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
class UsuarioControlador extends Controller
{
    // public function __construct(){
        // $this->middleware('primeiro');
    // }

    public function index()
    {
        Log::debug('UsuarioControlador@index');
        echo "<h1>Usuários</h1>";
        return "<ul>" .
            "<li>João</li>" .
            "<li>Marcos</li>" .
            "<li>Souza</li>" .
            "<li>Aurélio</li>" .
            "<li>Neto</li>" .
            "</ul>";
    }
}
