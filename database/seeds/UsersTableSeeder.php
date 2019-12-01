<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Denis',
            'email' => 'haveystar95@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => '1'
        ]);
    }
}
