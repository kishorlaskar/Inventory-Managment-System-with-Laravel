<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function  view_profile()
    {
        return view('Profile.profile');
    }

    public  function  update_profile(Request $request,$id)
    {
        $data = array();
        $data['role'] = $request->role;
        $data['address'] = $request->address;
        $data['phone'] = $request->phone;
        $data['about'] = $request->about;
        $image = $request->photo;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/admin/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['photo'] = $image_url;
                $img=DB::table('admins')->where('id',$id)->first();
                $image_path =$img->photo;
                $done=unlink($image_path);
                $admin=DB::table('admins')->where('id',$id)->update($data);
                if($admin)
                {
                    $notification = array(
                        'message' => 'Admin updated Successfully',
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

            return  Redirect()->back();
        }
    }
}
