<?php

namespace Database\Seeders;

use App\Models\User;
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
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'content' => Str::random(200),
            'creator' => $user->id
        ]);
    }
}
