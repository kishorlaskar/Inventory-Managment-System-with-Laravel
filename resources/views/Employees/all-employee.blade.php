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
                                <th>Phone</th>
                                <th>Experience</th>
                                <th>Photo</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{$employee->experience}}</td>
                                <td><img src="{{$employee->photo}}" width="60px" height="60px" style=""></td>
                                <td>{{$employee->salary}}</td>
                                <td>
                                    <a href="{{ URL::to('view-employee/'.$employee->id) }}" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>

                                    <a href="{{URL::to('edit-employee/'.$employee->id)}}" class="btn btn-warning"><i class="
glyphicon glyphicon-edit"></i></a>
                                    <a id="delete" href="{{URL::to('delete-employee/'.$employee->id)}}" class="btn btn-danger"><i class="
glyphicon glyphicon-trash"></i></a>
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
