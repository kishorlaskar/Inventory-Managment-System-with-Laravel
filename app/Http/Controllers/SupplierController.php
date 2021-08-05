<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function foo\func;

class SupplierController extends Controller
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
    public function add_supplier()
    {
        return view('Suppliers.add-suppliers');
    }
    public  function save_supplier(Request $request)
    {
        $validatedData = $request->validate([
            'type' =>'required',
            'name' => 'required|min:3|max:15',
            'phone' => 'required|unique:suppliers|max:13',
            'email'=>'required|unique:suppliers|max:30',
            'address' => 'required',
            'shop_name' =>'required',
            'city'=>'required'

        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop_name'] = $request->shop_name;
        $data['bank_account_holder'] = $request->bank_account_holder;
        $data['bank_account_number'] = $request->bank_account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;
        $data['type'] = $request->type;
        $image = $request->photo;
        if($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/supplier/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['photo'] = $image_url;
                $customer = DB::table('suppliers')
                    ->insert($data);
                if ($customer) {
                    $notification = array(
                        'message' => 'Supplier added Successfully',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.supplier')->with($notification);
                } else {
                    return Redirect()->back();
                }
            }
        }
        else{

            return  Redirect()->back();
        }
    }
    public  function all_supplier()
    {
        $suppliers = Supplier::all();
        return view('Suppliers.all_suppliers',compact('suppliers'));
    }
    public function view_supplier($id)
    {
          $viewSupplier = DB::table('suppliers')
              ->where('id',$id)
              ->first();
          return view('Suppliers.view-suppliers',compact('viewSupplier'));
    }
    public  function  edit_supplier($id)
    {
        $editSupplier = DB::table('suppliers')
            ->where('id',$id)
            ->first();
        return view('Suppliers.edit-suppliers',compact('editSupplier'));
    }
    public  function update_supplier(Request $request,$id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email'=>'required',
            'address' => 'required',

        ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop_name'] = $request->shop_name;
        $data['bank_account_holder'] = $request->bank_account_holder;
        $data['bank_account_number'] = $request->bank_account_number;
        $data['bank_name'] = $request->bank_name;
        $data['bank_branch'] = $request->bank_branch;
        $data['city'] = $request->city;
        $data['type'] = $request->type;
        $image = $request->photo;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['photo'] = $image_url;
                $img=DB::table('suppliers')->where('id',$id)->first();
                $image_path =$img->photo;
                $done=unlink($image_path);
                $supplier=DB::table('suppliers')->where('id',$id)->update($data);
                if($supplier)
                {
                    $notification = array(
                        'message' => 'Supplier updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.supplier')->with($notification);
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
                $customer=DB::table('suppliers')->where('id',$id)->update($data);
                if($customer)
                {
                    $notification = array(
                        'message' => 'Supplier updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.supplier')->with($notification);
                }
                else
                {
                    return  Redirect()->back();
                }
            }
            return  Redirect()->back();
        }
    }
    public  function delete_supplier($id)
    {
        $delete = DB::table('suppliers')
            ->where('id',$id)
            ->first();
        $deletephoto = $delete->photo;
        unlink($deletephoto);
        $deleteSupplier = DB::table('suppliers')
            ->where('id',$id)
            ->delete();
        if($deleteSupplier)
        {
            $notification = array(
                'message' => 'Supplier Deleted Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('all.supplier')->with($notification);
        }
        else
        {

            return  Redirect()->back();
        }
    }
}

