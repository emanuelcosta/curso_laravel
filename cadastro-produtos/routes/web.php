<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Categoria;
use App\Produto;

Route::get('/', function () {
    return view('index');
});

Route::get('/produtos', 'ControladorProduto@indexView');
Route::get('/categorias', 'ControladorCategoria@index');
Route::get('/categorias/novo', 'ControladorCategoria@create');
Route::post('/categorias', 'ControladorCategoria@store');
Route::get('/categorias/apagar/{id}', 'ControladorCategoria@destroy');
Route::get('/categorias/editar/{id}', 'ControladorCategoria@edit');
Route::post('/categorias/{id}', 'ControladorCategoria@update');


Route::get('/categorias/produtos', function () {
    $categorias = Categoria::all();

    foreach ($categorias as $cat) {
        echo sprintf("%s \n", $cat['nome']);
        $produtos = $cat->produtos;
        if (count($produtos) > 0) {
            foreach ($produtos as $p) {
                echo sprintf("<ul><li>%s</li></ul>", $p['nome']);
            }
        }
    }
});

Route::get('/categorias/produtos/json', function () {
    $categorias = Categoria::with('produtos')->get();
    return $categorias->toJson();
});

// associate
Route::get('/adicionarprodutocategoria', function(){
    $categoria = Categoria::find(1);

    $p = new Produto();
    $p->nome = "Produto TESTE";
    $p->estoque = 0;
    $p->preco = 30;
    $p->categoria()->associate($categoria);
    $p->save();
    return $p->toJson();
});

//dissociate
Route::get('/removerprodutocategoria', function(){
    $p = Produto::find(7);
    $p->categoria()->dissociate();
    $p->save();
    return $p->toJson();
});

Route::get('/adicionarproduto/{cat}', function($catid){
    $cat = Categoria::with('produtos')->find($catid);

    $p = new Produto();
    $p->nome = "NOVO PRODUTO ADICIONADO TESTE 2";
    $p->estoque = 0;
    $p->preco = 30;
    $cat->produtos()->save($p);
    $cat->load('produtos');
    return $cat->toJson();
});