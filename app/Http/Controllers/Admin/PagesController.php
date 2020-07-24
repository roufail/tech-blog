<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Page;
use App\Http\Requests\Admin\PageRequest;
class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::orderby('id','desc')->paginate(10,['id','title']);
        return view('admin.pages.list',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page;
        return  view('admin.categories.form',compact('page'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $request->merge(['slug' => str_replace(' ','-',strtolower($request->slug)) ]);
        $page = Page::create($request->all());

        if($page){
            return redirect()->route('admin.pages.index')->with(['success' => 'Page Created']);
        }
        return redirect()->back()->withErrors(['error' => 'Page Creating failed']);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return  view('admin.categories.form',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $request->merge(['slug' => str_replace(' ','-',strtolower($request->slug)) ]);
        $page = $page->update($request->all());


        if($page){
            return redirect()->route('admin.pages.index')->with(['success' => 'Page updated']);
        }
        return redirect()->back()->withErrors(['error' => 'Page updating failed']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        if($page->delete()){
            return redirect()->route('admin.pages.index')->with(['success' => 'Page deleted']);
        }

        return redirect()->back()->withErrors(['error' => 'Page deleting failed']);

    }
}
