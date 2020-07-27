<?php

use App\Subject;
use Illuminate\Database\Seeder;


class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Subject::truncate();

        $faker = \Faker\Factory::create();

        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
            Subject::create([
                'name' =>'materia '.($i+1),
                'week_hours' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
