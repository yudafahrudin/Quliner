<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodHomeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('foodhomes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('categorie_id')->unsigned();
            $table->foreign('categorie_id')
                    ->references('id')->on('categories')
                    ->onDelete('cascade');
            $table->string('name');
            $table->string('address');
            $table->float('map_x');
            $table->float('map_y');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('foodhomes');
    }

}
