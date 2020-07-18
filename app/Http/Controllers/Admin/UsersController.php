<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate(10,['id','name','email','approved']);
        return view('admin.users.list',compact('users'));
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
    public function destroy(User $user)
    {
        if($user->delete()) {
            return redirect()->route('admin.users.index')->with(['success' => 'User Deleted']);
        }
        return redirect()->route('admin.users.index')->withErrors(['error' => 'user Deleting failed']);
    }



    public function approve(User $user)
    {
        if($user->update(['approved' => 1])){
            return redirect()->route('admin.users.index')->with(['success' => 'User Approved']);
        }
        return redirect()->back()->withErrors(['error' => 'user Apporving failed']);
    }

    public function reject(User $user)
    {
        if($user->update(['approved' => 0])){
            return redirect()->route('admin.users.index')->with(['success' => 'User Rejected']);
        }
        return redirect()->back()->withErrors(['error' => 'user Rejecting failed']);
    }
}
