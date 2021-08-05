@extends('layouts.app')

@section('content')


    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Expire Date</th>
                                <th>Photo</th>
                                <th>Selling Price</th>
                                <th>Product Skew</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($all_product as $row)
                                <tr>
                                    <td>{{ $row->product_code }}</td>
                                    <td>{{ $row->product_name }}</td>
                                    <td>{{$row->expire_date}}</td>
                                    <td><img src="{{$row->product_image}}" width="60px" height="60px" style=""></td>
                                    <td>{{$row->selling_price}}</td>
                                    <td>{{$row->product_skew}}</td>
                                    <td>
                                        <a href="{{ URL::to('view-product/'.$row->id) }}" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>

                                        <a href="{{URL::to('edit-product/'.$row->id)}}" class="btn btn-warning"><i class="
glyphicon glyphicon-edit"></i></a>
                                        <a id="delete" href="{{URL::to('delete-product/'.$row->id)}}" class="btn btn-danger"><i class="
glyphicon glyphicon-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>


                <!-- End row-->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>
@endsection
