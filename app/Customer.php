<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name','email','phone','address','nid_no','shop_name','bank_account_holder','bank_account_number','bank_name','bank_branch','city','photo'
    ];
}
