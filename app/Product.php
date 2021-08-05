<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $fillable = [
        'category_id','supplier_id','product_code','product_name',
        'product_image','product_skew','product_garage',
        'product_route','production_date','expire_date',
        'buying_price','selling_price'
    ];
}
