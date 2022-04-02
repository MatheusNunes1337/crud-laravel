<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostagemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagems', function (Blueprint $table) {
            $table->id();
            $table->string('conteudo');
            $table->foreignId('grupo_id')->references('id')->on('grupos')
            ->cascadeOnDelete();
            $table->foreignId('autor_id')->references('id')->on('usuarios')
            ->cascadeOnDelete();
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
        Schema::dropIfExists('postagems');
    }
}
