<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'display_name' => $this->faker->words(2, true),
            'code' => Str::random(10),
            'image_path' => $this->faker->imageUrl(640, 480, 'categories', true),
            'description' => $this->faker->sentence,
        ];
    }
}
