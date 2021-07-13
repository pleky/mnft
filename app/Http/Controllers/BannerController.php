<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Sliders;
use DB;
use DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner');
    }

    public function all()
    {
        //
        DB::statement(DB::raw('set @rownum=0'));

        $data = Sliders::select('id', DB::raw("CASE WHEN status = 1 THEN 'Aktif' ELSE 'Tidak Aktif' END AS status"), 'title', 'description', DB::raw('@rownum  := @rownum  + 1 AS rownum'))->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $update = '<a href="/banner/edit/'. $data->id .'" class="btn btn-primary">Edit</a>';
                $update .= ' <button onclick="deleteFunc(this)" data-href="/banner/delete/'. $data->id .'" class="btn btn-danger">Delete</button>';
                return $update;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['url'] = '/banner/add';
        $data['method'] = 'post';

        return view('admin.forms.bannerForm', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images'), $imageName);
        
        try{
            $banner = new Sliders;
            $banner->title         = $request->title;
            $banner->description   = $request->description;
            $banner->image         = $imageName;
            $banner->is_order      = $request->order;
            $banner->status        = $request->status;
            $banner->save();

            return redirect('banner')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/banner/add')->with('failed',"operation failed");
        }
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
        $data['url'] = '/banner/update/'.$id;
        $data['method'] = 'post';
        $data['banner'] = Sliders::find($id);

        return view('admin.forms.bannerForm', $data);
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
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
         ]);

        try{
            $banner = Sliders::find($id);

            if(isset($request->image)) {
                $image_path = public_path('images') . '/' . $banner->image;
                
                if(File::exists($image_path)) {
                   File::delete($image_path);
                }

                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $banner->image     = $imageName;
            }

            $banner->title         = $request->title;
            $banner->description   = $request->description;
            $banner->is_order      = $request->order;
            $banner->status        = $request->status;
            $banner->save();

            return redirect('banner')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/banner/add')->with('failed',"operation failed");
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
        try{
            $banner = Sliders::find($id);
            $image_path = public_path('images') . '/' . $banner->image;
                
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $banner->delete();

            return redirect('banner')->with('status',"Delete successfully");
        }
        catch(Exception $e){
            return redirect('banner')->with('failed',"operation failed");
        }
    }
}
