<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()     {
        // Vaciar la tabla.
          Article::truncate();

        $faker = \Faker\Factory::create();

        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 50; $i++) {
            Article::create([
                'name' => $faker->name,
                'last_name' => $faker->lastName,
                'career' => $faker->text,

                ]);
        }
    }
}
