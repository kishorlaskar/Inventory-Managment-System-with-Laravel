<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
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
    public function add_customer()
    {
        return view('Customers.add-customers');
    }
    public function all_customer()
    {
        $customers=Customer::all();
        return view('Customers.all-customers',compact('customers'));
    }
    public function save_customer(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'nid_no' => 'required',
            'phone' => 'required|max:13',
            'address' => 'required',

        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['nid_no'] = $request->nid_no;
        $data['shop_name'] = $request->shop_name;
        $data['bank_account_holder'] = $request->bank_account_holder;
        $data['bank_account_number'] = $request->bank_account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;
        $image = $request->photo;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['photo'] = $image_url;
                $customer=DB::table('customers')
                    ->insert($data);
                if($customer)
                {
                    $notification = array(
                        'message' => 'Customer added Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.customer')->with($notification);
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
    public function edit_customer($id)
    {
        $editCustomer= DB::table('customers')
            ->where('id',$id)
            ->first();
        return view('Customers.edit-customers',compact('editCustomer'));
    }

    public function update_customer(Request $request,$id)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['nid_no'] = $request->nid_no;
        $data['shop_name'] = $request->shop_name;
        $data['bank_account_holder'] = $request->bank_account_holder;
        $data['bank_account_number'] = $request->bank_account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;
        $image = $request->photo;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['photo'] = $image_url;
                $img=DB::table('customers')->where('id',$id)->first();
                $image_path =$img->photo;
                $done=unlink($image_path);
                $customer=DB::table('customers')->where('id',$id)->update($data);
                if($customer)
                {
                    $notification = array(
                        'message' => 'Customer updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.customer')->with($notification);
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
                $customer=DB::table('customers')->where('id',$id)->update($data);
                if($customer)
                {
                    $notification = array(
                        'message' => 'Customer updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.customer')->with($notification);
                }
                else
                {
                    return  Redirect()->back();
                }
            }
            return  Redirect()->back();
        }
    }
    public function delete_customer($id)
    {
        $delete = DB::table('customers')
            ->where('id',$id)
            ->first();
        $deletephoto = $delete->photo;
        unlink($deletephoto);
        $deleteCustomer = DB::table('customers')
            ->where('id',$id)
            ->delete();
        if($deleteCustomer)
        {
            $notification = array(
                'message' => 'Customers Deleted Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('all.customer')->with($notification);
        }
        else
        {
            return  Redirect()->back();
        }
    }
    public function view_customer($id)
    {
        $view = DB::table('customers')
            ->where('id',$id)
            ->first();
        return view('Customers.view-customers',compact('view'));
    }
}
