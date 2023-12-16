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
                <h5 class="card-title">Exibindo <span class="pagecount"></span> clientes de <span
                        class="pagetotal"></span> (<span class="pagefirstitem"></span> a <span
                        class="pagelastitem"></span>)</h5>
                <table class="table table-hover" id="tabelaClientes">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <nav id="paginator">
                    <ul class="pagination">
                        <!--- <li class="page-item disabled">
                            <a class="page-link">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        function getItemAnterior(data) {
            if (data.current_page == 1)
                return '<li class="page-item disabled"><a class="page-link">Anterior</a></li>';
            else
                return '<li class="page-item"><a class="page-link" onClick="carregarClientes(' + (data.current_page - 1) +
                    ')">Anterior</a></li>';

        }

        function getItemProximo(data) {
            if (data.current_page == data.last_page)
                return '<li class="page-item disabled"><a class="page-link"> Próximo </a></li>';
            else
                return '<li class="page-item"><a class="page-link" pagina="' + (data.current_page + 1) +
                    '"> Próximo </a></li>';

        }

        function getItem(data, i) {
            if (data.current_page == i)
                return '<li class="page-item active"><a class="page-link" pagina="' + i + '">' + i +
                    '</a></li>';
            else
            return '<li class="page-item"><a class="page-link" pagina="' + i + '">' + i +
                    '</a></li>';

        }

        function montarPaginator(data) {
            $('#paginator>ul>li').remove();
            $('#paginator>ul').append(getItemAnterior(data));
            n = 12
            if (data.current_page - n / 2 <= 1)
                inicio = 1
            else if (data.last_page - data.current_page < n)
                inicio = data.last_page - n + 1
            else
                inicio = data.current_page - n / 2

            fim = inicio + n - 1
            for (i = inicio; i <= fim; i++) {
                s = getItem(data, i);
                $('#paginator>ul').append(s);
            }
            $('#paginator>ul').append(getItemProximo(data));
        }

        function montarLinha(cliente) {
            return '<tr>' +
                '<td>' + cliente.id + '</td>' +
                '<td>' + cliente.nome + '</td>' +
                '<td>' + cliente.sobrenome + '</td>' +
                '<td>' + cliente.email + '</td>' +
                '</tr>';
        }

        function montarTabela(resp) {
            $("#tabelaClientes>tbody>tr").empty();
            for (i = 0; i < resp.data.length; i++) {
                s = montarLinha(resp.data[i]);
                $("#tabelaClientes>tbody").append(s);
               
            }
        }

        function carregarClientes(pagina) {
            $.get("{{ url('/clientes/json') }}", {
                page: pagina
            }, function(resp) {
                console.log(resp);
                $('.pagecount').html(resp.per_page);
                $('.pagetotal').html(resp.total);
                $('.pagefirstitem').html(resp.from);
                $('.pagelastitem').html(resp.to);
                montarTabela(resp);
                montarPaginator(resp);
                $('#paginator>ul>li>a').click(function() {
                    pagina = $(this).attr('pagina');
                    carregarClientes(pagina);
                });
            });
        }

        $(function() {
            carregarClientes(1);
        });
    </script>
</body>

</html>
