<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add_cart(Request $request)
    {
       $data = array();
       $data['id']=$request->id;
       $data['name']=$request->name;
       $data['qty']=$request->qty;
       $data['price']=$request->price;

      $add = Cart::add($data);
        if($add)
        {
            $notification = array(
                'message' => 'Product Added',
                'alert-type' =>'success'
            );
            return Redirect()->back()->with($notification);
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
    public function  update_cart(Request $request,$rowId)
    {
        $qty = $request->qty;
        $update = Cart::update($rowId, $qty);
                  if($update)
                  {
                      $notification = array(
                          'message' => 'Qty Updated',
                          'alert-type' =>'success'
                      );
                      return Redirect()->back()->with($notification);
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
    public function cart_remove($rowId)
    {
        $remove = Cart::remove($rowId);
        if($remove)
        {
            $notification = array(
                'message' => 'Product Removed from the Cart',
                'alert-type' =>'success'
            );
            return Redirect()->back()->with($notification);
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
    public function create_invoice(Request $request)
    {
        $validatedData = $request->validate([
            'cus_id' => 'required',
    ],
        [
        'cus_id.required' => 'Select A Customer First !!',

        ]);
        $cus_id = $request->cus_id;
        $customer = DB::table('customers')->where('id',$cus_id)->first();
        $contents = Cart::content();

 return view('Invoice.create-invoice',compact('customer','contents'));
    }
    public function  final_invoice(Request $request)
    {

     $data = array();
     $data['customer_id'] = $request->customer_id;
     $data['order_date'] = $request->order_date;
     $data['order_status'] = $request->order_status;
     $data['total_products'] = $request->total_products;
     $data['sub_total'] = $request->sub_total;
     $data['vat'] = $request->vat;
     $data['total'] = $request->total;
     $data['payment_status'] = $request->payment_status;
     $data['pay'] = $request->pay;
     $data['due'] = $request->due;



     $order_id = DB::table('orders')->insertGetId($data);
     $contents=Cart::content();

     $odata = array();
    foreach ($contents as $content)
    {
        $odata['order_id'] = $order_id;
        $odata['product_id'] = $content->id;
        $odata['quantity'] = $content->qty;
        $odata['unitcost'] = $content->price;
        $odata['total'] = $content->total;

        $insert = DB::table('orderdetails')->insert($odata);
        if($insert)
        {
            $notification = array(
                'message' => 'Succesfully Invoice created | Please Deliver the Product and acept status ',
                'alert-type' =>'success'
            );
            Cart::destroy();
            return Redirect()->route('home')->with($notification);
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
    }
}

