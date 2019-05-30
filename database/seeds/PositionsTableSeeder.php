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
            'name' => 'national manager',
        ]);

        DB::table('positions')->insert([
            'name' => 'division manager',
        ]);

        DB::table('positions')->insert([
            'name' => 'area manager',
        ]);

        DB::table('positions')->insert([
            'name' => 'supervisor',
        ]);

        DB::table('positions')->insert([
            'name' => 'salesman',
        ]);
    }
}
