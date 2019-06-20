<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{

	    protected $guarded = ['remember_token'];

    protected $table = 'tbl_customer';
}
