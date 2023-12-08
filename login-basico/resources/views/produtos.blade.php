@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Lista de Produtos</div>

                    <div class="card-body">
                        <table border="1">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Produto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th></th>
                                    <th>Produto 1</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Produto 2</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Produto 3</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Produto 4</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
