@extends('layouts.admin')
@section('title', 'Add Category')
@section('content')
    <div class="card">
        @if(session('success'))
            <div class="card-header-success">
                <h3>The product {{session('success')}} has been added successfully.</h3>
            </div>
        @endif
        <div class="card-header-custom">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('addCategory')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
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
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" rows="3"></textarea>
                        <span style="color: red">@error('description'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="popular">Popular</label>
                        <input type="checkbox" name="popular">
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
                        <label for="image">Category Image</label>
                        <input type="file" class="form-control" name="image"  accept="image/*">
                        <span style="color: red">@error('image'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-facebook" name="submit">Add Category</button>
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
