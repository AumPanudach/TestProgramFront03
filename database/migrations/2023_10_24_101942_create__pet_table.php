<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_pet', 100);
            $table->integer('animal_id')->unsigned();
            $table->float('price')->nullable();
            $table->integer('stock_qty')->nullable();
            $table->string('image_url', 200)->nullable();
            $table->timestamps();
            $table->foreign('animal_id')->references('id')->on('animal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet');
    }
}
