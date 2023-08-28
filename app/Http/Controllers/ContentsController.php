<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
                $update .= ' <button onclick="deleteFunc(this)" data-href="/contents/delete/'. $data->id .'" class="btn btn-danger">Delete</button>';
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
        $data['act'] = 'add';

        $arry = Contents::select('menu_id')->get();

        $str = [];
        foreach($arry as $datas) {
            $str[] = (int) $datas->menu_id;
        }

        $data['menu'] = Menus::select('menus.id', 'menus.parent_id', DB::raw("concat(mn.name, ' - ', menus.name )  as name"), 'menus.status')
                        ->leftJoin('menus as mn', 'menus.parent_id', '=', 'mn.id')
                        ->where(function($query) {
                            $query->where('menus.parent_id', [3,4]);
                            $query->orWhere('menus.status', 3)
                                ->whereNotNull('menus.parent_id'); // for handle view all content
                            // $query->orWhere('menus.status', 2)
                            //     ->whereNotNull('menus.parent_id'); // for handle sub menu
                            
                        })
                        ->get()->toArray();

        // get sub sub menu for category menu
        $menu1 = [];

        $categoryMenu = Menus::where('status', 2)->get()->toArray();
        
        foreach($categoryMenu as $key => $category) {
            if (empty($category['parent_id'])) {
                $menu1[] = $category;
                unset($categoryMenu[$key]);
            }
        }
        $categoryMenu = array_values($categoryMenu);
        foreach ($menu1 as $key1 => $menu1s) {
            foreach ($categoryMenu as $key => $category) {
                if ($menu1s['id'] == $category['parent_id']) {
                    $menu1[$key1]['submenu'][] = $category;
                    unset($categoryMenu[$key]);
                }
            }
        }
        $categoryMenu = array_values($categoryMenu);
        foreach ($menu1 as $key2 => $menu1s) {
            if (isset($menu1s['submenu']) && !empty($menu1s['submenu'])) {
                foreach ($menu1s['submenu'] as $key1 => $submenu) {
                    foreach ($categoryMenu as $key => $category) {
                        if ($category['parent_id'] == $submenu['id']) {
                            $menu1[$key2]['submenu'][$key1]['submenu'][] = $category; 
                        }
                    }
                }
            }
        }

        foreach ($menu1 as $menu) {
            if (isset($menu['submenu']) && !empty($menu['submenu'])) {
                foreach ($menu['submenu'] as $submenu) {
                    if (isset($submenu['submenu']) && !empty($submenu['submenu'])) {
                        foreach ($submenu['submenu'] as $subsubmenu) {
                            unset($subsubmenu['is_order']);
                            unset($subsubmenu['slug']);
                            unset($subsubmenu['created_at']);
                            unset($subsubmenu['updated_at']);
                            $subsubmenu['flag'] = 'subsubmenu';
                            $subsubmenu['name'] = $menu['name'] . ' - ' . $submenu['name'] . ' - ' . $subsubmenu['name'];
                            $data['menu'][] = $subsubmenu;
                        }
                    }
                }
            }
        }

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
            // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
         ]);
        
        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('images'), $imageName);

        try{
            $content = new Contents;
            $content->menu_id       = $request->menu;
            // $content->image         = $imageName;
            $content->description   = $request->description;

            // image content
            if (isset($request->image)) {
                $images = [];
                foreach($request->image as $image) {
                    $imageName = time() . rand() . '.' . $image->extension();  
                    $image->move(public_path('images'), $imageName);

                    $images[] = $imageName;
                }

                $content->image = json_encode($images);
            }

            $content->save();

            if($content && isset($request->galleryImage)) {
                $i = 0;
                foreach($request->galleryImage as $galleryImages) {
                    $imageNameG = "";

                    $imageNameG = time() . rand() . '.' . $galleryImages->extension();  
                    $galleryImages->move(public_path('images'), $imageNameG);
                    
                    $gallery = new Galleries;
                    $gallery->content_id    = $content->id;
                    $gallery->is_order      = $request->is_order;
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
        $data['act'] = 'edit';
        $data['contents'] = Contents::select('contents.id', 'contents.image', 'contents.description', DB::Raw("concat(mp.name, ' - ', mn.name) as name"))
                            ->leftJoin('menus as mn', 'contents.menu_id', '=', 'mn.id')
                            ->leftJoin('menus as mp', 'mn.parent_id', '=', 'mp.id')
                            ->where('contents.id', $id)
                            ->first();
        $data['gallery'] = Galleries::where('content_id', $id)->get();

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
        $this->validate($request,[
            // 'name' => 'required',
            // 'description' => 'required',
            // 'address' => 'required',
         ]);

        try{
            $dataGallery = Contents::find($id);

            if(isset($request->image)) {
                $image_path = public_path('images') . '/' . $dataGallery->image;
                
                if(File::exists($image_path)) {
                   File::delete($image_path);
                }

                $imageName = time().'.'.$request->image->extension();  
                $request->image->move(public_path('images'), $imageName);
                $dataGallery->image   = $imageName;
            }

            $dataGallery->description   = $request->description;
            $dataGallery->save();

            if($dataGallery && isset($request->galleryID)) {
                $i = 0;
                foreach($request->galleryID as $galleryIDs) {

                    $imageNameW = "";
                    $images = $request['galleryImage'][$i] ?? '';

                    $dataGa = Galleries::find($galleryIDs);
                   
                    if($dataGa) {
                        if($images){
                            $image_path = public_path('images') . '/' . $dataGa->image;
                
                            if(File::exists($image_path)) {
                                File::delete($image_path);
                            }

                            $imageNameW = time() . rand() . '.' . $images->extension();  
                            $images->move(public_path('images'), $imageNameW);
                            $dataGa->image   = $imageNameW;
                        }

                        $dataGa->is_order    = $request['galleryOrder'][$i];
                        $dataGa->save();
                    } else {
                        $contentGa = new Galleries;

                        if($images){
                            $imageNameGa = time() . rand() . '.' . $images->extension();  
                            $images->move(public_path('images'), $imageNameGa);
                            $contentGa->image   = $imageNameGa;
                        }

                        $contentGa->content_id    = $id;
                        $contentGa->is_order    = $request['galleryOrder'][$i];
                        $contentGa->save();
                    }

                    $i++;
                }
            }

            return redirect('/contents')->with('status',"Update successfully");
        }
        catch(Exception $e){
            return redirect('/contents/edit')->with('failed',"operation failed");
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
            $dataContent = Contents::find($id);
            $image_path = public_path('images') . '/' . $dataContent->image;
                
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $dataContent->delete();

            if($dataContent) {
                $dataGa = Galleries::where('content_id', $id)->get();
                
                foreach($dataGa as $datas) {
                    $image_path_ga = public_path('images') . '/' . $datas->image;
                
                    if(File::exists($image_path_ga)) {
                        File::delete($image_path_ga);
                    }

                    $gal = Galleries::find($datas->id);
                    $gal->delete();
                }
            }
            return redirect('contents')->with('status',"Delete successfully");
        }
        catch(Exception $e){
            return redirect('contents')->with('failed',"operation failed");
        }
    }

    public function destroyGallery($id)
    {
        //
        try{
            $dataGa = Galleries::find($id);
            $image_path = public_path('images') . '/' . $dataGa->image;
                
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $dataGa->delete();

            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}
