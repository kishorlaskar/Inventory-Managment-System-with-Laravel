<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    public function index()
    {
        $product=DB::table('products')
            ->join('categoris','products.category_id','categoris.id')
            ->select('categoris.category_name','products.*')
            ->get();
        $customer=DB::table('customers')->get();
        $categories = DB::table('categoris')->get();
        return view('Pos.pos',compact('product','customer','categories'));
    }
    public function  pending_order()
    {
        $pending = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('order_status','pending')
            ->get();

        return view('Orders.pending-orders',compact('pending'));
    }
    public function view_order($id)
    {
        $order=DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.*','orders.*')
            ->where('orders.id',$id)
            ->first();

        $order_details = DB::table('orderdetails')
            ->join('products','orderdetails.product_id','products.id')
            ->select('orderdetails.*','products.product_name','products.product_code')
            ->where('order_id',$id)
            ->get();
       return view('Orders.order-confirmation',compact('order','order_details'));
    }
    public function pos_done($id)
    {
        $approve = DB::table('orders')->where('id',$id)->update(['order_status'=>'approved']);
        if($approve)
        {
            $notification = array(
                'message' => 'Succesfully Order Updated | And all Products',
                'alert-type' =>'success'
            );
            return Redirect()->route('pending.orders')->with($notification);
        }
        else
        {
            $notification = array(
                'message' => 'error',
                'alert-type' =>'danger'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function  sucess_order()
    {
        $success = DB::table('orders')
            ->join('customers','orders.customer_id','customers.id')
            ->select('customers.name','orders.*')
            ->where('order_status','approved')
            ->get();

        return view('Orders.success-order',compact('success'));
    }
}
