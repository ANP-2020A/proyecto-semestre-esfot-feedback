<?php

use App\Subject_User;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class Subjects_UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciamos la tabla comments
             Subject_User::truncate();
        $faker = \Faker\Factory::create();


        for ($i = 0; $i < 50; $i++) {
            Subject_User::create([

                'subject_id' =>($i),
                'user_id' =>($i),
            ]);
        }



    }

}
