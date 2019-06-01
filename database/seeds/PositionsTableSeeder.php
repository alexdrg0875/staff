<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'name' => 'National manager',
        ]);

        DB::table('positions')->insert([
            'name' => 'Division manager',
        ]);

        DB::table('positions')->insert([
            'name' => 'Area manager',
        ]);

        DB::table('positions')->insert([
            'name' => 'Supervisor',
        ]);

        DB::table('positions')->insert([
            'name' => 'Salesman',
        ]);
    }
}
