<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Comments;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comments::factory()
            ->count(3)
            ->create();
    }
}
