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
                            <h3 class="page-title" style="text-align: center;">Take Attendance</h3>
                            <a style="float:right;" href="{{route('all.attendance')}}" class="btn btn-sm btn-inverse">All Attendance</a>
                            <hr>
                        </div>
                        <h3 class="text-success text-center"> Today {{ date('d/m/y') }}</h3>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Photo</th>
                                <th>Attendance</th>

                            </tr>
                            </thead>


                            <tbody>
                            <form action="{{ route('save.attendance') }}" method="POST">
                                @csrf
                            @foreach($employee as $emp)
                                <tr>
                                    <td>{{ $emp->name }}</td>
                                    <td><img src="{{$emp->photo}}" width="60px" height="60px" style="">
                                    <input type="hidden" name="employee_id[]" value="{{$emp->id}}">
                                    </td>

                                    <td>
                                        <input type="radio" name="attendance[{{$emp->id}}]" value="Present">Present
                                        <input type="radio" name="attendance[{{$emp->id}}]" value="Absent">Absent
{{--                                        <input type="radio" name="attendance[{{$emp->id}}]" value="Present">Present--}}
{{--                                        <input type="radio" name="attendance[{{$emp->id}}]" value="Absent">Absent--}}
                                        <input type="hidden" name="att_date" value="{{ date('d/m/y') }}">
                                        <input type="hidden" name="month" value="{{date(("F"))}}">
                                        <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
 <button type="submit" class="btn btn-sm btn-warning">Take Attendance</button>
                        </form>
                    </div>
                </div>


                <!-- End row-->

            </div> <!-- container -->

        </div> <!-- content -->

    </div>
@endsection
