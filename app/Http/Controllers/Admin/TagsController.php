<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Requests\Admin\TagRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderby('id','desc')->paginate(10,['id','title']);
        return view('admin.tags.list',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag;
        return  view('admin.tags.form',compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $request->merge(['slug' => str_replace(' ','-',strtolower($request->slug)) ]);
        $tag = Tag::create($request->all());

        if($tag){
            return redirect()->route('admin.tags.index')->with(['success' => 'tag Created']);
        }
        return redirect()->back()->withErrors(['error' => 'tag Creating failed']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.form',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $request->merge(['slug' => str_replace(' ','-',strtolower($request->slug)) ]);
        if($tag->update($request->all())){
            return redirect()->route('admin.tags.index')->with(['success' => 'Tag Updated']);
        }
        return redirect()->back()->withErrors(['error' => 'Tag Creating failed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag->delete()){
            return redirect()->route('admin.tags.index')->with(['success' => 'Tag Deleted']);
        }
        return redirect()->back()->withErrors(['error' => 'Tag Deleting failed']);

    }
}
