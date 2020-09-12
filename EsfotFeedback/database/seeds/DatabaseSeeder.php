<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        $this->call(UsersTableSeeder::class);
        $this->call(SubjectTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(ChapterTableSeeder::class);
        $this->call(SubjectsUsersTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
