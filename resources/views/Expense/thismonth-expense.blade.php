@extends('layouts.app')

@section('content')


    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
<div>
    <a href="{{ route('january.expense')}}" class="btn btn-sm btn-info">January</a>
    <a href="{{ route('february.expense')}}" class="btn btn-sm btn-success">February</a>
    <a href="{{ route('march.expense')}}" class="btn btn-sm btn-danger">March</a>
    <a href="{{ route('april.expense')}}" class="btn btn-sm btn-warning">April</a>
    <a href="{{ route('may.expense')}}" class="btn btn-sm btn-primary">May</a>
    <a href="{{ route('june.expense')}}" class="btn btn-sm btn-inverse">June</a>
    <a href="{{ route('july.expense')}}" class="btn btn-sm btn-info">July</a>
    <a href="{{ route('august.expense')}}" class="btn btn-sm btn-primary">August</a>
    <a href="{{ route('september.expense')}}" class="btn btn-sm btn-success">September</a>
    <a href="{{ route('october.expense')}}" class="btn btn-sm btn-default">October</a>
    <a href="{{ route('november.expense')}}" class="btn btn-sm btn-danger">November</a>
    <a href="{{ route('december.expense')}}" class="btn btn-sm btn-warning">December</a>

</div>

                <!-- Page-Title -->
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel-default">
                            <div class="panel-heading">
                                <h5 class="page-title">{{ date("F") }} Expense</h5>
                            </div>
                            <table id="datatable" class="table table-striped table-bordered">

                                <thead>
                                <tr>

                                    <th>Expense Details</th>
                                    <th>Amount</th>

                                </tr>
                                </thead>


                                <tbody>

                                @foreach($monthly_expense as $mon)
                                    <tr>
                                        <td>{{$mon->details}}</td>
                                        <td>{{$mon->amount}}</td>

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
