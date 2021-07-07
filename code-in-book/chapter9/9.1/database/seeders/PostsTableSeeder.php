<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $post = Post::create([
          'title' => $faker->realText(50),
          'detail' => $faker->realText(200),
          'views' => random_int(0, 200)
        ]);
    }
}
