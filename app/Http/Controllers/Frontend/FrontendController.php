<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
class FrontendController extends Controller
{
    public function home_page(){
        $posts = Post::latest('id')->paginate(10);
        $latest_posts = Post::latest('id')->take(3)->get();
        return view("frontend.homepage",compact('posts','latest_posts'));
    }

    public function category_page(Category $category){
        dd($category);
        return view("frontend.categorypage");
    }

    public function post(Post $post) {
        $post->increment('post_views');
        $post->load(['categories','tags']);
        return view("frontend.postpage",compact('post'));

    }


    public function author(User $user) {
        dd($user);
    }

}
