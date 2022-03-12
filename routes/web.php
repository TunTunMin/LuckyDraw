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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    // Route::get('/', function(){
    //     return view('index');
    // });
    Route::get('/','HomeController@index');
    Route::get('/winning_number_form','Winning_NumberController@winning_form');
    Route::get('/do_winning','Winning_NumberController@do_winning');

    Route::post('/save_winning','Winning_NumberController@save_winning');



    Route::resource('prize', 'PrizeController');
    Route::resource('customer', 'CustomerController');
    Route::resource('lucky_number','Lucky_NumberController');
    Route::resource('winning_number','Winning_NumberController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
