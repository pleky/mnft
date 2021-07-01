<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use Illuminate\Http\Request;
use App\Menus;
use App\Contents;
use App\Galleries;


class ContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.contents');
    }

    public function all()
    {
        //
        DB::statement(DB::raw('set @rownum=0'));

        $data = Contents::select('contents.id', 'mn.name', 'contents.description')
                ->leftJoin('menus as mn', 'contents.menu_id', '=', 'mn.id')
                ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $update = '<a href="/contents/edit/'. $data->id .'" class="btn btn-primary">Edit</a>';
                $update .= ' <a href="/contents/delete/'. $data->id .'" class="btn btn-danger">Delete</a>';
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
        $data['url'] = '/contents/add';
        $data['method'] = 'post';
        $data['menu'] = Menus::select('menus.id', 'menus.parent_id', DB::raw("concat(mn.name, ' - ', menus.name )  as name"))
                        ->leftJoin('menus as mn', 'menus.parent_id', '=', 'mn.id')
                        ->whereIn('menus.parent_id', [3,4])
                        ->get();

        return view('admin.forms.contentsForm', $data);
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
        $this->validate($request,[
            'menu' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
         ]);
        
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);

        try{
            $content = new Contents;
            $content->menu_id       = $request->menu;
            $content->image         = $imageName;
            $content->description   = $request->description;
            $content->save();

            if($content) {
                $i = 0;
                foreach($request->galleryTitle as $galleryTitles) {
                    $imageNameG = "";
                    $images = $request['galleryImage'][$i];

                    $imageNameG = time() . rand() . '.' . $images->extension();  
                    $images->move(public_path('images'), $imageNameG);
                    
                    $gallery = new Galleries;
                    $gallery->content_id    = $content->id;
                    $gallery->title         = $galleryTitles;
                    $gallery->image         = $imageNameG;
                    $gallery->save();

                    $i++;
                }
            }
            return redirect('contents')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/contents/add')->with('failed',"operation failed");
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
        $data['url'] = '/contents/update/'.$id;
        $data['method'] = 'post';
        $data['contents'] = Contents::find($id);
        $data['menu'] = Menus::select('menus.id', 'menus.parent_id', DB::raw("concat(mn.name, ' - ', menus.name )  as name"))
                        ->leftJoin('menus as mn', 'menus.parent_id', '=', 'mn.id')
                        ->whereIn('menus.parent_id', [3,4])
                        ->get();

        return view('admin.forms.contentsForm', $data);
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
    public function destroy($id)
    {
        //
    }
}
