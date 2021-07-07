<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\About;
use App\AboutDetail;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
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
        $data['url']    = '/about/update';
        $data['method'] = 'post';
        $data['about']  = About::first();
        $data['why']    = AboutDetail::where('type', 'why-rta')->get();
        $data['core']   = AboutDetail::where('type', 'core')->get();
    
        return view('admin.forms.aboutForm', $data);
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
        // dd($request->all());
        //
        $this->validate($request,[
            // 'name' => 'required',
            // 'description' => 'required',
            // 'address' => 'required',
         ]);
        
        try{
            $about = About::find($request->id);

            if(isset($request->image)) {
                $image_path = public_path('images/about') . '/' . $about->image;
                
                if(File::exists($image_path)) {
                   File::delete($image_path);
                }

                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images/about'), $imageName);
                $about->image   = $imageName;
            }

            $about->name        = $request->name;
            $about->description = $request->description;
            $about->mission     = $request->mission;
            $about->save();

            if($about) {
                $i = 0;
                foreach($request->whyId as $whyIDs) {

                    $imageNameW = "";
                    $images = $request['whyImage'][$i] ?? '';

                    $aboutWhy = AboutDetail::find($whyIDs);
                   
                    if($images){
                        $imageNameW = time() . rand() . '.' . $images->extension();  
                        $images->move(public_path('images/about'), $imageNameW);
                        $aboutWhy->image   = $imageNameW;
                    }

                    $aboutWhy->title    = $request['whyTitle'][$i];
                    $aboutWhy->save();

                    $i++;
                }

                $j = 0;
                foreach($request->coreId as $coreIDs) {
                    
                    $aboutCore = AboutDetail::find($coreIDs);

                    $aboutCore->title    = $request['coreTitle'][$j];
                    $aboutCore->save();

                    $j++;
                }
            }

            return redirect('/about/edit')->with('status',"Update successfully");
        }
        catch(Exception $e){
            return redirect('/about/edit')->with('failed',"operation failed");
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
