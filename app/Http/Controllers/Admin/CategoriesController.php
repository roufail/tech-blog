<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequest;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderby('id','desc')->paginate(10,['id','title']);
        return view('admin.categories.list',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        return  view('admin.categories.form',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

        $request->merge(['slug' => str_replace(' ','-',strtolower($request->slug)) ]);
        $category = Category::create($request->all());

        if($category){
            return redirect()->route('admin.categories.index')->with(['success' => 'Category Created']);
        }
        return redirect()->back()->withErrors(['error' => 'Category Creating failed']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.form',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $request->merge(['slug' => str_replace(' ','-',strtolower($request->slug)) ]);

        if($category->update($request->all())){
            return redirect()->route('admin.categories.index')->with(['success' => 'Category Updated']);
        }
        return redirect()->back()->withErrors(['error' => 'Category Creating failed']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category->delete()){
            return redirect()->route('admin.categories.index')->with(['success' => 'Category Deleted']);
        }
        return redirect()->back()->withErrors(['error' => 'Category Deleting failed']);

    }
}
