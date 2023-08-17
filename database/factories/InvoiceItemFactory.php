<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id'=>fake()->numberBetween(1,2),
            'item_name'=>fake()->colorName(),
            'price'=>fake()->numberBetween(100,200),
            'discount'=>fake()->numberBetween(0, 70),
            'quantity'=>fake()->randomDigit(),
            'subtotal'=>fake()->numberBetween(1000, 2000),
        ];
    }
}
