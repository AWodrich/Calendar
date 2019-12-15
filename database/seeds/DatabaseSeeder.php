<?php

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

        $this->call(ClubsTableSeeder::class);
        $this->call(DisciplinesTableSeeder::class);
        $this->call(SportingEventsTableSeeder::class);

    }
}
