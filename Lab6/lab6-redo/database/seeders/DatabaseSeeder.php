<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // create variables for factory stuff of people and movies
        // the pass that into a double 4loop and get your people and movie and then see the watched
        // this would give more flexibility for seeding later on as needed
        // basically copy what is in the seeders for people and movies set them as variables and then do the loop and get them out

        $this->call([
            //PeopleSeeder::class,
            //MoviesSeeder::class,
            WatchSeeder::class,
        ]); //this runs all seeders in one file to departmentalize the stuff in seeders for easy code manipulation
    }
}
