@extends('layouts.includes.frontend')
@section('title', 'Home')
@section('content')
    @include('layouts.includes.slider')
    <div class="py-5">
        <div class="container">
            <h2>Featured Products</h2>
            <div class="row">
{{--                <div class="shit-carousel owl-theme">--}}
{{--                    <div class="item">--}}
                        @foreach($featured_products as $item)
                            <div class="col-md-3 mt-3">
                                <div class="card">
                                    <img src="{{asset('assets/uploads/product/'.$item->image)}}" class="">
                                    <div class="card-body">
                                        <h5>{{$item->name}}</h5>
                                        <span class="float-start"> {{$item->original_price}}</span>
                                        <span class="float-end"> <s>{{$item->selling_price}}</s> </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <div class="py-5">
        <div class="container">
            <h2>Featured Category</h2>
            <div class="row">
                {{--                <div class="shit-carousel owl-theme">--}}
                {{--                    <div class="item">--}}
                @foreach($trending_category as $item)
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <img src="{{asset('assets/uploads/category/'.$item->image)}}" class="">
                            <div class="card-body">
                                <h5>{{$item->name}}</h5>
                                <span class="float-start"> {{$item->description}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $('.shit-carousel').owlCarousel({
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
                    items:2
                }
            }
        })
    </script>
@endsection
