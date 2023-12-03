<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlocacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alocacoes', function (Blueprint $table) {
            $table->integer('desenvolvedor_id')->unsigned();
            $table->integer('projeto_id')->unsigned();
            $table->integer('horas_semanais');
            $table->foreign('desenvolvedor_id')->references('id')->on('desenvolvedores');
            $table->foreign('projeto_id')->references('id')->on('projetos');
            $table->timestamps();
            $table->primary(['desenvolvedor_id', 'projeto_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alocacaos');
    }
}
