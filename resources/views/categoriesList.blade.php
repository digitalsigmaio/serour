@extends('layouts.master')

@section('content')

    <!-- Header -->
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"><i class="icon_circle_empty"></i> Category</h3>
        </div>
    </div>

    <!-- Content -->
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Categories list</strong></h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover bootstrap-datatable ">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Arabic Name</th>
                        <th>English Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($categories))
                        @foreach($categories as $category)
                            <tr>
                                <td><img src="{{ $category->image }}" style="height:40px; margin-top:-2px;"></td>
                                <td><div dir="rtl">{{ $category->ar_name }}</div></td>
                                <td>{{ $category->en_name }}</td>
                                <td><a href="{{ route('editCategory', compact('category')) }}"><span class="btn btn-info">Edit</span></a></td>
                                <td>
                                    <form action="{{ route('deleteCategory', compact('category')) }}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger deleteItem">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="7" style="text-align: center"><h3>Nothing to show</h3></td></tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection