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

     Route::group(['middleware' => ['auth:admin','adminIsApproved']],function(){
        Route::get('/', 'DashboardController@index')->name('home');
        Route::get('home', 'DashboardController@index')->name('home');
        Route::get('logout', 'Auth\LoginController@logout')->name('logout');
        Route::Resource('categories', 'CategoriesController')->except(['show']);
        // tags
        Route::Resource('tags', 'TagsController')->except(['show']);
        //posts
        Route::get('/posts/{post}/approve','PostsController@approve')->name('posts.approve');
        Route::get('/posts/{post}/reject','PostsController@reject')->name('posts.reject');
        Route::Resource('posts', 'PostsController')->except(['show','create','store']);
        //users
        Route::get('/users/{user}/approve','UsersController@approve')->name('users.approve');
        Route::get('/users/{user}/reject','UsersController@reject')->name('users.reject');
        Route::Resource('users', 'UsersController')->except(['show']);
        //comments
        Route::get('/comments/{comment}/approve','CommentsController@approve')->name('comments.approve');
        Route::get('/comments/{comment}/reject','CommentsController@reject')->name('comments.reject');
        Route::Resource('comments', 'CommentsController')->except(['create','store','edit','update']);
        // pages
        Route::Resource('pages', 'PagesController')->except(['show']);
        //contactus
        Route::get('/contactus/{contactus}/toggle_read','ContactUsController@toggle_read')->name('contactus.toggle_read');
        Route::Resource('contactus', 'ContactUsController')->except(['create','store','edit','update']);
        //admins
        Route::get('/admins/{admin}/approve','adminsController@approve')->name('admins.approve');
        Route::get('/admins/{admin}/reject','adminsController@reject')->name('admins.reject');
        Route::Resource('admins', 'AdminsController')->except(['show']);


        Route::get('settings','SettingsController@index')->name('settings.index');
        Route::put('settings','SettingsController@update')->name('settings.update');
     });

});

