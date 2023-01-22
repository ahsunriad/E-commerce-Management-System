@extends('layouts.includes.frontend')
@section('title')
{{$category->name}}
@endsection
@section('content')
    <h2>{{$category->name}}</h2>
    <div class="row">
        @foreach($products as $item)
            <div class="col-md-3 mt-3">
                <a href="{{url('category/'.$category->slug.'/'.$item->id)}}">
                    <div class="card">
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" class="">
                        <div class="card-body">
                            <h5>{{$item->name}}</h5>
                            <span class="float-start"> {{$item->original_price}}</span>
                            <span class="float-end"> <s>{{$item->selling_price}}</s> </span>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
@endsection
