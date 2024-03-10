<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Team::factory()
            ->count(36)
            ->sequence(fn ($sequence) => ['name' => 'Team '.$sequence->index])
            ->hasPlayers(15)
            ->create();
    }
}
