<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComissarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comissarios', function (Blueprint $table) {
            $table->increments('id_comissario');
            $table->string('nome');
            $table->string('cpf');
            $table->string('telefone');
            $table->string('email')->nullable();
            $table->string('cidade_uf');
            $table->timestamps();
        });

        Schema::create('comissarios_eventos', function (Blueprint $table) {
            $table->increments('id_relacao_comissario_evento');
            $table->integer('id_evento');
            $table->integer('id_comissario');
            $table->timestamps();

            $table->foreign('id_evento')
                ->references('id_evento')
                ->on('eventos')
                ->onDelete('CASCADE');

            $table->foreign('id_comissario')
                ->references('id_comissario')
                ->on('comissarios')
                ->onDelete('CASCADE');
        });

        Schema::create('comissarios_ingressos', function (Blueprint $table) {
            $table->increments('id_comissario_ingresso');
            $table->integer('id_relacao_comissario_evento');
            $table->integer('ingressos_recebidos')->nullable();
            $table->integer('ingressos_vendidos')->nullable();
            $table->float('total')->nullable();

            $table->timestamps();

            $table->foreign('id_relacao_comissario_evento')
                ->references('id_relacao_comissario_evento')
                ->on('comissarios_eventos')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comissarios_ingressos');
        Schema::dropIfExists('comissarios_eventos');
        Schema::dropIfExists('comissarios');
    }
}
