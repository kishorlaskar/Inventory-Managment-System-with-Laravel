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
                            <li class="active">Advance Salary</li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h3 class="panel-title">Advance Salary </h3></div>
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
                                <form role="form" action="{{ route('save.advance.salary') }}" method="POST"  >
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Employee</label>
                                        @php
                                         $emp=DB::table('employees')->get();
                                        @endphp
                                        <select  name="employee_id" class="form-control">
                                         <option disabled="" selected=""></option>
                                            @foreach($emp as $row)
                                                <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Month</label>
                                        <select name="month" class="form-control">
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Year</label>
                                        <input type="text" class="form-control"  name="year" placeholder="Select Year" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Advance Salary</label>
                                        <input type="text" class="form-control"  name="advance_salary" placeholder="Advance Salary" required>
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
