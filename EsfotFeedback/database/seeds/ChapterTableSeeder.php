<?php

use App\Chapters;
use Illuminate\Database\Seeder;

class ChapterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Chapters::truncate();

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++)
        {
            Chapters::create([
                'Topic' => $faker->word,
                'Objetives' => $faker->paragraph,
                ]);
        }
    }
}
