<?php

use Illuminate\Database\Seeder;

class SportingEventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\SportingEvent', 10)->create();

    }
}
