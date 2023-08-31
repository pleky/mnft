<?php

namespace App\Http\Controllers;

use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Menus;
use Exception;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.menu');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['url'] = '/menu/add';
        $data['method'] = 'post';
        $data['menu_parent'] = Menus::whereNull('parent_id')->where('category', Menus::CATEGORY_PRIMARY)->get();
        $data['act'] = 'add';
        $data['categories'] = Menus::LIST_MENU_CATEGORY;

        return view('admin.forms.menuForm', $data);
    }

    public function getParentMenuByCategory(string $category)
    {
        if ($category === Menus::CATEGORY_PRIMARY) {
            $menus = Menus::whereNull('parent_id')->where('category', Menus::CATEGORY_PRIMARY)->get()->toArray();
        } else if ($category === Menus::CATEGORY_SECONDARY) {
            $menus = Menus::where('category', Menus::CATEGORY_SECONDARY)->get()->toArray();
            // need check maximum level logic
            foreach ($menus as $key => $menu) {
                if (!empty($menu['parent_id'])) {
                    $parentCheck = Menus::where('id', $menu['parent_id'])->value('parent_id');
                    if (!empty($parentCheck)) unset($menus[$key]);
                }
            }
        } else if ($category === Menus::CATEGORY_VIEW_ALL_SECONDARY) {
            $menus = Menus::where('category', Menus::CATEGORY_SECONDARY)->whereNull('parent_id')->get()->toArray();
        }
        return $menus;
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
            'name' => 'required|string|min:3|max:255',
            'order' => 'required',
            'status' => 'required',
         ]);
        
        $slug = strtolower($request->name);
        $slug = str_replace("/","or",$slug);
        $slug = str_replace(" ","-",$slug);

        try{
            $menu = new Menus;
            $menu->name         = $request->name;
            $menu->slug         = $slug;
            $menu->parent_id    = $request->parent_id;
            $menu->is_order     = $request->order;
            $menu->status       = $request->status;
            $menu->save();

            return redirect('menu')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/menu/add')->with('failed',"operation failed");
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

    public function all()
    {
        //
        DB::statement(DB::raw('set @rownum=0'));

        $data = Menus::select('menus.id', DB::raw("CASE WHEN menus.status = 1 THEN 'Aktif' ELSE 'Tidak Aktif' END AS status"), 'menus.name', 'mn_parent.name as parent', 'menus.category', DB::raw('@rownum  := @rownum  + 1 AS rownum'))
                ->leftJoin('menus as mn_parent', 'menus.parent_id', '=' , 'mn_parent.id')
                ->get();

        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $update = '<a href="/menu/edit/'. $data->id .'" class="btn btn-primary">Edit</a>';
                $update .= ' <button data-href="/menu/delete/'. $data->id .'" class="btn btn-danger" data-to-delete="'.$data->id.'" id="btn_delete" onclick="deleteFunc(this)">Delete</button>';
                return $update;
            })
            ->rawColumns(['action'])
            ->make(true);
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
        $data['url'] = '/menu/update/'.$id;
        $data['method'] = 'post';
        $data['menu_parent'] = Menus::whereNull('parent_id')->get();
        $data['menu'] = Menus::select('menus.*', 'mn.name as parent_name')->leftjoin('menus as mn', 'mn.id', '=', 'menus.parent_id')->where('menus.id', $id)->first();
        $data['act'] = 'update';

        return view('admin.forms.menuForm', $data);
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
            'name' => 'required|string|min:3|max:255',
            'order' => 'required',
            'status' => 'required',
         ]);
        
        
        try{
            $menu = Menus::find($id);
            
            // if($request->type) {
                $slug = strtolower($request->name);
                $slug = str_replace("/","or",$slug);
                $slug = str_replace(" ","-",$slug);

                $menu->slug         = $slug;
            // }
            
            $menu->name         = $request->name;
            $menu->is_order     = $request->order;
            // $menu->parent_id    = $request->type;
            $menu->status       = $request->status;
            $menu->save();

            return redirect('menu')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/menu/add')->with('failed',"operation failed");
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
            Menus::findOrFail($id)->delete();

            return redirect('menu')->with('status',"Insert successfully");
        }
        catch(Exception $e){
            return redirect('/menu/add')->with('failed',"operation failed");
        }
    }
}
