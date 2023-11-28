@extends('layout.app', ["current" => "clientes"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Cadastro de Categorias</h5>

@if(count($clientes) > 0)
        <table class="table table-ordered table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
    @foreach($clientes as $cliente)
                <tr>
                    <td>{{$cliente->id}}</td>
                    <td>{{$cliente->nome}}</td>
                    <td>
                        <a href="{{ url('/clientes', $cliente->id) }}" class="">Ver</a>
                        <a href="/categorias/editar/{{$cliente->id}}" class="btn btn-sm btn-primary">Editar</a>
                        <a href="/categorias/apagar/{{$cliente->id}}" class="btn btn-sm btn-danger">Apagar</a>
                    </td>
                </tr>
    @endforeach                
            </tbody>
        </table>
@endif        
    </div>
    <div class="card-footer">
        <a href="{{ url('clientes/novo') }}" class="btn btn-sm btn-primary" role="button">Novo Cliente</a>
    </div>
</div>



@endsection