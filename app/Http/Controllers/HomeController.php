<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
  	public function index()
  	{

        $all_product=DB::table('tbl_products')->get();
        $manage_product=view('pages.home_content')
            ->with('all_product', $all_product);
            return view('index')
            ->with('pages.home_content',$manage_product);

  		//return view('pages.home_content');
  	}
  	public function shop()
  	{
       $all_product=DB::table('tbl_products')->get();
        $manage_product=view('pages.shop')
            ->with('all_product', $all_product);
            return view('index')
            ->with('pages.shop',$manage_product);
  		// return view('pages.shop');
  	}
  	public function music()
  	{
  		return view('pages.music');
  	}
  	public function contact_us()
  	{
  		return view('pages.contact_us');
  	}
  	public function faq()
  	{
  		return view('pages.faq');
  	}
  	public function my_account()
  	{
  		return view('pages.my_account');
  	}



    public function product_details($product_id)
    {
        $product_by_details=DB::table('tbl_products')
                  
                  ->where('tbl_products.product_id', $product_id)
                  ->where('tbl_products.publication_status', 1)
                  ->first();
            $manage_product_by_details=view('pages.product_details')
            ->with('product_by_details', $product_by_details);
            return view('index')
            ->with('pages.product_details',$manage_product_by_details);
    }
    
    public function contact_message(Request $request)
    {
            $this->validate($request,[
            'your_name' => 'required',
            'your_email' => 'required|email',
            'your_subject' => 'required',
            'your_message' => 'required',
           


        ]);

   
        
         $data=array();
        $data['your_name']=$request->your_name;
        $data['your_email']=$request->your_email;
        $data['your_subject']=$request->your_subject;
        $data['your_message']=$request->your_message;
  


        $contact_msg=DB::table('tbl_contact_us')
        ->insertGetId($data);
        Session::put('message','Your message send Successfully !!');
        return Redirect::to('/contact-us'); 
        
        
    } 
    
    
    
    
    
    
    
    //music 
    
    
  	public function monihar()
  	{
  		return view('pages.monihar');
  	}
    
    
  	public function bandhu_tumi()
  	{
  		return view('pages.bandhu_tumi');
  	}
     
  	public function amar_ekta_nodi_chilo()
  	{
  		return view('pages.amar_ekta_nodi_chilo');
  	}
    
  	public function bazi()
  	{
  		return view('pages.bazi');
  	}
    
  	public function hridoyhina()
  	{
  		return view('pages.hridoyhina');
  	}
    
  	public function mohona()
  	{
  		return view('pages.mohona');
  	}
    
  	public function valobashi()
  	{
  		return view('pages.valobashi');
  	}
  	
  	public function mon_bole()
  	{
  		return view('pages.mon_bole');
  	}
    
  	public function jajabar()
  	{
  		return view('pages.jajabar');
  	}
    
  	public function briddhasrom()
  	{
  		return view('pages.briddhasrom');
  	}
    
  	public function chirodini()
  	{
  		return view('pages.chirodini');
  	}
    
  	public function pram_amer()
  	{
  		return view('pages.pram_amer');
  	}
    
  	public function BULIEYA()
  	{
  		return view('pages.BULIEYA');
  	}
    
        
  	public function jhalak_dikhlaja()
  	{
  		return view('pages.jhalak_dikhlaja');
  	}
            
  	public function PIYA_BASANTI()
  	{
  		return view('pages.PIYA_BASANTI');
  	}
                
  	public function TERA_CHEHRA()
  	{
  		return view('pages.TERA_CHEHRA');
  	}
                    
  	public function DIL_KYA_KARE()
  	{
  		return view('pages.DIL_KYA_KARE');
  	}
                        
  	public function TUMHE_DILLAGI()
  	{
  		return view('pages.TUMHE_DILLAGI');
  	}                      
  	public function KOLER_GARI()
  	{
  		return view('pages.KOLER_GARI');
  	}
                        
  	public function ONNO_SHOMOY()
  	{
  		return view('pages.ONNO_SHOMOY');
  	}                       
  	public function MAYER_HASHI()
  	{
  		return view('pages.MAYER_HASHI');
  	}
    
                         
  	public function TRISHNA()
  	{
  		return view('pages.TRISHNA');
  	}
                             
  	public function YAHKI_ALHUNIN()
  	{
  		return view('pages.YAHKI_ALHUNIN');
  	}
    
                                 
  	public function TERA_WADA()
  	{
  		return view('pages.TERA_WADA');
  	}
    
                                     
  	public function SATHI()
  	{
  		return view('pages.SATHI');
  	}
                                        
  	public function dilbar()
  	{
  		return view('pages.dilbar');
  	}
    
    
      	public function RONGDHONU()
  	{
  		return view('pages.RONGDHONU');
  	}
        
      	public function TUMAR_JONNO()
  	{
  		return view('pages.TUMAR_JONNO');
  	}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}
