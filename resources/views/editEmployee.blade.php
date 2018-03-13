@extends('layouts.master')

@section('content')


    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_contacts"></i> Employees</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">Edit Employee</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('updateEmployee', compact('employee')) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_first_name">Arabic First Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="ar_first_name" id="ar_first_name" value="{{ $employee->ar_first_name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_first_name">English First Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="en_first_name" id="en_first_name" value="{{ $employee->en_first_name }}" required>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_last_name">Arabic Last Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="ar_last_name" id="ar_last_name" value="{{ $employee->ar_last_name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_last_name">English Last Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="en_last_name" id="en_last_name" value="{{ $employee->en_last_name }}" required>
                            </div>
                        </div>
                        <!-- Position -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_position">Arabic Position</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="ar_position" id="ar_position" value="{{ $employee->ar_position }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_position">English Position</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="en_position" id="en_position" value="{{ $employee->en_position }}" required>
                            </div>
                        </div>

                        <!-- Gender -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="gender">Gender</label>
                            <div class="col-lg-10">
                                <select name="gender" id="gender" class="form-control">
                                    <option value="female" {{ $employee->gender == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="male" {{ $employee->gender == 'male' ? 'selected' : '' }}>Male</option>
                                </select>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="phone">Phone</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ $employee->phone }}" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="email">Email</label>
                            <div class="col-lg-10">
                                <input type='email' class="form-control" name="email" id="email" value="{{ $employee->email }}" required>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="image">Image</label>
                            <div class="col-lg-10">
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="form-group">
                            <!-- Buttons -->
                            <div class="col-lg-offset-2 col-lg-9">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="widget-foot">
                <!-- Footer goes here -->
                @if(count($errors) > 0)
                    <div class="row">
                        <div class="alert alert-dismissible alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection