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
            'role_id' => 1,
            'is_active' => 1,
            'name' => 'administrator',
            'email' => 'administrator@gmail.com',
            'password' => bcrypt('administrator'),
        ]);
    }
}
