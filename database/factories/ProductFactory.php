<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph(1),
            'price' => $this->faker->randomFloat(2, 1, 10000),
            'image' => $this->faker->randomElement(['product_1.jpg', 'product_2.jpg', 'product_3.jpg']),
        ];
    }
}
