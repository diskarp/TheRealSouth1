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

        $category = Category::factory()->create([
            "name"=> "tecnologia",
            "slug"=> "tecnologia"
        ]);

        $category2 = Category::factory()->create([
            "name"=> "videojuegos",
            "slug"=> "videojuegos"
        ]);

        $category3 = Category::factory()->create([
            "name"=> "actualidad",
            "slug"=> "actualidad"
        ]);

        Post::factory()->count(2)->create([
            "category_id"=> $category->id
        ]);

        Post::factory()->count(3)->create([
            "category_id"=> $category2->id
        ]);

        Post::factory()->count(4)->create([
            "category_id"=> $category3->id
        ]);

    }
}
