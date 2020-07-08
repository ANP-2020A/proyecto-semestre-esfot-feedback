<?php

use App\Teacher;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['ASI', 'ASA','ET', 'EM','TSASA', 'TSRT','TSDS', 'TSEM'];
        // Vaciar la tabla.
        Teacher::truncate();

        $faker = \Faker\Factory::create();

        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
            Teacher::create([
                'Names' => $faker->firstName,
                'Surnames' => $faker->lastName,
                'Career' => $faker->randomElement($array),
            ]);
        }
    }
}
