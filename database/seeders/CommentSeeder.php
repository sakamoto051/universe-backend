<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 4; $i++) {
            Comment::factory()->create([
                'user_id' => 1,
                'thread_id' => 1,
            ]);
        }
        for ($i = 0; $i < 4; $i++) {
            Comment::factory()->create([
                'user_id' => 2,
                'thread_id' => 2,
            ]);
        }
    }
}