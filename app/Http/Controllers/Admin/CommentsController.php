<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Comment;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with(['post:id,title','user:id,name,email'])->paginate(10,['id','name','email','approved','user_id','post_id']);
        return view('admin.comments.list',compact('comments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        if(!request()->ajax()){
            return response()->json(['error' => 'Not Allowed']);
        }
        return response()->json([
            'comment' => $comment->content,
            'reject_url' => route('admin.comments.reject',$comment->id),
            'approve_url' => route('admin.comments.approve',$comment->id)
            ]);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if($comment->delete()){
            return redirect()->route('admin.comments.index')->with(['success' => 'Comment Deleted']);
        }
        return redirect()->back()->withErrors(['error' => 'Comment Deleting failed']);
    }


    public function approve(Comment $comment)
    {
        if($comment->update(['approved' => 1])){
            return redirect()->back()->with(['success' => 'Comment Approved']);
        }
        return redirect()->back()->withErrors(['error' => 'Comment Apporving failed']);
    }

    public function reject(Comment $comment)
    {
        if($comment->update(['approved' => 0])){
            return redirect()->back()->with(['success' => 'Comment rejected']);
        }
        return redirect()->back()->withErrors(['error' => 'Comment rejecting failed']);
    }

}
