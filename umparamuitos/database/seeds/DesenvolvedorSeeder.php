<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesenvolvedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome' => 'Emanuel Costa', 'cargo' => 'Programador']);
        DB::table('desenvolvedores')->insert(['nome' => 'Glauber Bernardo', 'cargo' => 'Analista Sr.']);
        DB::table('desenvolvedores')->insert(['nome' => 'Josivan', 'cargo' => 'Analista Pleno']);
    }
}
