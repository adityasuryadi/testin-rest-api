<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=>fake()->uuid(),
            'name' => fake()->randomElement(['mie','susu','kopi','minyak','teh','paku','semen','pasir','pipa','bata','cat']),
            'price' => fake()->random_int(1000, 10000),
            'stock' => fake()->random_int(1,100),
        ];
    }
}
