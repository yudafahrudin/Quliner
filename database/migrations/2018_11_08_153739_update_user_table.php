<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTable extends Migration {

    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('admin', [0, 1]);
        });
    }

    public function down() {
        //
    }

}
