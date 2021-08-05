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
                            <li class="active">Customer</li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Update Customer Information</h3></div>
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
                                <form role="form" action="{{ url('update-customer/'.$editCustomer->id) }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control"  required name="name" value="{{$editCustomer->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="text" class="form-control" required name="email" value="{{$editCustomer->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="{{$editCustomer->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="address" value="{{$editCustomer->address}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">NID No</label>
                                        <input type="text" class="form-control" name="nid_no" value="{{$editCustomer->nid_no}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Shop Name</label>
                                        <input type="text" class="form-control" name="shop_name" value="{{$editCustomer->shop_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Account Holder</label>
                                        <input type="text" class="form-control" name="bank_account_holder" value="{{$editCustomer->bank_account_holder}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Account Number</label>
                                        <input type="text" class="form-control" name="bank_account_number" value="{{$editCustomer->bank_account_number}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name" value="{{$editCustomer->bank_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Branch</label>
                                        <input type="text" class="form-control" name="bank_branch" value="{{$editCustomer->bank_branch}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text" class="form-control" name="city" value="{{$editCustomer->city}}">                                    </div>
                                    <div class="form-group">
                                        <img src="#" id="image"/>
                                        <label for="exampleInputPassword1">Photo</label>
                                        <input type="file" name="photo" class="upload" accept="image/*"  onchange="readURL(this);">
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <img src="{{ asset($editCustomer->photo) }}" style="height: 60px; width: 60px;" name="old_photo">--}}
{{--                                    </div>--}}
                                    <div class="form-group">
                                        <img src="{{asset($editCustomer->photo)}}" style="height: 80px; width: 80px;">
                                        <input type="hidden" name="old_photo" value="{{ $editCustomer->photo }}">
                                    </div>
                                    <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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
