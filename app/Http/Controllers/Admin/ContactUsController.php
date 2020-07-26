<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactus_messages = ContactUs::paginate(10,['id','name','email','read']);
        return view('admin.contactus.list',compact('contactus_messages'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactu)
    {
        if(!request()->ajax()){
            return response()->json(['error' => 'Not Allowed']);
        }
        return response()->json([
            'message' => $contactu->message,
            'toggle_read' => route('admin.contactus.toggle_read',$contactu->id),
            'delete_url' => route('admin.contactus.destroy',$contactu->id),
            'message_status' => $contactu->read,
        ]);

    }


    public function toggle_read(ContactUs $contactus){

        if($contactus->update(['read' => $contactus->read == "Read" ? 0 : 1])){
            return redirect()->back()->with(['success' => 'Contactus updated']);
        }
        return redirect()->back()->withErrors(['error' => 'Contactus updating failed']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactu)
    {
        if($contactu->delete()){
            return redirect()->route('admin.contactus.index')->with(['success' => 'Message Deleted']);
        }
        return redirect()->back()->withErrors(['error' => 'Message Deleting failed']);
    }
}
