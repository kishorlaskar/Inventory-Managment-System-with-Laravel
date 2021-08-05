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
                                <h5 class="page-title">{{ date("Y") }} Expense</h5>
                            </div>
                            <table id="datatable" class="table table-striped table-bordered">

                                <thead>
                                <tr>

                                    <th>Expense Details</th>
                                    <th>Amount</th>

                                </tr>
                                </thead>


                                <tbody>

                                @foreach($yearly_expense as $yearly)
                                    <tr>
                                        <td>{{$yearly->details}}</td>
                                        <td>{{$yearly->amount}}</td>
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
