<?php

use Illuminate\Database\Seeder;
use App\Post;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

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
          $post = new Post;

          $post->title = $faker->text($manNbChars= 100);
          $post->content = $faker->text($manNbChars= 200);
          $post->slug = Str::slug($post->title);
          $post->author = $faker->name();
          $post->save();


        }
    }
}
