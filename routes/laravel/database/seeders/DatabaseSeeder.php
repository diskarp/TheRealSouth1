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


    }
}
