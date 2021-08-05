@extends('layouts.app')

@section('content')


    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
<div class="panel-default">
    <div class="panel-heading">
        <h3 class="page-title" style="text-align: center;">All Customers</h3>
        <a style="float:right;" href="{{route('add.customer')}}" class="btn btn-sm btn-inverse">Add Customer</a>
        <hr>
        <table id="datatable" class="table table-striped table-bordered">

            <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Photo</th>
                <th>City</th>
                <th>Action</th>
            </tr>
            </thead>


            <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{$customer->address}}</td>
                    <td><img src="{{$customer->photo}}" width="60px" height="60px" style=""></td>
                    <td>{{$customer->city}}</td>
                    <td>
                        <a href="{{ URL::to('view-customer/'.$customer->id) }}" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>

                        <a href="{{URL::to('edit-customer/'.$customer->id)}}" class="btn btn-warning"><i class="
glyphicon glyphicon-edit"></i></a>
                        <a id="delete" href="{{URL::to('delete-customer/'.$customer->id)}}" class="btn btn-danger"><i class="
glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>

                    </div>
                </div>


                <!-- End row-->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>
@endsection
