<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteControlador extends Controller
{
    function index()
    {
        // $data['clientes'] = Cliente::all();
        $clientes = Cliente::paginate(10);
        $data = [
            'clientes' => $clientes
        ];
        return view('paginacao/index', $data);
    }
    function clientesjs()
    {
        return view('paginacao/indexjs');
    }
    function clientesjson()
    {
        $clientes = Cliente::paginate(10);
        return $clientes;
    }
}
