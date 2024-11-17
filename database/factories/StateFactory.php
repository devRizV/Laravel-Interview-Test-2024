<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\State>
 */
class StateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->state();
        $stateCode = substr($name, 0, 3);

        return [
            'name' => $name,
            'state_code' => $stateCode,
            'country_id' => fn() => Country::inRandomOrder()->first()->id,
            'user_id' => fn() => User::inRandomOrder()->first()->id,
        ];
    }
}
