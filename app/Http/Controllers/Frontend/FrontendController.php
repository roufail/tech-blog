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
        $posts = $category->posts()->paginate(10,["posts.id","user_id","image","post_views","description","title","created_at","content"]);
        $category->setRelation('posts',$posts);
        return view("frontend.categorypage",compact('category'));
    }

    public function post(Post $post) {
        $post->increment('post_views');
        $post->load(['categories','tags','user'])->loadCount(['comments' => function($comments){
            $comments->where('approved',true);
        }]);
        $comments = $post->comments()
                    ->orderby('created_at','desc')
                    ->where('approved',true)
                    ->with('user:id,name')
                    ->paginate(5,['id','name','user_id','content','created_at']);
        $user_meta_data = $post->user->meta_data->pluck("meta_value","meta_key")->toArray();
        return view("frontend.postpage",compact('post','comments','user_meta_data'));
    }


    public function comment(Post $post,CommentRequest $request) {
        $post->comments()->create($request->validated());
    }


    public function author(User $user) {
        $posts = $user->posts()->paginate(5,["posts.id","user_id","image","post_views","description","title","created_at","content"]);
        $user->setRelation('posts',$posts);
        $user_meta_data =$user->meta_data->pluck("meta_value","meta_key")->toArray();

        return view("frontend.authorpage",compact('user','user_meta_data'));
    }

}
