<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Questions resource exclude the show route to be able to manually define it to use slug
Route::resource('questions', 'QuestionsController')->except('show');

//Show route
Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');