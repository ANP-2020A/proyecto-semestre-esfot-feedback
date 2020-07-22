<?php

use App\Answer;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Answer::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 25; $i++) {
            Answer::create([
                'Fk_idQuestion' =>  $faker->numberBetween(1,5),
                'FK_idUser' => $faker->uuid,
                'FK_idChapter' => $faker->uuid,
                'Value' => $faker->numberBetween(1,5)
            ]);
        }
    }
}
