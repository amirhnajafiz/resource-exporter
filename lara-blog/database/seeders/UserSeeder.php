<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Class UserSeeder
 * @package Database\Seeders
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(20)
            ->has(Post::factory(10)->has(Image::factory(1))->afterCreating(function ($post) {
                $tags = Tag::query()->pluck('id')->random(rand(3, 10))->toArray();
                $categories = Category::query()->pluck('id')->random(rand(1, 5))->toArray();
                $post->tags()->sync($tags);
                $post->categories()->sync($categories);
            }))
            ->create();
    }
}
