<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraphs(rand(3,7), true),
        'user_id' => App\User::pluck('id')->random(),// This line populates the user_id column with random values but that are among the registered user id in the users table
        'votes_count' => rand(0,5),
    ];
});
