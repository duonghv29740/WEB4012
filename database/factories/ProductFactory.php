<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
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
        $name = $this->faker->name();
        return [
            //
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'short_description' => $this->faker->text(),
            'price' => $this->faker->numberBetween(100000,300000),
            'thumbnail_url' => $this->faker->imageUrl($width = 640, $height = 480),
            'quantity' => $this->faker->numberBetween(100,150),
            'status' => $this->faker->numberBetween(0,1),
            'category_id' => $this->faker->numberBetween(10)
        ];
    }
}
