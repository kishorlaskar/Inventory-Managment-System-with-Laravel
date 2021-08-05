<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected  $fillable = [
      'employee_id','att_date','att_year','attendance','edit_date','month'

    ];

}
