<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();



        $user = User::factory()->create([
            "name"=> "John Doe"
        ]);

        $user2 = User::factory()->create([
            "name"=> "Carl Jones"
        ]);


        Post::factory()->count(5)->create([
            "user_id"=> $user->id
        ]);

        Post::factory()->count(4)->create([
            "user_id"=> $user2->id
        ]);

    }
}
