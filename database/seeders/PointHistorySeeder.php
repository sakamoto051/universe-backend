<?php

namespace Database\Seeders;

use App\Models\PointHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PointHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 10; $i++) {
            PointHistory::factory()->create([
                'user_id'    => $i,
                'point'      => 100 * $i,
                'point_type' => 10,
            ]);
            PointHistory::factory()->create([
                'user_id'    => $i,
                'point'      => -50,
                'point_type' => 10,
            ]);
            PointHistory::factory()->create([
                'user_id'    => $i,
                'point'      => 20,
                'point_type' => 99,
            ]);
            PointHistory::factory()->create([
                'user_id'    => $i,
                'point'      => -30 * $i,
                'point_type' => 10,
            ]);
            PointHistory::factory()->create([
                'user_id'    => $i,
                'point'      => -10,
                'point_type' => 99,
            ]);
            PointHistory::factory()->create([
                'user_id'    => $i,
                'point'      => 50 * $i,
                'point_type' => 99,
            ]);
        }
    }
}
