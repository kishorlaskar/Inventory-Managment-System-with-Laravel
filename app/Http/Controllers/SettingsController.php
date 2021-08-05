<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
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
    public function settings()
    {
        $setting = DB::table('settings')->first();
        return view('Settings.settings',compact('setting'));
    }
    public  function update_settings(Request $request, $id)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|max:50',
            'company_license' => 'required|max:255',
            'company_email' => 'required|max:255',
            'company_phone' => 'required|max:13',
            'company_address' => 'required',
            'company_zipcode'=>'required',
            'company_city'=>'required',
            'company_country'=>'required'
        ]);
        $data = array();
        $data['company_name'] = $request->company_name;
        $data['company_license'] = $request->company_license;
        $data['company_email'] = $request->company_email;
        $data['company_phone'] = $request->company_phone;
        $data['company_address'] = $request->company_address;
        $data['company_zipcode'] = $request->company_zipcode;
        $data['company_city'] = $request->company_city;
        $data['company_country'] = $request->company_country;


        $image = $request->company_logo;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/company/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['company_logo'] = $image_url;
                $img=DB::table('settings')->where('id',$id)->first();
                $image_path =$img->company_logo;
                $done=unlink($image_path);
                $setting=DB::table('settings')->where('id',$id)->update($data);
                if($setting)
                {
                    $notification = array(
                        'message' => 'Company Info updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->back()->with($notification);
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
                $data['company_logo'] = $oldphoto;
                $product_oldphoto=DB::table('settings')->where('id',$id)->update($data);
                if($product_oldphoto)
                {
                    $notification = array(
                        'message' => 'Company Info updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->back()->with($notification);
                }
                else
                {
                    return  Redirect()->back();
                }
            }
            return  Redirect()->back();
        }
    }
}
