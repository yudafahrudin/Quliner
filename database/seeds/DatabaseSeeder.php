<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run() {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('admin123'),
            'admin' => 1,
            'created_at' => Carbon::parse('1996-02-26'),
            'updated_at' => Carbon::parse('1996-02-26')
        ]);
    }
}
