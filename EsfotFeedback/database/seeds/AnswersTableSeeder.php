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

        // Vaciamos la tabla answers
        Answer::truncate();
        $faker = \Faker\Factory::create();
        // Obtenemos todos los question de la bdd
        $question = App\Question::all();
        // Obtenemos todos los chapters de la bdd
        $chapter = App\Chapters::all();
        foreach($chapter as $chapters){
            foreach ($question as $questions) {
                for($j=0; $j<2; $j++){
                    Answer::create([
                        'FK_idUser' => $faker->uuid,
                        'FK_idChapter' => $chapters->id,
                        'FK_idQuestion' => $questions->id,
                        'Value' => $faker->numberBetween(1,5)
                    ]);
                }
            }
        }
    }
}
