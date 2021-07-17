<?php

namespace Database\Seeders;
use App\Subject;
use App\SubjectUser;
use App\User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class SubjectsUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciamos la tabla comments
             SubjectUser::truncate();
        $faker = \Faker\Factory::create();

        $users = User::all();

        foreach ($users as $user) {
            $num_subjects = $faker->randomNumber([1,8], true);

            for($i = 0; $i < $num_subjects; $i++) {
                SubjectUser::create([
                    'subject_id' => $faker->randomNumber([2, 49], true),
                    'user_id' => $user->id,
                ]);
            }
        }



    }

}
