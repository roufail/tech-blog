<?php

use Illuminate\Support\Facades\Route;



Auth::routes();


Route::group(['namespace' => 'Frontend','prefix' =>'','as'=>'frontend.'],function(){
    Route::get("/","FrontendController@home_page");
    Route::get("/category","FrontendController@category_page");
});





