<?php

namespace Database\Factories;

use App\Services\LocalDriverExchange;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'currency' => collect(LocalDriverExchange::CURRENCY)->random(),
            'hourly_rate' => rand(1,50),
        ];
    }
}
