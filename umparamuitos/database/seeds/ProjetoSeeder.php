<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert([
            'nome' => 'Sistema de Estoque',
            'estimativa_horas' => 1000
        ]);
        DB::table('projetos')->insert([
            'nome' => 'Mapa Cultural',
            'estimativa_horas' => 500
        ]);
    }
}
