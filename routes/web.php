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

Route::get('/dailyBit', 'MainController@validator')->name('diaria'); //unused route, Validator method is now called
                                                                    //directly from the view

Route::get('/semanal', 'MainController@semanal');//unused

Route::get('diaria/op1', 'MainController@op1');

Route::get('diaria/op2', 'MainController@op2');

Route::get('diaria/op3', 'MainController@op3');

Route::get('diaria/op4', 'MainController@op4');

Route::get('diaria/op5', 'MainController@op5');

Route::get('diaria/op6', 'MainController@op6');

Route::get('diaria/op7', 'MainController@op7');

Route::get('diaria/op8', 'MainController@op8');

Route::get('/hola', 'MainController@hola');

Route::get('/diaria/op1/success', 'MainController@saver1');//En lugar de tener esta route hacer que en el dailyBit/op1
//se llame el metodo de saver 1 directamente y probar si devuelve la vista correctamente
//Update: cambiamos el nombre para hacerla semejante a nuestras rutas y sigue funcionando
Route::get('diaria/op2/success', 'MainController@saver2');

Route::get('diaria/op3/success', 'MainController@saver3');

Route::get('diaria/op4/success', 'MainController@saver4');

Route::get('diaria/op5/success', 'MainController@saver5');

Route::get('diaria/op6/success', 'MainController@saver6');

Route::get('diaria/op7/success', 'MainController@saver7');

Route::get('diaria/op8/success', 'MainController@saver8');

Route::get('/week/success', 'MainController@saveWeek');

Route::get('/dailyBit/end', 'MainController@endDaily');

Route::get('/month/success', 'MainController@saveWeek');

Route::get('/triMonth/success', 'MainController@saveWeek');

Route::get('/dailyBit/imprimir','MainController@imprimir')->name('imprimir');


Route::get('/diaria', 'MainController@diaria');
Route::get('/week/', 'MainController@semanal');
Route::get('/month', 'MainController@month'); //Not defined yet, it will only return specified view
Route::get('/triMonth', 'MainController@triMonth'); //Not defined yet, it will only return specified view
Route::get('/sixMonth', 'MainController@sixMonth');
Route::get('/year', 'MainController@year');