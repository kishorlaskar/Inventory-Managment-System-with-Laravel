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
                            <div class="panel-heading"><h3 class="panel-title">Add New  Expense</h3>
                            <a href="{{ url('this-month-expense/') }}" class="btn btn-sm btn-info pull-right">This Month</a>
                                <a href="{{route('today.expense')}}" class="btn btn-sm btn-success pull-right">Today</a>
                                <a href="{{url('yearly-expense/')}}" class="btn btn-sm btn-danger pull-right">Yearly Expense</a>
                            </div>
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
                                <form role="form" action="{{ route('save.expense') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Expense Details</label>
                                        <textarea class="form-control" name="details"  required rows="4">
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Amount</label>
                                        <input type="text" class="form-control"  name="amount" placeholder="Input Amount" required>
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="month"  value="{{ date("F") }}" >
                                        <input  type="hidden" class="form-control" name="year"  value="{{ date("Y") }}" >
                                        <input  type="hidden" class="form-control" name="date"  value="{{ date('d-m-y') }}" >
                                    </div>

                                    <div class="form-group">

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
@endsection
