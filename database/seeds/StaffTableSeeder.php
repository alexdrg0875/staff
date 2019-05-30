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
        $counterId = 1;
        DB::table('staff')->insert([
            'name' => Str::random(10),
            'user_id' => 1,
            'position_id' => 1,
            'salary' => 40000,
            'parent_id' => NULL,
            'started_at' => '2019-01-1 12:00:00',
        ]);
        $i1 = 1;
        while ( $i1 <= 10) {
            $counterId++;
            DB::table('staff')->insert([
                'name' => Str::random(10),
                'user_id' => 1,
                'position_id' => 2,
                'salary' => 30000,
                'parent_id' => 1,
                'started_at' => '2019-01-1 12:00:00',
            ]);

            $i2 = 1;
            $parentId3 = $counterId;
            while ( $i2 <= 10) {
                $counterId++;
                DB::table('staff')->insert([
                    'name' => Str::random(10),
                    'user_id' => 1,
                    'position_id' => 3,
                    'salary' => 20000,
                    'parent_id' => $parentId3,
                    'started_at' => '2019-01-1 12:00:00',
                ]);

                $i3 = 1;
                $parentId4 = $counterId;
                while ( $i3 <= 20) {
                    $counterId++;
                    DB::table('staff')->insert([
                        'name' => Str::random(10),
                        'user_id' => 1,
                        'position_id' => 4,
                        'salary' => 14000,
                        'parent_id' => $parentId4,
                        'started_at' => '2019-01-1 12:00:00',
                    ]);

                    $i4 = 1;
                    $parentId5 = $counterId;
                    while ( $i4 <= 25) {
                        $counterId++;
                        DB::table('staff')->insert([
                            'name' => Str::random(10),
                            'user_id' => 1,
                            'position_id' => 5,
                            'salary' => 12000,
                            'parent_id' => $parentId5,
                            'started_at' => '2019-01-1 12:00:00',
                        ]);
                        $i4++;
                    }
                    $i3++;
                }
                $i2++;
            }
            $i1++;
        }

    }
}
