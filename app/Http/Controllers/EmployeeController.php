<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public  function add_employee()
    {
        return view('Employees.add-employee');
    }
// All Employee function are here
    public  function all_employee()
    {
        $employees = Employee::all();
        return view('Employees.all-employee',compact('employees'));
    }
    // Save a emplyee info at a time
    public  function  save_employee(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|unique:employees|max:255',
            'nid_no' => 'required|unique:employees|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
            'experience'=> 'required',
            'salary'=>'required',
            'vacation'=>'required',
            'city'=>'required',
            'photo' => 'required',
        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['nid_no'] = $request->nid_no;
        $data['experience'] = $request->experience;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;


        $image = $request->photo;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['photo'] = $image_url;
                $employee=DB::table('employees')
                    ->insert($data);
                if($employee)
                {
                    $notification = array(
                        'message' => 'Employee added Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }
                else
                {
                    return  Redirect()->back();
                }
            }
        }


        else{
            return  Redirect()->back();
        }

 }
 // view a single employee info
    public  function  view_employee($id)
    {
        $view = DB::table('employees')
              ->where('id',$id)
              ->first();
        return view('Employees.view-employee',compact('view'));
    }
    // Edit a single employee
    public  function  edit_employee($id)
    {
        $editEmployee = DB::table('employees')
             ->where('id',$id)
            ->first();
        return view('Employees.edit-employee',compact('editEmployee'));
    }
    //update employee info
    public  function update_employee(Request $request,$id)
    {

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['nid_no'] = $request->nid_no;
        $data['experience'] = $request->experience;
        $data['salary'] = $request->salary;
        $data['vacation'] = $request->vacation;
        $data['city'] = $request->city;
        $image = $request->photo;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['photo'] = $image_url;
                $img=DB::table('employees')->where('id',$id)->first();
                $image_path =$img->photo;
                $done=unlink($image_path);
                $employee=DB::table('employees')->where('id',$id)->update($data);
                if($employee)
                {
                    $notification = array(
                        'message' => 'Employee updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }
                else
                {
                    return  Redirect()->back();
                }
            }
        }


        else{
            $oldphoto = $request->old_photo;
            if($oldphoto)
            {
                $data['photo'] = $oldphoto;
                $employee=DB::table('employees')->where('id',$id)->update($data);
                if($employee)
                {
                    $notification = array(
                        'message' => 'Employee updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }
                else
                {
                    return  Redirect()->back();
                }
            }
            return  Redirect()->back();
        }

    }
// delete employee info with image deletion
public  function  delete_employee($id)
{
   $delete = DB::table('employees')
                   ->where('id',$id)
                   ->first();
          $deletephoto = $delete->photo;
          unlink($deletephoto);
          $deleteEmployee = DB::table('employees')
              ->where('id',$id)
              ->delete();
    if($deleteEmployee)
    {
        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' =>'success'
        );
        return Redirect()->route('all.employee')->with($notification);
    }
    else
    {
        return  Redirect()->back();
    }


}
}
