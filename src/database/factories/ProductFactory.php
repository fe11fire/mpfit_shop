<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition()
    {
        return [
            'title' => ucfirst($this->faker->word(2, true)),
            'price' => $this->faker->numberBetween(100, 10000),
            'description' => $this->faker->realText(),
            'category_id' => Category::query()->inRandomOrder()->value('id')
        ];
    }
}
