<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class PostFactory
 * @package Database\Factories
 */
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
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(rand(2, 5), true),
            'content' => $this->faker->sentence(rand(7, 20), true),
            'allow_comments' => rand(0, 1)
        ];
    }
}
