<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SalaryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public  function  add_advance_salary()
    {
         return view('Salary.add-advance-salary');
    }
    public  function  all_advance_salary()
    {
         $advanceSalary = DB::table('advance_salaries')
             ->join('employees','advance_salaries.employee_id','employees.id')
             ->select('advance_salaries.*','employees.name','employees.photo','employees.salary')
             ->orderBy('id','DESC')
             ->get();
         return view('Salary.all-advance-salary',compact('advanceSalary'));
    }
    public  function  save_advance_salary(Request $request)
    {
        $month = $request->month;
        $employee_id = $request->employee_id;
        $advance = DB::table('advance_salaries')
            ->where('month',$month)
            ->where('employee_id', $employee_id)
            ->first();
        if ($advance === null)
        {
            $data = array();
            $data['employee_id'] = $request->employee_id;
            $data['month'] = $request->month;
            $data['year'] = $request->year;
            $data['advance_salary'] = $request->advance_salary;
            $advanced_salaries = DB::table('advance_salaries')
                ->insert($data);
            if($advanced_salaries)
            {
                $notification = array(
                    'message' => 'Advanced AdvanceSalary Paid Successfully',
                    'alert-type' =>'success'
                );
                return Redirect()->back()->with($notification);
            }
            else
            {
                $notification = array(
                    'message' => 'Problem Found',
                    'alert-type' =>'error'
                );
                return  Redirect()->back()->with($notification);
            }
        }
        else
            {
                $notification = array(
                    'message' => 'Advance AdvanceSalary Has Given already',
                    'alert-type' =>'error'
                );
                return  Redirect()->back()->with($notification);
            }

    }
    public  function  edit_salary($id){

    }
    public  function  update_salary(Request $request,$id){

    }
    public  function  delete_salary($id)
    {

    }
    public  function  pay_salary()
    {
//        $month = date('F',strtotime('-1 month'));
//        $advanceSalary = DB::table('advance_salaries')
//            ->join('employees','advance_salaries.employee_id','employees.id')
//            ->select('advance_salaries.*','employees.name','employees.photo','employees.salary')
//            ->where(00000'month',$month)
//            ->get();
        $employee = DB::table('employees')->get();
//        echo "<pre>";
//        print_r($employee);
//        exit();
       return view('Salary.pay-salary',compact('employee'));
    }
}
