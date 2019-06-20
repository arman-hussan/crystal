<?php

namespace App\Http\Controllers;
use App\CustomerModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Cart;
use Illuminate\Support\Facades\Redirect;
Session_start();


class CheckoutController extends Controller
{
    public function index()
    {
        return view('pages.checkout');
    }
    public function login_check()
    {
        return view('pages.login');
    }
    public function customer_regestration(Request $request)
    {
        $this->validate($request,[
            'customer_name' => 'required|min:3',
            'business_trading' => 'required|min:3',
            'customer_email' => 'required|email|unique:tbl_customer,customer_email',
            'date_of_birth' => 'required',
            'username' => 'required|min:3|unique:tbl_customer,username',
            'password' => 'required|min:6|confirmed',


        ]);

/*		$data=array();
      
    	$data['customer_id']=$request->input('customer_id');
    	$data['customer_name']=$request->input('customer_name');
    	$data['business_trading']=$request->input('business_trading');
    	$data['customer_email']=strtolower($request->input('customer_email'));
    	$data['username']=$request->input('username');
    	$data['password']=bcrypt($request->input('password'));

        try{
            CustomerModel::create($data);
           
             Session::put('customer_id',$request->customer_id);
             Session::put('customer_name',$request->customer_name);
            session()->flash('message','User Created Successfully');
            session()->flash('type','success');

        return Redirect::to('/my-account');
        }catch(Exception $e){
            session()->flash('message', $e->getMessage());
            session()->flash('type','danger'); 

            return redirect()->back();           
        } */
        
        
         $data=array();
        $data['customer_name']=$request->customer_name;
        $data['business_trading']=$request->business_trading;
        $data['customer_email']=$request->customer_email;
        $data['date_of_birth']=$request->date_of_birth;
        $data['username']=$request->username;
        $data['password']=md5($request->password);


        $customer_id=DB::table('tbl_customer')
        ->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        Session::put('message','Account Created Successfully !!');
        return Redirect::to('/checkout'); 
        
        
        
        
    }
    

    public function save_shipping(Request $request)
    {
        $data=array();
        $data['first_name']=$request->first_name;
        $data['last_name']=$request->last_name;
        $data['business_legal']=$request->business_legal;
        $data['address']=$request->address;
        $data['country']=$request->country;
        $data['customer_email']=$request->customer_email;
        $data['post_code']=$request->post_code;
        $data['phone_no']=$request->phone_no;

        $data['payment_gateway']=$request->payment_method;


        $shipping_id=DB::table('tbl_shipping')
        ->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        Session::put('message','Order Submited Successfully !!');


        $payment_gateway=$request->payment_method;

        $pdata=array();
        $pdata['payment_method']=$payment_gateway;
        $pdata['payment_status']='pending';
        $payment_id=DB::table('tbl_payment')
        ->insertGetId($pdata);


 

        $contents=Cart::content();
        $odata=array();
         foreach ($contents as $content) {        
        $odata['customer_id']=Session::get('customer_id');
        $odata['shipping_id']=Session::get('shipping_id');
        $odata['payment_id']=$payment_id;
        $odata['product_id']=$content->id;
        $odata['order_total']=Cart::total();
        $odata['order_status']='pending';
        $order_id=DB::table('tbl_order')
        ->insertGetId($odata);
        

        }
        $contents=Cart::content();
        $oddata=array();

        foreach ($contents as $content) {
        $oddata['order_id']=$order_id;
        $oddata['product_id']=$content->id;
        $oddata['product_name']=$content->name;
        $oddata['product_price']=$content->price;
        $oddata['product_sales_quantity']=$content->qty;

        DB::table('tbl_order_details')
            ->insert($oddata);
            Session::put('order_id',$order_id);

        }

        if ($payment_gateway == 'bank_transfer') {
            Cart::destroy();
              $all_order_info=DB::table('tbl_order_details')
                            ->select('tbl_order_details.*')
                            ->get();
        $manage_order=view('pages.bank_transfer')
            ->with('all_order_info', $all_order_info);
            return view('index')
            ->with('pages.bank_transfer',$manage_order);




           // return view('pages.bank_transfer');
         }elseif ($payment_gateway == 'paypal') {
             Cart::destroy();
            return view('pages.paypal');
        }else{
            echo "not selected";
        }







        //return Redirect::to('/complete');
    }


    public function customer_login(Request $request){

        $username=$request->username;
        $password=md5($request->password);
        $result = DB::table('tbl_customer')
            ->where('username', $username)
            ->where('password', $password)
            ->first();

            if ($result) {
                
                Session::put('customer_id', $result->customer_id);
                return Redirect::to('/my-account');
            }else{
                Session::put('message','Username or password does not matched !!');

                return Redirect::to('/login-check');
            }
    }

    public function customer_logout(){

        Session::flush();
        return Redirect::to('/login-check');
    }

       public function manage_order()
    {
       
              $all_order_info=DB::table('tbl_order')
                            ->join('tbl_customer','tbl_order.customer_id','=','tbl_customer.customer_id')
                            ->select('tbl_order.*','tbl_customer.customer_name')
                            ->get();
        $manage_order=view('admin.manage-order')
            ->with('all_order_info', $all_order_info);
            return view('admin_layout')
            ->with('admin.manage-order',$manage_order);

    }

  


}
