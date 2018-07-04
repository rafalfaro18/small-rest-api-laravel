<?php

use Illuminate\Database\Seeder;
use App\Person;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Person::truncate();

        $faker = \Faker\Factory::create();

        for($i = 0; $i < 2; $i++){
          Person::create([
            'firstname' => $faker->name,
          ]);
        }
    }
}
