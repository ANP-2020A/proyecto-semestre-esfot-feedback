<?php

use App\Answer;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        $users = App\User::all();
        foreach ($users as $user) {         // iniciamos sesión con este usuario
                     JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);

            $question = App\Question::all();
            // Obtenemos todos los chapters de la bdd
            $chapter = App\Chapters::all();
                     // Y ahora con este usuario creamos algunos articulos
            $subject_user= App\Subject_User::all();

            foreach($subject_user as $subject_user){
            foreach($chapter as $chapters){
                foreach ($question as $questions) {
                    $num_answere = 5;
                    for ($j = 0; $j < $num_answere; $j++) {
                        Answer::create([

                            'FK_idUser' => $faker->uuid,
                            'FK_idChapter' => $chapters->id,
                            'FK_idQuestion' => $questions->id,
                            'user_subject_id' => $subject_user->id,
                            'Value' => $faker->numberBetween(1,5)


                        ]);
                    }
                }
            }
        }
        }




       /* $question = App\Question::all();
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
            }*/
    }
}

