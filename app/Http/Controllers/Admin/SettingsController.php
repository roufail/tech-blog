<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $db_settings = Settings::pluck('value','key')->toArray();
      return view('admin.settings.form',compact('db_settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $notIn = array_keys($request->except('_token','_method'));
        Settings::whereNotIn('key',$notIn)->delete();


        foreach($request->except('_token','_method') as $key => $value){
            Settings::updateOrCreate(['key' => $key],['value' => $value]);
        }

        return redirect()->route('admin.settings.index')->with(['success' => 'settings saved successfully']);
    }
}
