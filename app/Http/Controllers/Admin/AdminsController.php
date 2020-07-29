<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy('id','desc')->paginate(10,['id','name','email','approved']);
        return view('admin.admins.list',compact('admins'));
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
    public function destroy(Admin $admin)
    {
        if($admin->delete()) {
            return redirect()->route('admin.admins.index')->with(['success' => 'Admin Deleted']);
        }
        return redirect()->route('admin.admins.index')->withErrors(['error' => 'Admin Deleting failed']);
    }


    public function approve(Admin $admin)
    {
        if($admin->update(['approved' => 1])){
            return redirect()->route('admin.admins.index')->with(['success' => 'Admin Approved']);
        }
        return redirect()->back()->withErrors(['error' => 'Admin Apporving failed']);
    }

    public function reject(Admin $admin)
    {
        if($admin->update(['approved' => 0])){
            return redirect()->route('admin.admins.index')->with(['success' => 'Admin Rejected']);
        }
        return redirect()->back()->withErrors(['error' => 'Admin Rejecting failed']);
    }



}
