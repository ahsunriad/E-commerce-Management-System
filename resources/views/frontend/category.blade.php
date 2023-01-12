@extends('layouts.includes.frontend')
@section('title', 'Categories')
@section('content')
{{--    @include('layouts.includes.slider')--}}
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>All Categories</h2>
                        <div class="row">

                                @foreach($categories as $item)
                                    <div class="col-md-3 mt-3">
                                        <div class="card">
                                            <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="">
                                            <div class="card-body">
                                                <h5>{{$item->name}}</h5>
                                                <span class="float-start"> {{$item->description}}</span>
                                                {{--                                        <span class="float-end"> <s>{{$item->selling_price}}</s> </span>--}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.fowl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
@endsection
