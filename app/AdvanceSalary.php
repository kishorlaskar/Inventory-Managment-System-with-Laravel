<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdvanceSalary extends Model
{
    protected  $fillable = [
        'id','employee_id','month','year','status','advance_salary'
    ];
}
