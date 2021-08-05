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
                            <li class="active">Supplier</li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Add Supplier</h3></div>
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
                                <form role="form" action="{{ route('save.supplier') }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email" class="form-control"  name="email" placeholder=" Supplier Email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control" name="phone"  placeholder="Supplier Phone" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="address"  placeholder="Address" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Shop Name</label>
                                        <input type="text" class="form-control" name="shop_name"   placeholder="Shop Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Supplier Type</label>
                                        <select name="type" class="form-control">
                                            <option type="disable"></option>
                                            <option value="Distributor">Distributor</option>
                                            <option value="Whole_Saler">Whole Saler</option>
                                            <option value="Broker">Broker</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Account Holder</label>
                                        <input type="text" class="form-control" name="bank_account_holder"  placeholder="Holder Name" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Account Number</label>
                                        <input type="text" class="form-control"  name="bank_account_number" placeholder="Account Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Name</label>
                                        <input type="text" class="form-control"  name="bank_name" placeholder="Account Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bank Brunch Name</label>
                                        <input type="text" class="form-control"  name="bank_branch" placeholder="Account Number">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text" class="form-control" name="city"  placeholder="City" required>
                                    </div>
                                    <div class="form-group">
                                        <img src="#" id="image"/>
                                        <label for="exampleInputPassword1">Photo</label>
                                        <input type="file" name="photo" class="upload" accept="image/*" required onchange="readURL(this);">
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
