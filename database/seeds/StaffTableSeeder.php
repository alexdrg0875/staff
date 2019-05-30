<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            'name' => Str::random(10),
            'user_id' => 1,
            'position_id' => 1,
            'salary' => 100000,
            'parent_id' => '',
            'started_at' => '2019-01-1 12:00:00',
        ]);

        $i = 0;
        while ( $i < 5) {
            DB::table('staff')->insert([
                'name' => Str::random(10),
                'user_id' => 1,
                'position_id' => 2,
                'salary' => 50000,
                'parent_id' => 1,
                'started_at' => '2019-01-1 12:00:00',
            ]);
         $i++;
        }

    }
}
