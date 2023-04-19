<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
// Route::get('/', 'WelcomeController@index')->name('index');
Route::get('/play', 'WelcomeController@play_game')->name('play');
Route::get('/play/memory-game', 'WelcomeController@play_memory_game')->name('play_memory_game');
Route::get('/play/running-ron', 'WelcomeController@play_running_ron')->name('play_running_ron');
Route::get('/play/running-ron-lifelike', 'WelcomeController@play_running_ron_lifelike')->name('play_running_ron_lifelike');
Route::get('/play/running-ron-abstract', 'WelcomeController@play_running_ron_abstract')->name('play_running_ron_abstract');
Route::get('/play/running-ron-hybrid', 'WelcomeController@play_running_ron_hybrid')->name('play_running_ron_hybrid');
Route::get('/play/running-ron-medium-humanlike', 'WelcomeController@play_running_ron_medium_humanlike')->name('play_running_ron_medium_humanlike');
Route::get('/play/word-search', 'WelcomeController@play_word_search')->name('play_word_search');

Route::get('/home-game', 'WelcomeController@home_game')->name('home_game');
Route::get('/memory-game', 'WelcomeController@memory_game')->name('memory_game');
Route::get('/running-ron', 'WelcomeController@runningron_game')->name('running_ron');
Route::get('/running-ron-lifelike', 'WelcomeController@runningron_lifelike')->name('running_ron_lifelike');
Route::get('/running-ron-abstract', 'WelcomeController@runningron_abstract')->name('running_ron_abstract');
Route::get('/running-ron-hybrid', 'WelcomeController@runningron_hybrid')->name('running_ron_hybrid');
Route::get('/running-ron-medium-humanlike', 'WelcomeController@runningron_medium_humanlike')->name('running_ron_medium_humanlike');
Route::get('/word-search', 'WelcomeController@wordsearch_game')->name('word_search');

Route::get('/', 'HomeController@home')->name('home');

Route::get('/badge', 'BadgeController@index');

Route::get('/achievements', 'AchievementController@index');

Route::prefix('profile')->group(function(){
    Route::get('/', 'ProfileController@profile')->name('profile');
    Route::get('/{user}/edit', 'ProfileController@edit');
    Route::post('/{user}', 'ProfileController@update');
    Route::get('/{user}/avatar', 'ProfileController@avatar');
    Route::patch('/{user}/update', 'ProfileController@update_avatar');
    Route::patch('/{mission}', 'ProfileController@complete');
    Route::post('/', 'ProfileController@store');
    Route::delete('/{mission}', 'ProfileController@delete_mission');
});


Route::prefix('task')->group(function(){
    Route::get('/add', 'TaskController@create');
    Route::get('/completed', 'TaskController@completed_tasks');
    Route::get('/overdue', 'TaskController@incomplete_tasks');
    Route::post('/', 'TaskController@store');
    Route::get('/', 'TaskController@show');
    Route::delete('/{task}', 'TaskController@destroy');
    Route::post('/{task}/edit', 'TaskController@edit');
    Route::post('/{task}', 'TaskController@update');
    Route::patch('/{task}', 'TaskController@complete');

});

Route::prefix('appointment')->group(function(){
    Route::get('/add', 'AppointmentController@create');
    Route::get('/upcoming', 'AppointmentController@upcoming');
    Route::get('/history', 'AppointmentController@history');
    Route::post('/', 'AppointmentController@store');
    Route::get('/', 'AppointmentController@show');
    Route::delete('/{appointment}', 'AppointmentController@destroy');
    Route::post('/{appointment}/edit', 'AppointmentController@edit');
    Route::post('/{appointment}', 'AppointmentController@update');
    Route::patch('/{appointment}/complete', 'AppointmentController@complete');/* 
    Route::patch('/{appointment}/incomplete', 'AppointmentController@incomplete'); */
});

Route::prefix('medication')->group(function(){
    Route::get('/add', 'MedicationController@create')->name('medication');
    Route::get('/ongoing', 'MedicationController@ongoing');
    Route::get('/stopped', 'MedicationController@stopped');
    Route::post('/', 'MedicationController@store')->name('medication');
    Route::get('/', 'MedicationController@show')->name('show');
    Route::delete('/{medication}', 'MedicationController@destroy');
    Route::post('/{medication}/edit', 'MedicationController@edit');
    Route::patch('/{medication}', 'MedicationController@update');
    Route::post('/{medication}/notification', 'MedicationController@notification');
});