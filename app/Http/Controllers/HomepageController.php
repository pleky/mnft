<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
use App\Sliders;
use App\Profile;
use App\Contents;
use App\GalleryHistory;
use App\Galleries;

class HomepageController extends Controller
{
    //
    public function index() {

        $data = $this->menus();
        $data['gallery'] = GalleryHistory::all();

        return view('content.homepage', [
            'menu' => $data['menus'],
            'slider' => $data['sliders'],
            'profile' => $data['profile'],
            'gallery' => $data['gallery']
        ]);
    }

    public function content($parent, $slug) {

        $data = $this->menus();
        $data['content'] = Contents::select('contents.id','mn.name', 'contents.description', 'contents.image')
                            ->leftJoin('menus as mn', 'contents.menu_id', '=', 'mn.id')
                            ->where('mn.slug', $slug)
                            ->first();

        $data['gallery'] = Galleries::where('content_id', $data['content']['id'])->get();

        $view = "content.product";
        if($slug == 'about-us') { 
            $view = "content.about";
        }

        return view($view, [
            'menu' => $data['menus'],
            'slider' => $data['sliders'],
            'profile' => $data['profile'],
            'content' => $data['content'],
            'gallery' => $data['gallery']
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

    public function gallery() {

        $data = $this->menus();
        $data['gallery'] = GalleryHistory::all();

        return view('content.gallery', [
            'menu' => $data['menus'],
            'slider' => $data['sliders'],
            'profile' => $data['profile'],
            'gallery' => $data['gallery'],
        ]);
    }

    public function about() {

        $data = $this->menus();
        
        return view('content.about', [
            'menu' => $data['menus'],
            'slider' => $data['sliders'],
            'profile' => $data['profile'],
        ]);
    }
}
