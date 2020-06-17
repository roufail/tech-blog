<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Admin\TagRequest;

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
