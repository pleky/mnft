<?php
 
namespace App\Http\Controllers;
 
use DataTables;
use Illuminate\Http\Request;
use App\Solutions;
use App\Emails;
 
class SolutionController extends Controller
{
    public function getAllSolutions()
    {
        $data = Solutions::latest()->get();
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                $update = '<a href="/solutions/edit/'. $data->id .'" class="btn btn-primary">Edit</a>';
                return $update;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
 
    public function index()
    {
        return view("admin.solution");
    }

    public function edit($id)
    {
        $data = Solutions::find($id);

        return view("admin.solutionForm", ['data' => $data]);
    }

    public function update($id, Request $request)
    {

        $description = $request->input("desc");
        $dom = new \DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();    
        $images = $dom->getElementsByTagName('img');
       
        foreach($images as $k => $img){
            $data = $img->getAttribute('src');
            
            if (strpos($data, ';') !== false) {
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
            
                $data = base64_decode($data);

                $image_name= "/upload/" . time().$k.'.png';
                $path = public_path() . $image_name;

                file_put_contents($path, $data);
                
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }

        $description = $dom->saveHTML();

        $data                       = Solutions::find($id);
        $data->description          = $description;
        $data->save();

        return redirect('/solutions');
    }

    public function pages($menu) 
    {
        $data = Solutions::where('menu', $menu)->first();

        return view('content.'.$menu, ['data' => $data]);
    }

    public function saveEmail(Request $request)
    {   
        $email = $request->input("email");
        
        $res = Emails::where('email', $email)->count();
        if($res == 0) {
            $data         = new Emails();
            $data->email  = $email;
            $data->save();
        }
        return redirect('/');
    }
}