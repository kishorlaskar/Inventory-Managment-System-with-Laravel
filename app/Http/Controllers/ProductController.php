<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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
    public  function add_product()
    {
        return view('Product.add-product');
    }
    public  function  all_product()
    {
        $all_product = DB::table('products')->get();
        return view('Product.all-product',compact('all_product'));
    }
    public  function  save_product(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|max:50',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'product_code' => 'required|max:10|min:5|unique:products',
            'product_image' => 'required',
            'product_skew' => 'required',
            'product_garage' => 'required',
            'product_route' => 'required',
            'production_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required'
        ]);
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_code'] = $request->product_code;
        $data['product_skew'] = $request->product_skew;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['production_date'] = $request->production_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price']  = $request->buying_price;
        $data['selling_price'] = $request->selling_price;


        $image = $request->product_image;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['product_image'] = $image_url;
                $product=DB::table('products')
                    ->insert($data);
                if($product)
                {
                    $notification = array(
                        'message' => 'Product added Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('add.product')->with($notification);
                }
                else
                {
                    $notification = array(
                        'message' => 'Problem Found!!!!!!!!!',
                        'alert-type' =>'error'
                    );
                }
                    return  Redirect()->back()->with($notification);
                }
            }
    }
    public  function  view_product($id)
    {
             $view_product = DB::table('products')
             ->join('categoris','products.category_id','categoris.id')
             ->join('suppliers','products.supplier_id','suppliers.id')
             ->select('products.*','categoris.category_name','suppliers.name')
             ->where('products.id',$id)
             ->first();
        return view('Product.view-product',compact('view_product'));
    }
    public  function  edit_product($id)
    {
        $edit_product  = DB::table('products')
        ->join('categoris','products.category_id','categoris.id')
        ->join('suppliers','products.supplier_id','suppliers.id')
        ->select('products.*','categoris.category_name','suppliers.name')
        ->where('products.id',$id)
        ->first();
        return view('Product.edit-product',compact('edit_product'));
    }
    public function update_product(Request $request,$id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['supplier_id'] = $request->supplier_id;
        $data['product_code'] = $request->product_code;
        $data['product_skew'] = $request->product_skew;
        $data['product_garage'] = $request->product_garage;
        $data['product_route'] = $request->product_route;
        $data['production_date'] = $request->production_date;
        $data['expire_date'] = $request->expire_date;
        $data['buying_price']  = $request->buying_price;
        $data['selling_price'] = $request->selling_price;

        $image = $request->product_image;
        if($image)
        {
            $image_name = str_random(20);
            $ext=strtolower($image->getClientoriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success)
            {
                $data['product_image'] = $image_url;
                $img=DB::table('products')->where('id',$id)->first();
                $image_path =$img->product_image;
                $done=unlink($image_path);
                $product=DB::table('products')->where('id',$id)->update($data);
                if($product)
                {
                    $notification = array(
                        'message' => 'Product updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.product')->with($notification);
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
                $data['product_image'] = $oldphoto;
                $product_oldphoto=DB::table('products')->where('id',$id)->update($data);
                if($product_oldphoto)
                {
                    $notification = array(
                        'message' => 'Product updated Successfully',
                        'alert-type' =>'success'
                    );
                    return Redirect()->route('all.product')->with($notification);
                }
                else
                {
                    return  Redirect()->back();
                }
            }
            return  Redirect()->back();
        }
    }
    public  function  delete_product($id)
    {
        $delete = DB::table('products')
            ->where('id',$id)
            ->first();
        $deletephoto = $delete->product_image;
        unlink($deletephoto);
        $deleteProduct = DB::table('products')
            ->where('id',$id)
            ->delete();
        if($deleteProduct)
        {
            $notification = array(
                'message' => 'Product Deleted Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }
        else
        {

            return  Redirect()->back();
        }
    }
    //Import and Export Poduct
    public function  import_product()
    {
        return view('Product.import-product');
    }
    public function export()
    {
        return Excel::download(new ProductsExport,'products.xlsx');

    }
    public function import(Request $request)
    {
        $import =  Excel::import(new ProductsImport, $request->file('import_file'));

        if($import)
        {
            $notification = array(
                'message' => 'Import Successfully',
                'alert-type' =>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }
        else
        {

            return  Redirect()->back();
        }
    }

}
