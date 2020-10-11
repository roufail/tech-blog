<?php

use Illuminate\Support\Facades\Route;



Auth::routes();


Route::group(['namespace' => 'Frontend','prefix' =>'','as'=>'frontend.'],function(){
    Route::get("/","FrontendController@home_page");
    Route::get("/category/{category}","FrontendController@category_page")->name('category');
    Route::get("/post/{post}","FrontendController@post")->name('post');
    Route::get("/author/{user}","FrontendController@author")->name('author');
});





