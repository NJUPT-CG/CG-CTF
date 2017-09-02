<?php

use Illuminate\Database\Seeder;

class ChallengeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\challenge::class, function (Faker\Generator $faker) {
            $type = ['Web', 'Re', 'Pwn', 'Crypto', 'Misc'];

            return [
                'title' => $faker->title,
                'class' => $faker->randomElement($type),
                'description' => $faker->realText($maxNbChars = 100),
                'url' => $faker->url,
                'flag' => $faker->sha256,
                'score' => $faker->numberBetween($min = 1, $max = 100),
            ];
        });
    }
}
