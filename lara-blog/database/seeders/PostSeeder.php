<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users[rand(0, count($users)-1)];
        $faker = Factory::create();
        DB::table('posts')->insert([
            'title' => $faker->text(20),
            'content' => $faker->sentence(30, true),
            'creator' => $user->id
        ]);
    }
}
