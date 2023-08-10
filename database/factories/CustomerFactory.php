<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->name(),
            'phone'=> fake()->phoneNumber(),
            'address'=> fake()->address(),
            'free_trial'=>fake()->text(),
            'start_date'=>fake()->date(),
            'created_by'=>fake()->randomDigit()
        ];
    }
}
