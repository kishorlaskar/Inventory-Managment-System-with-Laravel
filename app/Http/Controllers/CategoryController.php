<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
    public function add_category()
    {
        return view('Category.add-category');
    }
    public function all_category()
    {
        $all_category = DB::table('categoris')->get();
        return view('Category.all-category',compact('all_category'));
    }
    public  function  save_category(Request $request)
    {
         $data = array();
         $data['category_name'] = $request->category_name;
         $save_category = DB::table('categoris')
             ->insert($data);
        if($save_category)
        {
            $notification = array(
                'message' => 'Category Save Successfully',
                'alert-type' =>'info'
            );
            return Redirect()->route('all.category')->with($notification);
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
    public  function  delete_category($id)
    {
        $delete_category = DB::table('categoris')
            ->where('id',$id)
            ->delete();
        if($delete_category)
        {
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('all.category')->with($notification);
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
    public function  edit_category($id)
    {
         $edit_category = DB::table('categoris')
             ->where('id',$id)
            ->first();
         return view('Category.edit-category',compact('edit_category'));
    }
    public  function  update_category(Request $request,$id)
    {
        $data = array();
        $data['category_name'] = $request->category_name;
        $category=DB::table('categoris')->where('id',$id)->update($data);
        if($category)
        {
            $notification = array(
                'message' => 'Category updated Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'Problem Found!!!',
                'alert-type' =>'success'
            );
            return  Redirect()->back();
        }
    }
}
