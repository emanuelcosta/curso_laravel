<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paginação</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body {
            padding-top: 10px;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Tabela de Clientes
            </div>
            <div class="card-body">
                <h5 class="card-title">Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }}
                    ({{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})</h5>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{ $cliente->id }}</td>
                                <td>{{ $cliente->nome_sobrenome() }}</td>
                                <td>{{ $cliente->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $clientes->links() }}
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>

</html>
