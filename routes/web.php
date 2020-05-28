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
Route::get('/admin', function () {
    return view('admin.dashboard');
});


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/admin/register', 'Admin\Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/admin/register', 'Admin\Auth\RegisterController@register')->name('admin.register.post');





Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\Auth\LoginController@Login')->name('admin.login.post');

Route::get('/admin/logout', 'Admin\Auth\LoginController@logout')->name('admin.logout');

Route::get('/admin/password/reset','Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/admin/password/reset','Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');



Route::get('/admin/reset/password/{token}','Admin\Auth\ResetPasswordController@showResetForm')->name('admin.reset.password');
Route::post('/admin/reset/password','Admin\Auth\ResetPasswordController@reset')->name('admin.password.update');





Route::group(['middleware' => 'auth:admin'],function(){
    Route::get('/admin/home', 'Admin\DashboardController@index')->name('admin.home');
});

