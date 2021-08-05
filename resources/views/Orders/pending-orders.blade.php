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

                                <th>Name</th>
                                <th>Order Date</th>
                                <th>Quantity</th>
                                <th>Total Amount</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($pending as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->order_date }}</td>
                                    <td>{{$row->total_products}}</td>
                                    <td>{{$row->total}}</td>
                                    <td>{{$row->payment_status}}</td>
                                    <td>{{$row->order_status}}</td>
                                    <td>
                                        <a href="{{ URL::to('view-order-status/'.$row->id) }}" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>

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
