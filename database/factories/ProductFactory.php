<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'cover' => $this->faker->word(),
            'price' => $this->faker->word(),
            'sale' => $this->faker->word(),
            'gallery' => $this->faker->word(),
            'published_at' => $this->faker->dateTime(),
            'status' => $this->faker->word(),
            'category_id' => Category::factory(),
        ];
    }
}
