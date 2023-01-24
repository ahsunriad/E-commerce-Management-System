@extends('layouts.includes.frontend')
@section('title', $products->name)
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h5 class="mb-0"><a href="{{url('categories')}}">Category</a> / <a href="{{url('category/'.$products->category->slug)}}">{{$products->category->name}}</a> / {{$products->name}}</h5>
        </div>
    </div>
    <div class="container">
        <div class="card shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{asset('assets/uploads/product/'.$products->image)}}" class="w-100">
                    </div>
                        <div class="col-md-8">
                        <h2 class="mb-0">
                            {{$products->name}}
                            <label style="font-size:  16px;" class="float-end badge bg-danger trending_tag">{{$products->trending == '1'? 'Trending':''}}</label>
                        </h2>
                        <hr>
                        <label class="me-3">Original Price: <s>Tk. {{$products->original_price}}</s></label>
                        <label class="fw-bold">Selling Price: Tk. {{$products->selling_price}}</label>
                        <p class="mt-3">{{$products->small_description}}</p>
                        <hr>
                        @if($products->quantity > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control quantities text-center">
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>

                            <div class="col-md-10">
                                <br>
                                <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i class="bi bi-bag-heart-fill"></i></button>
                                <button type="button" class="btn btn-primary me-3 float-start">Add to Cart <i class="bi bi-bag-fill"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h2>Description</h2>
                <p>{{$products->description}}</p>
            </div>
        </div>
    </div>
@endsection


/////////////////////////////////////////Not Working///////////////////////////////////////////
@section('scripts')
    <script>
        $(document).ready(function (){
            $('.increment-btn').click(function (e){
                e.preventDefault();
                var incrementValue = $('.quantities').val();
                var value = parseInt(incrementValue, 10);
                value = isNaN(value)? 0 : value;
                if(value<10){
                    value++;
                    $('.quantities').val(value);
                }

            })
            $('.decrement-btn').click(function (e){
                e.preventDefault();
                var decrementValue = $('.quantities').val();
                var value = parseInt(decrementValue, 10);
                value = isNaN(value)? 0 : value;
                if(value>1){
                    value--;
                    $('.quantities').val(value);
                }

            })
        })
    </script>
@endsection
