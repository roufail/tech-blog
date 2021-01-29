<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;
use App\Models\Comment;
class sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $popular_posts   =  Post::orderBy('post_views','desc')->take(3)->get(['id','title','image','created_at']);
        $recent_comments_posts =  Comment::with('post:id,title,image')->groupBy('post_id')->orderBy("created_at","desc")->take(3)->get(['created_at','post_id','id']);
        return view('components.sidebar',compact('popular_posts','recent_comments_posts'));
    }
}
