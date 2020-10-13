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
    return view('auth.login');
});

Auth::routes();

Route::match(["GET", "POST"], "/register", function(){
    return redirect("/login");
})->name("register");

Route::resource('merk', 'MerkController');

Route::resource('jenis', 'JenisController');
Route::resource('dealer', 'DealerController');
Route::resource('model_kendaraan', 'Model_KendaraanController');

Route::get('/home', 'HomeController@index')->name('home');
