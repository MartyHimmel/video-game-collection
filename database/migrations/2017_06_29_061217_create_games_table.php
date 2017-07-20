<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('platform');
            $table->string('developer')->nullable();
            $table->string('publisher')->nullable();
            $table->string('release_date')->nullable();
            $table->string('region')->nullable();
            $table->string('genre')->nullable();
            $table->string('box_front')->nullable();
            $table->string('box_back')->nullable();
            $table->string('cart_cover')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
