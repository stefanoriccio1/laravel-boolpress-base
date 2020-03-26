<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 4; $i++) {

        $newUser = new User;
        $newUser->name = $faker->name;
        $newUser->email = $faker->email;
        $newUser->password = $faker->email;
        $newUser->save();

      }
    }
}
