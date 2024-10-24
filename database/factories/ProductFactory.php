<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'display_name' => $this->faker->words(2, true),
            'code' => Str::random(10),
            'image_path' => $this->faker->imageUrl(640, 480, 'products', true),
            'description' => $this->faker->sentence,
            'category_id' => Category::factory(),  // Creates a new category for the product
        ];
    }
}
