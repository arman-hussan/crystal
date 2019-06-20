<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class MyAccountController extends Controller
{
      public function index()
    {
       
         $all_order_info=DB::table('tbl_order')
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                            ->join('tbl_order_details','tbl_order.id','=','tbl_order_details.order_id')
                            ->select('tbl_order.*','tbl_order_details.*','tbl_customer.*')
                            ->get();
        $manage_order=view('pages.my_account')
            ->with('all_order_info', $all_order_info);
            return view('index')
            ->with('pages.my_account',$manage_order);




    }

    

 

        public function all_music_entertainment()
    {

 		$all_music=DB::table('entertainment')->get();
        $manage_music=view('pages.entertainment')
            ->with('all_music', $all_music);
            return view('index')
            ->with('pages.entertainment',$manage_music);


    	// return view('admin.all-catagory');
    }
 

        public function all_music_entertainment_extra()
    {

 		$all_music=DB::table('entertainment_extra')->get();
        $manage_music=view('pages.entertainment')
            ->with('all_music', $all_music);
            return view('index')
            ->with('pages.entertainment',$manage_music);


    	// return view('admin.all-catagory');
    }
        public function all_music_total()
    {

 		$all_music=DB::table('tbl_total')->get();
        $manage_music=view('pages.entertainment')
            ->with('all_music', $all_music);
            return view('index')
            ->with('pages.entertainment',$manage_music);


    	// return view('admin.all-catagory');
    }
}
