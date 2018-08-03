<?php

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

Route::resource('questionnaire', 'QuestionnairesController');
Route::get('questionnaire/{questionnaire}/detail', 'QuestionnairesController@detail')->name('questionnaire.detail');

Route::get('form/{token}', 'FormGeneratorController@show')->name('form.generate');

Route::post('form/{token}/create', 'FormGeneratorController@store')->name('form.submit');
