@extends('layouts.admin')
@section('title', 'Add Product')
@section('content')
    <div class="card">
        @if(session('added'))
            <div class="card-header-success">
                <h3>The product {{session('added')}} has been added successfully.</h3>
            </div>
        @endif
        <div class="card-header-custom">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('addProduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12  mb-3">
                        <label for="name">Category</label>
                        <select class="form-select form-select-lg mb-3 col-md-12 " aria-label=".form-select-lg example" name="category_id">
                            <option name="category" value="">Select Category</option>
                            @foreach($category as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <span style="color: red">@error('category_id'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name">
                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug">
                        <span style="color: red">@error('slug'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="small_description">Small Description</label>
                        <textarea type="text" class="form-control" name="small_description" rows="3"></textarea>
                        <span style="color: red">@error('small_description'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" rows="3"></textarea>
                        <span style="color: red">@error('description'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="trending">Trending</label>
                        <input type="checkbox" name="trending">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="original_price">Original Price</label>
                        <input type="number" class="form-control" name="original_price">
                        <span style="color: red">@error('original_price'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" class="form-control" name="selling_price">
                        <span style="color: red">@error('selling_price'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                        <span style="color: red">@error('quantity'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tax">Tax</label>
                        <input type="number" class="form-control" name="tax">
                        <span style="color: red">@error('tax'){{$message}}@enderror</span>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title">
                        <span style="color: red">@error('meta_title'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea type="text" class="form-control" name="meta_keywords" rows="3"></textarea>
                        <span style="color: red">@error('meta_keywords'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12 mb-12">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description" rows="3">
                        <span style="color: red">@error('meta_description'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12">
                        <label for="image">Product Image</label>
                        <input type="file" class="form-control" name="image"  accept="image/*">
                        <span style="color: red">@error('image'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-facebook" name="submit">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
{{--    <script>--}}
{{--        function myFunction() {--}}
{{--            //alert("Hello! I am an alert box!");--}}
{{--            @if(session('success'))--}}
{{--                alert('The student {{session('success')}} has been added successfully.');--}}
{{--            @endif--}}
{{--        }--}}
{{--    </script>--}}
@endsection
