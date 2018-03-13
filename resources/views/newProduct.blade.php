@extends('layouts.master')

@section('content')


    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_gift"></i> Products</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">New Product</div>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body">
            <div class="padd">

                <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="{{ route('storeProduct') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- Name -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_name">Arabic Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="ar_name" id="ar_name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_name">English Name</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" name="en_name" id="en_name">
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="form-group">
                            <label class="control-label col-lg-2" for="ar_description">Arabic Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="ar_description" id="ar_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-2" for="en_description">English Description</label>
                            <div class="col-lg-10">
                                <textarea class="form-control" name="en_description" id="en_description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="category" class="control-label col-lg-2">Category</label>
                            <div class="col-lg-10">
                                <select name="category_id" id="category" class="form-control">
                                    <option value="" selected disabled style="background-color: grey; color: #fff">Select category</option>
                                    @if(count($categories))
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->en_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <!-- Logo -->
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
                                <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
            <div class="widget-foot">
                <!-- Footer goes here -->
            </div>
        </div>
    </div>
    @if($errors->any())
        <div class="row">
            <div class="alert alert-dismissible alert-danger col-md-6 col-md-offset-3">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
@endsection