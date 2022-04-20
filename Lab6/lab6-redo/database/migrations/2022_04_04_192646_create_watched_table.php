<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watched', function (Blueprint $table) {
            $table->unsignedBigInteger('peopleId');
            $table->unsignedBigInteger('movieId');
            $table->integer('stars');
            $table->text('comments');
            $table->timestamps();

            $table->foreign('peopleId')->references('id')->on('people')->cascadeOnDelete();
            $table->foreign("movieID")->references('id')->on('movies')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('watched');
    }
};
