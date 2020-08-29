<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home_page(){
        return view("frontend.homepage");
    }

    public function category_page(){
        return view("frontend.categorypage");
    }

}
