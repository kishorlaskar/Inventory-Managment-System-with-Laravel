<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendController extends Controller
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
    public function take_attendance()
    {
        $employee = DB::table('employees')->get();
        return view('Attendance.take-attendance', compact('employee'));
    }

    public function save_attendance(Request $request)
    {
        foreach ($request->employee_id as $emp_id) {

                $data = array();
                $data[] = [
                    "employee_id" => $emp_id,
                    "attendance" => $request->attendance[$emp_id],
                    "att_date" => $request->att_date,
                    "att_year" => $request->att_year,
                    "month" => $request->month,
                    "edit_date" => date("d_m_y")
                ];
                $att = DB::table('attendances')->insert($data);
                if ($att) {
                    $notification = array(
                        'message' => 'Successfully Attendance taken',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                } else {
                    $notification = array(
                        'message' => 'Something Wrong',
                        'alert-type' => 'error'
                    );
                    return Redirect()->back();
                }

        }


    }

//    public function all_attendance()
//    {
//        $all_att = DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();
//        return view('Attendance.all_attendance', compact('all_att'));
//    }

//    public function edit_attendance($edit_date)
//    {
//        $date = DB::table('attendances')->where('edit_date', $edit_date)->first();
//        $data = DB::table('attendances')
//            ->join('employees', 'attendances.employee_id', 'employees.id')
//            ->select('employees.name', 'employees.photo', 'attendances.*')
//            ->where('edit_date', $edit_date)->get();
//        return view('Attendance.edit-attendance', compact('data', 'date'));
//
//    }

//    public function update_attendance(Request $request)
//    {
//        foreach ($request->id as $id) {
//            $data = [
//
//                "attendance" => $request->attendance[$id],
//                "att_date" => $request->att_date,
//                "att_year" => $request->att_year,
//            ];
//            $att = Attendance::where(['att_date' => $request->att_date, 'id' => $id])->first();
//            $att->update($data);
//
//            if ($att) {
//                $notification = array(
//                    'message' => 'Successfully Attendance Updated',
//                    'alert-type' => 'success'
//                );
//                return Redirect()->back()->with($notification);
//            } else {
//                $notification = array(
//                    'message' => 'Something Wrong',
//                    'alert-type' => 'error'
//                );
//                return Redirect()->back();
//            }
//        }
//        }
//        public function view_attendance($edit_date)
//        {
//            $date = DB::table('attendances')->where('edit_date', $edit_date)->first();
//            $data = DB::table('attendances')
//                ->join('employees', 'attendances.employee_id', 'employees.id')
//                ->select('employees.name', 'employees.photo', 'attendances.*')
//                ->where('edit_date', $edit_date)->get();
//            return view('Attendance.edit-attendance', compact('data', 'date'));
//        }

}
