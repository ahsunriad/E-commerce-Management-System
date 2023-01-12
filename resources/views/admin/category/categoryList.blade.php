@extends('layouts.admin')
@section('title', 'Category List')
@section('content')
{{--    <div class="container-fluid">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
            <div class="card">
                @if(session('deleted'))
                    <div class="card-header-danger">
                        <h5>The Category {{session('deleted')}} has been deleted successfully.</h5>
                    </div>
                @endif
                <div class="card-header-custom">
                    <h4 class="card-title ">Category List</h4>
{{--                    <p class="card-category"> Here is a subtitle for this table</p>--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary-custom">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($data as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td><img src="{{asset('assets/uploads/category/'.$category->image)}}" class="w-25"></td>
                                    <td><a class="nav-link" href="{{url('deleteCategory/'.$category->id)}}"><i class="material-icons">delete</i><p>Delete</p></a> <a class="nav-link" href="{{url('editCategory/'.$category->id)}}"><i class="material-icons">edit_square</i><p>Edit</p></a></td>
                                    {{--                              <td class="text-primary">$36,738</td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
@endsection
