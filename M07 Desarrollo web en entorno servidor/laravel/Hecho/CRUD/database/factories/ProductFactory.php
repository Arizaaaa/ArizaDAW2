<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() { // Llena los campos con datos aleatorios
        return [
            
            'name' => fake()->word(),
            'stock' => rand(1, 999),
            'price' => rand(1, 100),
            'idCategory' => rand(1, 100),

        ];
    }
}
