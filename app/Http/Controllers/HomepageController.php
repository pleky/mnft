<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menus;
use App\Sliders;
use App\Profile;
use App\Contents;
use App\GalleryHistory;
use App\Galleries;
use App\About;
use App\AboutDetail;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactUs;

class HomepageController extends Controller
{
    //
    public function index() {

        $data = $this->menus();
        $data['gallery'] = GalleryHistory::all();

        return view('content.homepage', [
            'menu' => $data['menus'],
            'menu_new' => $data['menus_new'],
            'menu_pop' => $data['menus_new'],
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

        $data['gallery'] = Galleries::where('content_id', $data['content']['id'])->orderBy('is_order', 'asc')->get();

        $view = "content.product";
        if($slug == 'about-us') { 
            $view = "content.about";
        }

        return view($view, [
            'menu' => $data['menus'],
            'menu_new' => $data['menus_new'],
            'menu_pop' => $data['menus_new'],
            'slider' => $data['sliders'],
            'profile' => $data['profile'],
            'content' => $data['content'],
            'gallery' => $data['gallery']
        ]);
    }

    function menus() {
        $menus = Menus::where('status', 1)->whereNull('parent_id')->orderBy('is_order', 'asc')->get();
        $submenus = Menus::where('status', 1)->whereNotNull('parent_id')->orderBy('is_order', 'asc')->get();

        $menus_new = Menus::where('status', 2)->whereNull('parent_id')->orderBy('is_order', 'asc')->get();
        $submenus_new = Menus::where('status', 2)->whereNotNull('parent_id')->orderBy('is_order', 'asc')->get();

        foreach($menus as $menu) {
            $submenu = [];
            foreach($submenus as $sub){
                if($menu['id'] == $sub['parent_id']){
                    $submenu[] = $sub;
                    $menu['submenu'] = $submenu;
                }
            }
        }

        foreach($menus_new as $menu_new) {
            
            $submenu_new = [];
            foreach($submenus_new as $key => $subs){
                if($menu_new['id'] == $subs['parent_id']){
                    $submenu_new[] = $subs;
                    $menu_new['submenu_new'] = $submenu_new;
                }

                $subsubmenu_new = [];
                $coba = $menu_new['submenu_new'];
                foreach($submenus_new as $submen){
                    if($subs['id'] == $submen['parent_id']){
                        $subsubmenu_new[] = $submen;
                        $coba[$key]['subsubmenu_new'] = $subsubmenu_new;
                    }
                }
            }
        }
        
        
        $data['menus']   = $menus;
        $data['menus_new'] = $menus_new;
        $data['sliders'] = Sliders::where('status', 1)->get();
        $data['profile'] = Profile::first();

        return $data;
    }

    public function gallery() {

        $data = $this->menus();
        $data['gallery'] = GalleryHistory::paginate(12);

        return view('content.gallery', [
            'menu' => $data['menus'],
            'menu_new' => $data['menus_new'],
            'menu_pop' => $data['menus_new'],
            'slider' => $data['sliders'],
            'profile' => $data['profile'],
            'gallery' => $data['gallery'],
        ]);
    }

    public function detailGallery($id) {

        $data = $this->menus();
        $data['gallery'] = GalleryHistory::find($id);

        return view('content.detail_gallery', [
            'menu' => $data['menus'],
            'menu_new' => $data['menus_new'],
            'menu_pop' => $data['menus_new'],
            'slider' => $data['sliders'],
            'profile' => $data['profile'],
            'gallery' => $data['gallery'],
        ]);
    }

    public function about() {

        $data = $this->menus();
        $data['about']  = About::first();
        $data['why']    = AboutDetail::where('type', 'why-rta')->get();
        $data['core']   = AboutDetail::where('type', 'core')->get();

        return view('content.about', [
            'menu' => $data['menus'],
            'menu_new' => $data['menus_new'],
            'menu_pop' => $data['menus_new'],
            'slider' => $data['sliders'],
            'profile' => $data['profile'],
            'about' => $data['about'],
            'why' => $data['why'],
            'core' => $data['core']
        ]);
    }

    public function contactUs(Request $request) {
        
        $data = $request->all();
        $images = $data->attachment ?? '';
        $myEmail = env('USER_MAIL');

        if($images) {
            $images->move(public_path('images/email'));
            $image_path = public_path('images/email') . '/' . $images;
            $data['image_paths'] = $image_path;        
        }
        
    	Mail::to($myEmail)->send(new contactUs($data));
        

        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }

    	return true;
    }
}