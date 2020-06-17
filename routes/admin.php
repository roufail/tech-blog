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
        Route::Resource('categories', 'CategoriesController',[
            'names' => [
                'index' => 'categories.index',
                'create' => 'categories.create',
                'store' => 'categories.store',
                'edit' => 'categories.edit',
                'update' => 'categories.update',
                'destroy' => 'categories.destroy',
            ]
        ])->except(['show']);



        Route::Resource('tags', 'TagsController',[
            'names' => [
                'index' => 'tags.index',
                'create' => 'tags.create',
                'store' => 'tags.store',
                'edit' => 'tags.edit',
                'update' => 'tags.update',
                'destroy' => 'tags.destroy',
            ]
        ])->except(['show']);

        Route::get('/posts/{post}/approve','PostsController@approve')->name('posts.approve');
        Route::get('/posts/{post}/reject','PostsController@reject')->name('posts.reject');
        Route::Resource('posts', 'PostsController',[
            'names' => [
                'index' => 'posts.index',
                'edit' => 'posts.edit',
                'update' => 'posts.update',
                'destroy' => 'posts.destroy',
            ]
        ])->except(['show','create','store']);
    // });

});

