<?php

namespace Database\Seeders;
use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        Question::truncate();
        $faker = \Faker\Factory::create();
        // Crear artículos ficticios en la tabla
        for ($i = 0; $i < 5; $i++) {
            Question::create([
                'Type' => 'Cerrada',
                'Text' => 'Soy la pregunta '.($i+1),
            ]);
        }
        for ($i = 0; $i < 1; $i++) {
            Question::create([
                'Type' => 'Abierta',
                'Text' => 'Campo de pregunta abierta ',
            ]);
        }
    }
}
