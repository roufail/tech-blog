<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use App\Http\Requests\Admin\TagRequest;
use App\Http\Requests\Admin\PostRequest;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories:categories.id,categories.title')->orderby('id','desc')->paginate(10,['id','title','approved']);
        return view('admin.posts.list',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        $categories = Category::pluck('title','id');
        $tags = Tag::pluck('title','id');
        $selected_categories   = $post->categories->pluck('id')->toArray();
        $selected_tags         = $post->tags->pluck('id')->toArray();
        return view('admin.posts.form',compact('post','categories','tags','selected_categories','selected_tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request,Post $post)
    {
        $request->merge(['approved' => $request->approved ? 1 : 0]);
        $post = Post::findOrFail($post->id);
        $post->update($request->all());
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        return redirect()->route('admin.posts.index')->with(['success' => 'Post Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->delete()){
            return redirect()->route('admin.posts.index')->with(['success' => 'Post Deleted']);
        }
        return redirect()->back()->withErrors(['error' => 'Post Deleting failed']);
    }

    public function approve(Post $post)
    {
        if($post->update(['approved' => 1])){
            return redirect()->route('admin.posts.index')->with(['success' => 'Post Approved']);
        }
        return redirect()->back()->withErrors(['error' => 'Post Apporving failed']);
    }

    public function reject(Post $post)
    {
        if($post->update(['approved' => 0])){
            return redirect()->route('admin.posts.index')->with(['success' => 'Post Reject']);
        }
        return redirect()->back()->withErrors(['error' => 'Post Rejecting failed']);
    }
}
