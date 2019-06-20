<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Cart;
class CartController extends Controller
{
  	public function add_to_cart(Request $request)
  	{
  		$qty=$request->qty;
  		$product_id=$request->product_id;
  		$product_info=DB::table('tbl_products')
  			->where('product_id', $product_id)
  			->first();

		$data['qty']=$qty;
		$data['id']=$product_info->product_id;
		$data['name']=$product_info->product_name;
		$data['price']=$product_info->product_price;
		$data['weight']=500;
		$data['options']['image']=$product_info->product_image;

		Cart::add($data);

		return Redirect::to('/show-cart');
  	}

  	public function show_cart()
  	{
  		  $all_catagory=DB::table('catagories')
  		  ->where('Publication_status',1)
  		  ->get();
        $manage_caagory=view('pages.add_to_cart')
            ->with('all_catagory', $all_catagory);
            return view('index')
            ->with('pages.add_to_cart',$manage_caagory);

  	}

  	public function delete_to_cart($rowId)
  	{
  		  Cart::update($rowId, 0);
		return Redirect::to('/show-cart');
  	}

  	public function update_to_cart(Request $request)
  	{
  		  $qty=$request->qty;
  		  $rowId=$request->rowId;

  		  Cart::update($rowId, $qty);
		return Redirect::to('/show-cart');  		  
  	}
}
