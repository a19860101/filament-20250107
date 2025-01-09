<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'cover' => $this->faker->word(),
            'body' => $this->faker->text(),
            'published_at' => $this->faker->dateTime(),
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
        ];
    }
}
