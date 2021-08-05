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
                            <li class="active">Employees</li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">View Employee</h3></div>
                            <div class="panel-body">


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <p>{{ $view->name }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <p>{{ $view->email }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <p>{{ $view->phone }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <p>{{ $view->address }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">NID No</label>
                                        <p>{{ $view->nid_no }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Experience</label>
                                        <p>{{ $view->experience }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Salary</label>
                                        <p>{{ $view->salary }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Vacation</label>
                                        <p>{{ $view->vacation }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <p>{{ $view->city }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Photo</label>
<br>
                                        <img src="{{asset($view->photo)}}" width="80px" height="80px">
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
