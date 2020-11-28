<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\Frontend\Requests\CommentRequest;

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
        $comments = $post->comments()
                    ->orderby('created_at','desc')
                    ->where('approved',true)
                    ->with('user:id,name')
                    ->paginate(5,['id','name','user_id','content','created_at']);
        return view("frontend.postpage",compact('post','comments'));
    }


    public function comment(Post $post,CommentRequest $request) {
        $post->comments()->create($request->validated());
    }


    public function author(User $user) {
        dd($user);
    }

}
