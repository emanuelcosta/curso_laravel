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

use App\Desenvolvedor;
use App\Alocacao;
use App\Projeto;

Route::get('/desenvolvedor_projetos', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach ($desenvolvedores as $d) :
        echo "Desenvolvedor: " . $d->nome;
        echo "<ul>";
        foreach ($d->projetos as $p) :
            echo sprintf("<li>Nome: %s | Horas: %s | Horas semanais: %s</li>", $p->nome, $p->estimativa_horas, $p->pivot->horas_semanais);
        endforeach;
        echo "</ul>";
    endforeach;
    return $desenvolvedores->toJson();
});

Route::get('/projeto_desenvolvedores', function () {
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach ($projetos as $d) :
        echo "Nome do projeto: " . $d->nome;
        echo "<ul>";
        foreach ($d->desenvolvedores as $p) :
            echo sprintf("<li>Nome do desenvolvedor: %s | Horas: %s | Horas semanais: %s</li>", $p->nome, $p->cargo, $p->pivot->horas_semanais);
        endforeach;
        echo "</ul>";
    endforeach;
    // return $projetos->toJson();
});

Route::get('/alocar', function(){
    $proj = Projeto::find(3);

    if(isset($proj))
        $proj->desenvolvedores()->attach([1 => ['horas_semanais' => 20],3 => ['horas_semanais' => 40]]);

    $proj->load('desenvolvedores');
    return $proj->toJson();
});

Route::get('/desalocar', function(){
    $proj = Projeto::find(3);

    if(isset($proj))
        $proj->desenvolvedores()->detach([1]);

    $proj->load('desenvolvedores');
    return $proj->toJson();
});