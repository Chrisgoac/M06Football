<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Team::factory()
            ->count(36)
            ->sequence(fn ($sequence) => ['' => 'Team '.$sequence->index])
            ->hasPlayers(15)
            ->create();
    }
}
