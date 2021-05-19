<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Users;

class AdminController extends Controller
{

    public function index(){
        return view('admin.menu');
    }
    
    public function loginPost(Request $request){
                
        $email = $request->input("email");;
        $password = $request->input("password");
    
        $data = Users::where('email',$email)->first();
        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('email',$data->email);
                Session::put('login',TRUE);
                return redirect('admin');
            }
            else{
                return redirect('login')->with('alert','Password atau Email, Salah !');
            }
        }
        else{
            return redirect('login')->with('alert','Password atau Email, Salah!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Kamu sudah logout');
    }

    public function generatePassword(){
       
        $data =  new Users();
        $data->name = "Superadmin";
        $data->email = "superadmin@sendikonusantara.com";
        $data->password = bcrypt("superadmin");
        $data->save();
        return redirect('login');
    }
}
