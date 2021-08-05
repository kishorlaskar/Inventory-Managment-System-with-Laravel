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
                            <li class="active">Settings</li>
                        </ol>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-2"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3 class="panel-title">Update Company Info</h3></div>
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
                                <form role="form" action="{{ url('update-company/'.$setting->id) }}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Name</label>
                                        <input type="text" class="form-control" name="company_name" value="{{$setting->company_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">License</label>
                                        <input type="text" class="form-control" name="company_license" value="{{$setting->company_license}}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Phone</label>
                                        <input type="text" class="form-control"  name="company_phone" value="{{$setting->company_phone}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="text" class="form-control" name="company_email"  value="{{$setting->company_email}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <input type="text" class="form-control" name="company_address"  value="{{$setting->company_address}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">ZipCode</label>
                                        <input type="text" class="form-control" name="company_zipcode" value="{{$setting->company_zipcode}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">City</label>
                                        <input type="text" class="form-control" name="company_city"   value="{{$setting->company_city}}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Country</label>
                                        <input type="text" class="form-control" name="company_country" value="{{$setting->company_country}}" >
                                    </div>
                                    <div class="form-group">
                                        <img src="#" id="image"/>
                                        <label for="exampleInputPassword1">Logo</label>
                                        <input type="file" name="company_logo" class="upload" accept="image/*"  onchange="readURL(this);">
                                    </div>
                                    <input type="hidden" name="old_photo" value="{{ $setting->company_logo }}">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Old Photo</label>
                                        <img src="{{asset($setting->company_logo)}}" style="height: 80px; width: 80px;">
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
    <script>
        function readURL(input) {
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src',e.target.result)
                        .width(80)
                        .height(80)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
