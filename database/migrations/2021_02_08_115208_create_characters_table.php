<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('gender', 255);
            $table->string('race');
            $table->string('class');
            $table->string('name');
            $table->string('hair');
            $table->string('skin');
            $table->string('eyes');
            $table->string('age');
            $table->string('size');
            $table->string('weight');
            $table->string('appearance', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
