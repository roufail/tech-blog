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


        Route::get('/users/{user}/approve','UsersController@approve')->name('users.approve');
        Route::get('/users/{user}/reject','UsersController@reject')->name('users.reject');

        Route::Resource('users', 'UsersController',[
            'names' => [
                'index' => 'users.index',
                'create' => 'users.create',
                'store' => 'users.store',
                'edit' => 'users.edit',
                'update' => 'users.update',
                'destroy' => 'users.destroy',
            ]
        ])->except(['show']);

        Route::get('/comments/{comment}/approve','CommentsController@approve')->name('comments.approve');
        Route::get('/comments/{comment}/reject','CommentsController@reject')->name('comments.reject');
        Route::Resource('comments', 'CommentsController',[
            'names' => [
                'index' => 'comments.index',
                'show' => 'comments.show',
                'destroy' => 'comments.destroy',
            ]
        ])->except(['create','store','edit','update']);




        Route::Resource('pages', 'PagesController',[
            'names' => [
                'index' => 'pages.index',
                'create' => 'pages.create',
                'store' => 'pages.store',
                'edit' => 'pages.edit',
                'update' => 'pages.update',
                'destroy' => 'pages.destroy',
            ]
        ])->except(['show']);


    // });

});

