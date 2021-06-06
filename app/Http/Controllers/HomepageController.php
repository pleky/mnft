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

        $sliders = Sliders::where('status', 1)->get();
        $profile = Profile::first();
       
        return view('content.homepage', [
            'menu' => $menus,
            'slider' => $sliders,
            'profile' => $profile
        ]);
    }
}
