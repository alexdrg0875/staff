<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
//    $i = 0;
//      while ($i < 100) {
//        $this->call(StaffTableSeeder::class);
//        $i++;
//      }
    }
}
