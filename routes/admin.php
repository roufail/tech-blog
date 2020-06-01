<?php


Route::group(['namespace' => 'Admin','prefix' =>'admin','as'=>'admin.'],function(){

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->name('register.post');

    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@Login')->name('login.post');


    Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/reset','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    Route::get('reset/password/{token}','Auth\ResetPasswordController@showResetForm')->name('reset.password');
    Route::post('reset/password','Auth\ResetPasswordController@reset')->name('password.update');

    // Route::group(['middleware' => 'auth:admin'],function(){
        Route::get('home', 'DashboardController@index')->name('home');
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
        Route::Resource('categories', 'CategoriesController');

    // });

});

