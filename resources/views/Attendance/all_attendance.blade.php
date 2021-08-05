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
                                <h3 class="page-title" style="text-align: center;">All Attendances</h3>
                                <a style="float:right;" href="{{route('take.attendance')}}" class="btn btn-sm btn-inverse">Take Attendance</a>
                                <hr>
                                <table id="datatable" class="table table-striped table-bordered">

                                    <thead>
                                    <tr>
                                        <th>SL No</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                  <?php
                                      $sl = 1;
                                   ?>
                                    @foreach($all_att as $att)
                                        <tr>
                                            <td>{{$sl++}}</td>
                                            <td>{{ $att->edit_date }}</td>
                                            <td>
                                                <a href="{{ URL::to('/view-attendance/'.$att->edit_date) }}" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>

                                                <a href="{{URL::to('/edit-attendance/'.$att->edit_date)}}" class="btn btn-warning"><i class="
glyphicon glyphicon-edit"></i></a>


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
