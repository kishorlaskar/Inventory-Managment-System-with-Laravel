<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name','email','phone','address','nid_no','experience','vacation','salary','city','photo'
    ];
}
