<?php

namespace Database\Seeders;
use App\SubjectUser;
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


        for ($i = 0; $i < 50; $i++) {
            SubjectUser::create([
                'subject_id' =>($i),
                'user_id' =>($i),
            ]);
        }



    }

}
