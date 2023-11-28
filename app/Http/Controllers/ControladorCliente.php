<?php 
namespace App\Http\Controllers;

use App\Cliente;

class ControladorCliente extends Controller{
    public function index(){
        $clientes = Cliente::all();
        return view('clientes/index', compact('clientes'));
    }

    public function create(){
        
    }

    public function store(){
        
    }

    public function show(Cliente $cliente){
        return view('clientes/show', compact('cliente'));
    }

    public function edit(){
        
    }

    public function update(){
        
    }

    public function destroy(){
        
    }
}