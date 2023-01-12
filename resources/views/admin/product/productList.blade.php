@extends('layouts.admin')
@section('title', 'Product List')
@section('content')
{{--    <div class="container-fluid">--}}
{{--    <div class="row">--}}
{{--        <div class="col-md-12">--}}
            <div class="card">
                @if(session('deleted'))
                    <div class="card-header-danger">
                        <h5>The product {{session('deleted')}} has been deleted successfully.</h5>
                    </div>
                @endif
                <div class="card-header card-header-custom"  style="background-color: #00BCD4">
                    <h4 class="card-title">Product List</h4>
{{--                    <p class="card-category"> Here is a subtitle for this table</p>--}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary-custom">
                            <th>ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Small Description</th>
{{--                            <th>Description</th>--}}
                            <th>Original Price</th>
                            <th>Selling Price</th>
                            <th>TAX</th>
                            <th>Trending</th>
                            <th>Image</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->category->name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->small_description}}</td>
{{--                                    <td>{{$item->description}}</td>--}}
                                    <td>{{$item->original_price}}</td>
                                    <td>{{$item->selling_price}}</td>
                                    <td>{{$item->tax}}</td>
                                    <td>{{$item->trending ? 'Yes': 'No'}}</td>
                                    <td><img src="{{asset('assets/uploads/product/'.$item->image)}}" class="w-75"></td>
                                    <td><a class="nav-link" href="{{url('deleteProduct/'.$item->id)}}"><i class="material-icons">delete</i><p>Delete</p></a> <a class="nav-link" href="{{url('editProduct/'.$item->id)}}"><i class="material-icons">edit_square</i><p>Edit</p></a></td>
{{--                                <td class="text-primary">$36,738</td>--}}
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
