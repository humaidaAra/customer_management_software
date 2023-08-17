<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'contract_id'=>fake()->numberBetween(1,2),
            'customer_name'=>fake()->name(),
            'invoice_date'=>fake()->date(),
            'total'=>fake()->randomFloat(2, 100, 200),
            'status'=>fake()->numberBetween(0,2),
        ];
    }
}
