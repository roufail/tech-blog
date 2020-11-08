<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Post;
class RelatedPostsComponent extends Component
{
    private $id,$categories;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$categories)
    {
        $this->id = $id;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $related_posts = Post::whereHas('categories',function($categories){
            $categories->whereIn('categories.id',$this->categories);
        })->where('id','!=',$this->id)->take(2)->get(['id','image','title','created_at']);
        return view('components.related-posts-component',compact('related_posts'));
    }
}
