@extends('layouts.app')

@section('content')


    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Inventory</a></li>
                            <li class="active">Products</li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">View Product</h3></div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <p>{{ $view_product->category_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Supplier</label>
                                    <p>{{ $view_product->name }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Product Code</label>
                                    <p>{{ $view_product->product_code }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Name</label>
                                    <p>{{ $view_product->product_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product skew</label>
                                    <p>{{ $view_product->product_skew }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Garage</label>
                                    <p>{{ $view_product->product_garage }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Route</label>
                                    <p>{{ $view_product->product_route }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Production Date</label>
                                    <p>{{ $view_product->production_date }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Expire Date</label>
                                    <p>{{ $view_product->expire_date }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Buying Price</label>
                                    <p>{{ $view_product->buying_price }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Selling Price</label>
                                    <p>{{ $view_product->selling_price }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Product Image</label>
                                    <br>
                                    <img src="{{ asset($view_product->product_image) }}" width="80px" height="80px">
                                </div>


                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->




                </div> <!-- End row -->

                <!-- End row-->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>

@endsection
