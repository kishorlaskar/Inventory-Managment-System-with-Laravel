@extends('layouts.app')

@section('content')


    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel-heading">
                            <h3 class="page-title" style="text-align: center;">Update Attendance of {{ $date->att_date }}</h3>
                            <a style="float:right;" href="{{route('all.attendance')}}" class="btn btn-sm btn-inverse">All Attendance</a>
                            <hr>
                        </div>
                        <h3 class="text-success text-center"> Update Attendance </h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Attendance</th>

                            </tr>
                            </thead>


                            <tbody>

                                @foreach($data as $emp)
                                    <tr>
                                        <td>{{ $emp->name }}</td>
                                        <td><img src="{{URL::to($emp->photo)}}" width="60px" height="60px" style="">
                                            <input type="hidden" name="id[]" value="{{$emp->id}}">
                                        </td>

                                        <td>
                                            <input type="radio" name="attendance[{{$emp->id}}]" value="Present" required
                                                   @if($emp->attendance == 'Present' )
                                                   checked
                                                @endif
                                             disabled>Present
                                            <input type="radio" name="attendance[{{$emp->id}}]" value="Absent"
                                                   required
                                                   @if($emp->attendance == 'Absent' )
                                                   checked
                                                @endif
                                             disabled >Absent
                                            <input type="hidden" name="att_date" value="{{ date('d/m/y') }}">
                                            <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                            <input type="hidden" name="month" value="{{ date("F") }}">
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
