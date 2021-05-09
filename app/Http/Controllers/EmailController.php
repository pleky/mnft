<?php
 
namespace App\Http\Controllers;
 
use DataTables;
use Illuminate\Http\Request;
use App\Emails;
use Illuminate\Support\Facades\DB;
 
class EmailController extends Controller
{
    public function getAllEmails()
    {
        DB::statement(DB::raw('set @rownum=0'));

        $data = Emails::latest()->get(['email', DB::raw('@rownum  := @rownum  + 1 AS rownum')]);
        return Datatables::of($data)->make(true);
    }
 
    public function index()
    {
        return view("admin.email");
    }
}