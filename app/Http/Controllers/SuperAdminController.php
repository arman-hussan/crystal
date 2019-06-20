<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class SuperAdminController extends Controller
{
    public function logout(){
    	Session::flush();
    	return Redirect::to('/llogin');
    }
}
