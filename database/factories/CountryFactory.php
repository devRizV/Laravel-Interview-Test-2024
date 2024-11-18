<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $countryCode = $this->faker->unique()->countryCode();
        $flag = 'html/assets/img/country_png_flags/' . $countryCode . ".png";
        return [
            'name' => $this->faker->unique()->country(),
            'code' => $countryCode,
            'flag' => $flag,
            'user_id' => fn() => User::inRandomOrder()->first()->id,
        ];
    }
}
