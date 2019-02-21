<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            //Criação dos campos da tabela
            $table->increments('id');
            $table->integer('qtd')
            $table->string('descricao', 100);
            $table->float('prc_venda',8,2);
            $table->float('prc_compra',8,2);
            $table->integer('providers_id')->unsigned();
            $table->integer('classifications_id')->unsigned();
            $table->timestamps();

            //Bloco de criação das chaves estrangeiras
            $table->foreign('providers_id')
                  ->references('id')
                  ->on('providers');
            $table->foreign('classifications_id')
                  ->references('id')
                  ->on('classifications');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
