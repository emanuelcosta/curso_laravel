@extends('layout.app', ["current" => "clientes"])

@section('body')
<div class="card border">
    <div class="card-body">
        <h5 class="card-title">Visualização de Cliente</h5>

        <table class="table table-ordered table-hover">

            <tbody>
                <tr>
                    <th>Código</th>
                    <td>{{ $cliente->id }}</td>
                </tr>
                <tr>
                    <th>Nome</th>
                    <td>{{ $cliente->nome }}</td>
                </tr>
                <tr>
                    <th>Rua</th>
                    <td>{{ (!$cliente->endereco)?"":$cliente->endereco->cliente->endereco->rua }}</td>
                </tr>
                <tr>
                    <th>Número</th>
                    <td>{{ (!$cliente->endereco)?"":$cliente->endereco->numero }}</td>
                </tr>
                <tr>
                    <th>Bairro</th>
                    <td>{{ (!$cliente->endereco)?"":$cliente->endereco->bairro }}</td>
                </tr>
                <tr>
                    <th>UF</th>
                    <td>{{ (!$cliente->endereco)?"":$cliente->endereco->uf }}</td>
                </tr>
                <tr>
                    <th>CEP</th>
                    <td>{{ (!$cliente->endereco)?"":$cliente->endereco->cep }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>



@endsection