<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {
    return [
        //The rtrim() function removes the . at the end of each sentence.
        // If I want I can leave this. The rand() specifies the number of words in each sentence which here is within 5-10
        'title' => rtrim($faker->sentence(rand(5,10)), '.'),
        //The true here converts the returned paragraph array into a string
        'body' => $faker->paragraphs(rand(3,7), true),
        'views' => rand(0,10),
        // 'answers_count' => rand(0,10), this line is commented out now because the code has been updated to use Laravel events inside the Answer model
        'votes' => rand(-3,10)
    ];
});
