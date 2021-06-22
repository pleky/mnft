<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
use App\Contents;
use DB;

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
        

        try{
            $menu = new Menus;
            $menu->name         = $request->name;
            $menu->slug         = $slug;
            $menu->parent_id    = $request->type;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
