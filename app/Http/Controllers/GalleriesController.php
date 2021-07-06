<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\GalleryHistory;
use DB;
use DataTables;

class GalleriesController extends Controller
{

    public function index(){
        return view('admin.gallery');
    }
    
    public function all()
    {
        //
        DB::statement(DB::raw('set @rownum=0'));

        $data = GalleryHistory::select('id', DB::raw("CASE WHEN status = 1 THEN 'Aktif' ELSE 'Tidak Aktif' END AS status"), 'title', DB::raw('@rownum  := @rownum  + 1 AS rownum'))->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $update = '<a href="/galleries/edit/'. $data->id .'" class="btn btn-primary">Edit</a>';
                $update .= ' <a href="/galleries/delete/'. $data->id .'" class="btn btn-danger">Delete</a>';
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
        $data['url'] = '/galleries/add';
        $data['method'] = 'post';

        return view('admin.forms.galleryForm', $data);
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
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  

        $request->image->move(public_path('images/gallery'), $imageName);
        
        try{
            $galleryHis          = new GalleryHistory;
            $galleryHis->title   = $request->title;
            $galleryHis->image   = $imageName;
            $galleryHis->status  = $request->status;
            $galleryHis->save();

            return redirect('galleries')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/galleries/add')->with('failed',"operation failed");
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
        $data['url'] = '/galleries/update/'.$id;
        $data['method'] = 'post';
        $data['gallery'] = GalleryHistory::find($id);

        return view('admin.forms.galleryForm', $data);
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
         ]);

        try{
            $galleryHis = GalleryHistory::find($id);

            if(isset($request->image)) {
                $image_path = public_path('images/gallery') . '/' . $galleryHis->image;
                
                if(File::exists($image_path)) {
                   File::delete($image_path);
                }

                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images/gallery'), $imageName);
                $galleryHis->image     = $imageName;
            }

            $galleryHis->title         = $request->title;
            $galleryHis->status        = $request->status;
            $galleryHis->save();

            return redirect('galleries')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/galleries/add')->with('failed',"operation failed");
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
            $galleryHis = GalleryHistory::find($id);
            $image_path = public_path('images/gallery') . '/' . $galleryHis->image;
                
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $galleryHis->delete();

            return redirect('galleries')->with('status',"Delete successfully");
        }
        catch(Exception $e){
            return redirect('galleries')->with('failed',"operation failed");
        }
    }
}
