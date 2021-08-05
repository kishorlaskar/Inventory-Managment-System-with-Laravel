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
                                <h5 class="page-title"> Pay Salary Info
                                        <span class="pull-right">{{ date('F Y') }}</span>
                                </h5>
                            </div>
                                <table id="datatable" class="table table-striped table-bordered">

                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Salary</th>
                                        <th>Month</th>
{{--                                        <th>Advance Salary</th>--}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    @foreach($employee as $row)
                                        <tr>
                                            <td>{{$row->name}}</td>



                                            <td><img src="{{$row->photo}}" width="60px" height="60px" style=""></td>
                                            <td>{{ $row->salary }}</td>
                                            <td><span class="badge">{{date("F",strtotime('-1 months'))}}</span></td>
{{--                                            <td>{{ $row->advance_salary }}</td>--}}
                                            <td>
                                                <a href="" class=" btn-sm btn-danger">Pay Salary</a>
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
