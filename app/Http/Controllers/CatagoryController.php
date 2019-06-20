<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class CatagoryController extends Controller
{
    public function index()
    {
    	return view('admin.add-catagory');
    }
    public function all_catagory()
    {
        $all_catagory=DB::table('catagories')->get();
        $manage_caagory=view('admin.all-catagory')
            ->with('all_catagory', $all_catagory);
            return view('admin_layout')
            ->with('admin.all-catagory',$manage_caagory);

    	// return view('admin.all-catagory');
    }
    public function save_catagory(Request $request)
    {
    	$data=array();
    	$data['Catagory_id']=$request->Catagory_id;
    	$data['Catagory_name']=$request->Catagory_name;
    	$data['Catagory_description']=$request->Catagory_description;
    	$data['Publication_status']=$request->Publication_status;

    	DB::table('catagories')->insert($data);
    	Session::put('message','Catagory added successfully !!');
    	return Redirect::to('add-catagory');
    }
}
