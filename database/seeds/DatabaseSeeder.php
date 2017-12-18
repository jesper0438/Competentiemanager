<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Project', 10)->create();
        factory('App\Vakexpert', 10)->create();
        factory('App\Student', 10)->create();
    }
}
