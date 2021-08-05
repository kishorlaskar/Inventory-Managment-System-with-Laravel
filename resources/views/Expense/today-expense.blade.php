@extends('layouts.app')

@section('content')


    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">


                <!-- Page-Title -->
                <div class="row">
                    @php
                        $date = date('d-m-y');
      $today_expense =DB::table('expenses')->where('date',$date)->sum('amount');
                    @endphp
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <h4 style=" color: red; font-size: 30px; text-align: center; "> Total : {{ $today_expense }} tk </h4>
                        <div class="panel-default">
                            <div class="panel-heading">
                                <h5 class="page-title">Today Expense</h5>
                                <a  href="{{route('add.expense')}}" class="btn btn-sm btn-info pull-right">Add Expense</a>
                            </div>
                                <table id="datatable" class="table table-striped table-bordered">

                                    <thead>
                                    <tr>

                                        <th>Expense Details</th>
                                        <th>Amount</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>

                                    @foreach($today as $tod)
                                        <tr>
                                           <td>{{$tod->details}}</td>
                                            <td>{{$tod->amount}}</td>
                                            <td>

                                                <a href="{{URL::to('edit-today-expense/'.$tod->id)}}" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                                                <a id="delete" href="{{URL::to('delete-today-expense/'.$tod->id)}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
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
