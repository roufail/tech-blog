<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;

class nextAndPreviousPostsComponent extends Component
{
    private $id;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $nextPost = Post::where('id', '>',$this->id)->first(['id','title','image']);
        $previousPost = Post::where('id', '<',$this->id)->orderby('id','desc')->first(['id','title','image']);
        return view('components.next-and-previous-posts-component',compact('nextPost','previousPost'));
    }
}
