<?php

use App\Questionnaire;
use App\User;
use Illuminate\Database\Seeder;

class QuestionnairesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $creators = User::all()->pluck('id')->toArray();

        $faker = app(Faker\Generator::class);

        $questionnaires = factory(Questionnaire::class)
            ->times(50)
            ->make()
            ->each(function ($questionnaire, $index) use ($creators, $faker) {
                $questionnaire->creator = $faker->randomElement($creators);
            });

        Questionnaire::insert($questionnaires->toArray());
    }
}
