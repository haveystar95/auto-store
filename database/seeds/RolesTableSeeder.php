<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'administrator',

        ]);

        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'guest',

        ]);

        DB::table('roles')->insert([
            'id' => '3',
            'name' => 'customer',

        ]);

        DB::table('roles')->insert([
            'id' => '4',
            'name' => 'manager',

        ]);

        DB::table('roles')->insert([
            'id' => '5',
            'name' => 'guest',

        ]);
    }
}
