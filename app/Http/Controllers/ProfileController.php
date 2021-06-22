<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile');
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
    public function edit()
    {
        //
        $data['url'] = '/profile/update';
        $data['method'] = 'post';
        $data['profile'] = Profile::first();
    
        return view('admin.forms.profileForm', $data);
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
        //
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
         ]);
        
        try{
            $profile = Profile::find($request->id);

            $profile->company_name  = $request->name;
            $profile->description   = $request->description;
            $profile->address       = $request->address;
            $profile->phone         = $request->phone;
            $profile->email         = $request->email;
            $profile->website       = $request->website;
            $profile->instagram     = $request->instagram;
            $profile->youtube       = $request->youtube;
            $profile->facebook      = $request->facebook;
            $profile->save();

            return redirect('/profile/edit')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/profile/edit')->with('failed',"operation failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
