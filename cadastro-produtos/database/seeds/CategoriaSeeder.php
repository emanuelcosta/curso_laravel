<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('umparamuitos_categorias')->insert(['nome' => 'BOLOS FEITOS NA HORA']);
        DB::table('umparamuitos_categorias')->insert(['nome' => 'Minibolos']);
        DB::table('umparamuitos_categorias')->insert(['nome' => 'Pronta-Entrega']);
        DB::table('umparamuitos_categorias')->insert(['nome' => 'Salgados']);
        DB::table('umparamuitos_categorias')->insert(['nome' => 'Confeitados']);
    }
}
