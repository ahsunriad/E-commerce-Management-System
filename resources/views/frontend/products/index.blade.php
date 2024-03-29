@extends('layouts.includes.frontend')
@section('title', $category->name)
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h5 class="mb-0"><a href="{{url('categories')}}">Category</a> / {{$category->name}}</h5>
        </div>
    </div>
    <div class="row">
        @foreach($products as $item)
            <div class="col-md-3 mt-3">
                <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
                    <div class="card">
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" class="">
                        <div class="card-body">
                            <h5>{{$item->name}}</h5>
                            <span class="float-start"> <s>{{$item->original_price}}</s></span>
                            <span class="float-end"> {{$item->selling_price}}</span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
