<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodhomeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodhome_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('foodhome_id')->unsigned();
            $table->foreign('foodhome_id')
                    ->references('id')->on('foodhomes')
                    ->onDelete('cascade');
            $table->string('url')->nullable();
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
        Schema::dropIfExists('foodhome_images');
    }
}
