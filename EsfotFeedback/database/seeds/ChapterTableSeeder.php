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
        // Vaciamos la tabla comments
        Chapters::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos todos los artículos de la bdd
        $subjects = App\Subject::all();

        foreach ($subjects as $subjects) {
            for($j=0; $j<5; $j++){
                Chapters::create([
                    'Topic' => $faker->word,
                    'Objetives' => $faker->paragraph,
                    'FK_idSubject' => $subjects->id,
                ]);
            }
        }
    }
}
