<?php

namespace Database\Factories;

use App\Models\Route;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesRepresentativeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       // get a random sales manager id
        $manager_id = User::get()->random()->id;

        // get a random route id
        $route_id = Route::get()->random()->id;

        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'telephone' => $this->faker->numerify('##########'), // Validations are allowed only 10 digit number
            'joined_date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'route_id' => $route_id,
            'manager_id' => $manager_id,
            'comments' => $this->faker->sentence(5),
        ];
    }
}
