<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('umparamuitos_produtos')->insert([
            'nome' => 'BOLO MOLE',
            'preco' => 13,
            'estoque' => 1,
            'categoria_id' => 1
        ]);
        DB::table('umparamuitos_produtos')->insert([
            'nome' => 'BOLO FOFO',
            'preco' => 13,
            'estoque' => 1,
            'categoria_id' => 1
        ]);
        DB::table('umparamuitos_produtos')->insert([
            'nome' => 'BOLO CONFEITADO',
            'preco' => 13,
            'estoque' => 1,
            'categoria_id' => 1
        ]);
        DB::table('umparamuitos_produtos')->insert([
            'nome' => 'MINIBOLO',
            'preco' => 13,
            'estoque' => 1,
            'categoria_id' => 1
        ]);
        DB::table('umparamuitos_produtos')->insert([
            'nome' => 'BOLO MESCLADO',
            'preco' => 13,
            'estoque' => 1,
            'categoria_id' => 1
        ]);
        DB::table('umparamuitos_produtos')->insert([
            'nome' => 'BOLO GOURMET',
            'preco' => 13,
            'estoque' => 1,
            'categoria_id' => 1
        ]);
    }
}
