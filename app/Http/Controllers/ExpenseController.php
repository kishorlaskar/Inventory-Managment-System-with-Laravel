<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
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
    public  function  add_expense()
    {
         return view('Expense.add-expense');
    }
    public  function  save_expense(Request $request)
    {
            $data = array();
            $data['details'] = $request->details;
            $data['amount'] = $request->amount;
            $data['date'] = $request->date;
            $data['month'] = $request->month;
            $data['year'] = $request->year;
            $expense = DB::table('expenses')->insert($data);
        if($expense)
        {
            $notification = array(
                'message' => 'Expense Info added Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Problem Found',
                'alert-type' =>'error'
            );
            return  Redirect()->back();
        }


     }
    public  function  today_expense()
    {
        $date = date('d-m-y');
       $today =DB::table('expenses')->where('date',$date)->get();
       return view('Expense.today-expense',compact('today'));

    }
    public function  edit_expense($id)
    {
        $edit_expense = DB::table('expenses')->where('id',$id)->first();
        return view('Expense.edit-today-expense',compact('edit_expense'));
    }
    public  function  update_expense(Request $request,$id)
    {
        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;

        $expense = DB::table('expenses')->where('id',$id)->update($data);
        if($expense)
        {
            $notification = array(
                'message' => 'Expense Info updated Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Problem Found',
                'alert-type' =>'error'
            );
            return  Redirect()->back();
        }

    }
    public  function  delete_expense($id){

        $expense = DB::table('expenses')
        ->where('id',$id)
            ->delete();
        if($expense)
        {
            $notification = array(
                'message' => 'Expense Info deleted Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Problem Found',
                'alert-type' =>'error'
            );
            return  Redirect()->back();
        }
    }
    public function  thismonth_expense()
    {
        $month = date('F');
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  yearly_expense()
    {
        $year = date("Y");
        $yearly_expense =DB::table('expenses')->where('year',$year)->get();
        return view('Expense.yearly-expense',compact('yearly_expense'));
    }
    public function  january_expense()
    {
        $month = "January";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  february_expense()
    {
        $month = "February";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  march_expense()
    {
        $month = "March";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  april_expense()
    {
        $month = "April";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  may_expense()
    {
        $month = "May";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  june_expense()
    {
        $month = "June";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  july_expense()
    {
        $month = "July";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  august_expense()
    {
        $month = "August";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  september_expense()
    {
        $month = "September";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  october_expense()
    {
        $month = "October";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  november_expense()
    {
        $month = "November";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }
    public function  december_expense()
    {
        $month = "December";
        $monthly_expense =DB::table('expenses')->where('month',$month)->get();
        return view('Expense.thismonth-expense',compact('monthly_expense'));
    }

}
