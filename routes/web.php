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


Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::redirect('/home','/');
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/mon_hoc', 'Mon_hoc_Controller');
    Route::get('/mon_hoc/{id}/delete', 'Mon_hoc_Controller@delete');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/');
    });

    Route::get('/profile/', "ProfileController@info");
    Route::post('/profile/', "ProfileController@info");

    Route::get('/profile/change_pw', "ProfileController@change_pw");
    Route::post('/profile/change_pw', "ProfileController@change_pw");

    Route::get('/profile/change_avatar', "ProfileController@change_avatar");
    Route::post('/profile/change_avatar', "ProfileController@change_avatar");

});