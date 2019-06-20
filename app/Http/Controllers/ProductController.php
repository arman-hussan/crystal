<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class ProductController extends Controller
{
    public function index()
    {
    	return view('admin.add-product');
    }

    public function save_product(Request $request)
    {
    	$data=array();
    		$data['product_name']= $request->product_name;
    		$data['Catagory_id']= $request->Catagory_id;
    		$data['product_short_description']= $request->product_short_description;
    		$data['product_long_description']= $request->product_short_description;
    		$data['product_price']= $request->product_price;
    		$data['publication_status']= $request->publication_status;
    		$image= $request->file('product_image');

    		if ($image) {
    			$image_name= str_random(20);
    			$ext=strtolower($image->getClientOriginalExtension());
    			$image_full_name=$image_name.'.'.$ext;
    			$upload_path='image/';
    			$image_url=$upload_path.$image_full_name;
    			$success=$image->move($upload_path,$image_full_name);

    			if ($success) {
    				$data['product_image']=$image_url;

    				DB::table('tbl_products')->insert($data);
    				Session::put('message','Product Added Successfully');
    				return Redirect::to('/add-product');

    			};

    		};
    		$data['product_image']='';

    				DB::table('tbl_products')->insert($data);
    				Session::put('message','Product Added Successfully');
    				return Redirect::to('/add-product');

    }

    public function all_product()
    {

        $all_product=DB::table('tbl_products')->get();
        $manage_product=view('admin.all-product')
            ->with('all_product', $all_product);
            return view('admin_layout')
            ->with('admin.all-product',$manage_product);

    	// return view('admin.all-catagory');
    }
}
