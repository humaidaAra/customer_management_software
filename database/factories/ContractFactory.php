<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->merge(['customer_id' => auth()->user()->id]);
        return [
            'customer_id'=> fake()->randomDigit(),
            'start_date'=>fake()->date(),
            'expire_date'=>fake()->date(),
            'payment'=>fake()->numberBetween(100, 5000000),
            'created_by'=>1
        ];
    }
}
