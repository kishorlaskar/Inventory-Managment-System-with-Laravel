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
                            <div class="panel-heading"><h3 class="panel-title">View Supplier Info</h3></div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Supplier Type</label>
                                    <p>{{ $viewSupplier->type }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <p>{{ $viewSupplier->name }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <p>{{ $viewSupplier->email }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <p>{{ $viewSupplier->phone }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Address</label>
                                    <p>{{ $viewSupplier->address }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bank Account Holder</label>
                                    <p>{{ $viewSupplier->bank_account_holder }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bank Account Number</label>
                                    <p>{{ $viewSupplier->bank_account_number }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bank Name</label>
                                    <p>{{ $viewSupplier->bank_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Bank Branch Name</label>
                                    <p>{{ $viewSupplier->bank_branch }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Shop Name</label>
                                    <p>{{ $viewSupplier->shop_name }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">City</label>
                                    <p>{{ $viewSupplier->city }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Photo</label>
                                    <br>
                                    <img src="{{asset($viewSupplier->photo)}}" width="80px" height="80px">
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
