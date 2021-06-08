<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
use App\Sliders;
use App\Profile;

class HomepageController extends Controller
{
    //
    public function index() {

        $data = $this->menus();
       
        return view('content.homepage', [
            'menu' => $data['menus'],
            'slider' => $data['sliders'],
            'profile' => $data['profile']
        ]);
    }

    public function content() {
        $data = $this->menus();
       
        return view('content.product', [
            'menu' => $data['menus'],
            'slider' => $data['sliders'],
            'profile' => $data['profile']
        ]);
    }

    function menus() {
        $menus = Menus::where('status', 1)->whereNull('parent_id')->orderBy('is_order', 'asc')->get();
        $submenus = Menus::where('status', 1)->whereNotNull('parent_id')->orderBy('is_order', 'asc')->get();

        foreach($menus as $menu) {
            $submenu = [];
            foreach($submenus as $sub){
                if($menu['id'] == $sub['parent_id']){
                    $submenu[] = $sub;
                    $menu['submenu'] = $submenu;
                }
            }
        }
        
        $data['menus']   = $menus;
        $data['sliders'] = Sliders::where('status', 1)->get();
        $data['profile'] = Profile::first();

        return $data;
    }
}
