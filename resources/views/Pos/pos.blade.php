@extends('layouts.app')

@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12 bg-info">
                        <h4 class="pull-left page-title text-white">POS(Point Of Sale)</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#"class="text-white">Inventory</a></li>
                            <li class="active text-white">{{date('d/m/y')}}</li>
                        </ol>
                    </div>
                </div>
                <br>
                <div class="col-lg-12 col-md-12 col-lg-12">
                    <div class="portfolioFilter">
                        @foreach($categories as $row)
                        <a href="#" data-filter="*" class="current">{{$row->category_name}}</a>
                        @endforeach
                    </div>
                </div>

                <br><br>
<div class="row">
    <div class="col-md-6">

            <div class="price_card text-center">

                <ul class="price-features" style="border: 1px  solid grey">
                <table class="table table-striped">
                    <thead class="bg-primary">
                    <tr>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Single Price</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @php
                    $cart_pord = Cart::content()
                    @endphp
                    <tbody>
                    @foreach($cart_pord as $prod)
                    <tr>
                        <th>{{$prod->name}}</th>
                        <th>
                            <form action="{{url('/cart-update/'.$prod->rowId)}}" method="post">
                                @csrf
                            <input type="number" name="qty" value="{{$prod->qty}}" style="width: 35px;">
                            <button type="submit" class="btn btn-sm btn-success" style="margin-top: -2px;"><i class="fa fa-check"></i></button>
                            </form>
                        </th>
                        <td>{{$prod->price}}</td>
                        <td>{{$prod->price*$prod->qty}}</td>
                        <td><a href="{{URL::to('/cart-remove/'.$prod->rowId)}}" ><i class="fa fa-remove text-danger"></i></a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </ul>
                <div class="pricing-footer bg-primary">
                   <p>Quantity:{{Cart::count()}}</p>
                    <p>Subtotal:{{Cart::subtotal()}}</p>
                    <p>vat:{{Cart::tax()}}</p>
                    <hr>
                    <h2><p class="text-white">Total:{{Cart::total()}}</p></h2>


                    <form method="post" action="{{url('/create-invoice')}}">
                        @csrf
                        <br><br>
                        <div class="panel">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <h4 class="text-center">Select Customer
                                <a href="#" class="btn btn-sm btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>
                            </h4>
                            <select class="form-control" name="cus_id">
                                <option disabled selected>Select Customer Name</option>
                                @foreach($customer as $cus)
                                    <option value="{{$cus->id}}">{{$cus->name}}</option>
                                @endforeach

                            </select>
                        </div>
                </div>
                <button type="submit" class="btn-success">Create Invoice</button>
            </div> <!-- end Pricing_card -->

    </div>
    </form>
    <div class="col-md-6">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Image</th>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Product Code</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($product as $row)
                <tr>
                    <form action="{{ url('/add-cart') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$row->id}}">
                        <input type="hidden" name="name" value="{{$row->product_name}}">
                        <input type="hidden" name="qty" value="1">
                        <input type="hidden" name="price" value="{{$row->selling_price}}">
                    <td><img src="{{URL::to($row->product_image)}}" width="60px" height="60px"></td>
                    <td>{{$row->product_name}}</td>
                    <td>{{$row->category_name}}</td>
                        <td>{{$row->product_code}}</td>
                        <td><button type="submit" class="btn btn-info btn-sm"><i class="fa fa-plus-square"></i></button></td>
                    </form>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

            </div> <!-- container -->

        </div> <!-- content -->



    </div>
{{--    <#Customer Add>--}}
    <form action="{{route('save.customer')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Add Customer</h4>

                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Name</label>
                                <input type="text" class="form-control" id="field-4" name="name" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Email</label>
                                <input type="email" class="form-control" id="field-6" name="email" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-4" class="control-label">Phone</label>
                            <input type="text" class="form-control" id="field-4" name="phone" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Address</label>
                                <input type="text" class="form-control" id="field-5" name="address" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-5" class="control-label">NID</label>
                                <input type="text" class="form-control" id="field-5" name="nid_no" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Shop Name</label>
                                <input type="text" class="form-control" id="field-6" name="shop_name" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Bank Account Holder</label>
                                <input type="text" class="form-control" id="field-4" name="bank_account_holder" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-5" class="control-label">Bank Account Number</label>
                                <input type="text" class="form-control" id="field-5" name="bank_account_number" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Bank Name</label>
                                <input type="text" class="form-control" id="field-6" name="bank_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-4" class="control-label">Bank Brunch</label>
                                <input type="text" class="form-control" id="field-4" name="bank_branch" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-5" class="control-label">City</label>
                                <input type="text" class="form-control" id="field-5" name="city" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-6" class="control-label">Photo</label>
                               <img id="image" src="#">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">

                                <label for="exampleInputPassword1">Photo</label>
                                <input type="file" name="photo" class="upload" accept="image/*" required onchange="readURL(this);">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">Submit</button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    </form>

    <script>
        function readURL(input) {
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src',e.target.result)
                        .width(80)
                        .height(80)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
