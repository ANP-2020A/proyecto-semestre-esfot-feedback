<?php

namespace Database\Seeders;

use App\Answer;
use App\Chapters;
use App\Question;
use App\SubjectUser;
use App\User;
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
        $users = User::where('role', 'ROLE_STUDENT')->get();
        foreach ($users as $user) {         // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123']);

            $question = Question::all();
            // Obtenemos todos los chapters de la bdd
            $subject_users = SubjectUser::where('user_id', $user->id)->get();


            foreach ($subject_users as $subject_user) {
                $chapters = $subject_user->subject->chapters;
                foreach ($chapters as $chapter) {
                    foreach ($question as $questions) {
//                        $num_answere = 5;
//                        for ($j = 0; $j < $num_answere; $j++) {
                            Answer::create([
                                'FK_idUser' => $user->id,
                                'FK_idChapter' => $chapter->id,
                                'FK_idQuestion' => $questions->id,
                                'subject_user_id' => $subject_user->id,
                                'Value' => $faker->numberBetween(1, 5)


                            ]);
//                        }
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
