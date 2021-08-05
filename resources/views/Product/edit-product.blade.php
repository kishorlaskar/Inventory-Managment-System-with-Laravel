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
                            <div class="panel-heading"><h3 class="panel-title">Add Products</h3></div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="panel-body">
                                <form role="form" action="{{ url('update-product/'.$edit_product->id) }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select name="category_id" class="form-control">
                                            @php
                                                $cat = DB::table('categoris')->get();
                                            @endphp

                                            @foreach($cat as $row)
                                                <option value="{{$row->id}}"  @if ($edit_product->category_id == $row->id)

                                                                                  selected
                                                @endif
                                                >{{$row->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select name="supplier_id" class="form-control">
                                            @php
                                                $cat = DB::table('suppliers')->get();
                                            @endphp

                                            @foreach($cat as $row)
                                                <option value="{{$row->id}}" @if ($edit_product->supplier_id == $row->id)

                                                selected
                                                    @endif>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Code</label>
                                        <input type="text" class="form-control" name="product_code" value="{{$edit_product->product_code}}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Name</label>
                                        <input type="text" class="form-control"  name="product_name" value="{{$edit_product->product_name}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Product Skew</label>
                                        <input type="text" class="form-control" name="product_skew"  value="{{$edit_product->product_skew}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Godown</label>
                                        <input type="text" class="form-control" name="product_garage"  value="{{$edit_product->product_garage}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Route</label>
                                        <input type="text" class="form-control" name="product_route" value="{{$edit_product->product_route}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Production Date</label>
                                        <input type="date" class="form-control" name="production_date"   value="{{$edit_product->production_date}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Expire Date</label>
                                        <input type="date" class="form-control" name="expire_date" value="{{$edit_product->expire_date}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Buying Price</label>
                                        <input type="text" class="form-control"  name="buying_price" value="{{$edit_product->buying_price}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price" value="{{$edit_product->selling_price}}" >
                                    </div>
                                    <div class="form-group">
                                        <img src="#" id="image"/>
                                        <label for="exampleInputPassword1">Product Image</label>
                                        <input type="file" name="product_image" class="upload" accept="image/*"  onchange="readURL(this);">
                                    </div>
                                    <input type="hidden" name="old_photo" value="{{ $edit_product->product_image }}">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Old Photo</label>
                                        <img src="{{asset($edit_product->product_image)}}" style="height: 80px; width: 80px;">
                                    </div>

                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->

                </div> <!-- End row -->

                <!-- End row-->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>
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
