<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // since there must be a user to have a question, I need to use the each() function and then pass an anonymous 
        //function to it. The function takes a single user as a parameter and then access the questions relationship I 
        //defined in the Users model before making fake questions for each user depending on the range I specify
        //in the rand(). 
        //Instead of using create() I will use make() because create() inserts new entries while make() saves
        //data in the memory like updates a value based on existing record(s)
        factory(\App\User::class, 3)->create()->each(function($u){
            $u->questions()->saveMany(
                   factory(\App\Question::class, rand(1,5))->make()
              )
            //   This line makes answers for each question already in the db
              ->each(function ($q) {
                  $q->answers()->saveMany(factory(App\Answer::class, rand(1,5))->make());
              });
        }); 
    }
}
