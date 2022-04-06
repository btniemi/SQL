<?php

namespace Database\Factories;

use App\Models\movies;
use App\Models\people;
use Database\Seeders\PeopleSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\watched>
 */
class WatchedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'peopleId'=> People::factory()->create(),
            'movieId'=> Movies::factory()->create(),
            'stars' => $this->faker->numberBetween(1,5),
            'comments' => $this->faker->sentence(5),
        ];
    }
}
