<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaCorrentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta_correntes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('agencia');
            $table->string('inscr_federal');
            $table->string('digito_agencia');
            $table->string('conta_corrente');
            $table->string('conta_corrente_digito');
            $table->float('conta_corrente_saldo', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conta_correntes');
    }
}
