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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/negado', function(){
    echo "Acesso negado. Você precisa estar logado para acessar esta página.";    
})->name('negado');

Route::get('/negadologin', function(){
    echo "Acesso negado. Acesso permitido apenas para administradores.";    
})->name('negadologin');

Route::get('/formlogin', function(){
    return view('login');
});
Route::post('/login', function (Request $request) {
    $login_ok = false;

    $admin = false;
    switch ($request->input('user')) {
        case 'joao':
            $login_ok = $request->input('passwd') === 'senhajoao';
            $admin = true;
            break;
        case 'marcos':
            $login_ok = $request->input('passwd') === 'senhamarcos';
            break;
        case 'default':
            $login_ok = false;
    }

    if ($login_ok) {
        $login = ['nome' => $request->input('user'), 'admin' => $admin];
        $request->session()->put('login', $login);
        return response('Login OK', 200);
    } else {
        $request->session()->flush();
        return response('Erro no login', 404);
    }
});

Route::get('/deslogar', function(Request $request){
    $request->session()->flush();
    return response("Deslogado com sucesso.", 200);
});
