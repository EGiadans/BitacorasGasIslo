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

/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'MainController@inicio');

Route::get('/dailyBit', 'MainController@validator')->name('diaria');

Route::get('/semanal', 'MainController@semanal');

Route::get('dailyBit/op1', 'MainController@op1');

Route::get('/hola', 'MainController@hola');

Route::get('/dailyBit/op1/success', 'MainController@saver');

Route::get('/week/success', 'MainController@saveWeek');

Route::get('dailyBit/op4', 'MainController@op4');

Route::get('/dailyBit/end', 'MainController@endDaily');

Route::get('/month/success', 'MainController@saveWeek');

Route::get('/triMonth/success', 'MainController@saveWeek');

Route::get('/dailyBit/imprimir','MainController@imprimir')->name('imprimir');