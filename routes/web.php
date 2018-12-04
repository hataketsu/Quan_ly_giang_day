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
    Route::redirect('/home', '/');
    Route::get('/', 'HomeController@index')->name('home');

    foreach (['Mon_hoc_Controller' => 'mon_hoc',
                 "Khoa_Controller" => 'khoa',
                 "Nganh_Controller" => "nganh",
                 "Khoa_dao_tao_Controller" => "khoa_dao_tao",
                 "Hoc_phan_Controller" => 'hoc_phan',
                 "Lop_Controller" => 'lop',
                 "Giang_vien_Controller" => 'giang_vien',
                 "Phan_cong_giang_day_Controller" => 'phan_cong_giang_day',
                 "Phong_hoc_Controller" => 'phong_hoc',
             ] as $controller => $path) {
        Route::resource("/$path", "$controller");
        Route::get("/$path/{id}/delete", "$controller@delete");
        Route::post("/$path/mass_delete", "$controller@mass_delete");
    }

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