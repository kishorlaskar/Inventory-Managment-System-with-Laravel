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
                                <h3 class="page-title" style="text-align: center;">All Supplier</h3>
                                <a style="float:right;" href="{{route('add.supplier')}}" class="btn btn-sm btn-inverse">Add Supplier</a>
                                <hr>
                                <table id="datatable" class="table table-striped table-bordered">

                                    <thead>
                                    <tr>
                                        <th>Supplier Type</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th> Supplier Phone</th>
                                        <th>City</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($suppliers as $sup)
                                        <tr>
                                            <td>{{$sup->type}}</td>
                                            <td>{{ $sup->name }}</td>


                                            <td><img src="{{$sup->photo}}" width="60px" height="60px" style=""></td>
                                            <td>{{$sup->phone}}</td>
                                            <td>{{$sup->city}}</td>
                                            <td>
                                                <a href="{{ URL::to('view-supplier/'.$sup->id) }}" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>

                                                <a href="{{URL::to('edit-supplier/'.$sup->id)}}" class="btn btn-warning"><i class="
glyphicon glyphicon-edit"></i></a>
                                                <a id="delete" href="{{URL::to('delete-supplier/'.$sup->id)}}" class="btn btn-danger"><i class="
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
