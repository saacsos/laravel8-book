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
        Post::factory(20)->create();
    }
}
