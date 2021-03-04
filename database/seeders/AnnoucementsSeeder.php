<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Annoucements;
use Illuminate\Database\Seeder;

class AnnoucementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Annoucements::factory()
            ->count(3)
            ->for(User::all()->random())
            ->create();
    }
}
