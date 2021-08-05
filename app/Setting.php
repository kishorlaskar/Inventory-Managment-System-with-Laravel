<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected  $fillable =
        [
            'company_name','company_license','company_phone','company_email','company_address',
            'company_logo','company_zipcode','company_city','company_country'
        ];
}
