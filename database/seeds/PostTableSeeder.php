<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {
          $newPost = new Post;
          

        }
    }
}