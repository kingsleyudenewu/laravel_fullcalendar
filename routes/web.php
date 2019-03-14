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


Route::get('/', 'EventController@index')->name('index');
Route::post('/events', 'EventController@store')->name('events.store');
Route::get('/events/{event}', 'EventController@show')->name('events.show');
Route::patch('/events/{event}', 'EventController@update')->name('events.update');