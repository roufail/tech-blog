<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Admin\UserRequest;
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
        $user = new User;
        return view('admin.users.form',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

       $request->merge(['approved' => $request->approved ? 1 : 0]);
       $user = User::create($request->all());
       if($user){
        return redirect()->route('admin.users.index')->with(['success' => 'User Created']);
       }
       return redirect()->route('admin.users.index')->withErrors(['errors' => 'User creation failed']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.form',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $request->merge(['approved' => $request->approved ? 1 : 0]);

        if(!$request->password){
            $user = $user->update($request->except('password'));
        }else {
            $user = $user->update($request->all());
        }

        if($user){
         return redirect()->route('admin.users.index')->with(['success' => 'User updated']);
        }
        return redirect()->route('admin.users.index')->withErrors(['errors' => 'User updating failed']);

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
