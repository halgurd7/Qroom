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
    public function definition()
    {
        return [
            'item_name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(10,100),
            'quantity' => $this->faker->numberBetween(1,30),
            'subtotal' => $this->faker->randomDigitNotNull(),
            'note' => $this->faker->paragraph(4)
        ];
    }
}