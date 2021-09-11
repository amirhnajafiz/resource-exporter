<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(1)
            ->has(Tag::factory(2))
            ->has(Category::factory(2))
            ->has(Image::factory(1))
            ->create();
    }
}
