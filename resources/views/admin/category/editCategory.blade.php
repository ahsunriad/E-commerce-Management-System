@extends('layouts.admin')
@section('title', 'Edit Category')
@section('content')
    <div class="card">
        @if(session('success'))
            <div class="card-header-success">
                <h3>The Category {{session('success')}} has been updated successfully.</h3>
            </div>
        @endif
        <div class="card-header-custom">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('updateCategory/'.$data->id)}}" method="post" enctype="multipart/form-data">
                {{method_field('put')}}
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" value="{{$data->name}}">
                        <span style="color: red">@error('name'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$data->slug}}">
                        <span style="color: red">@error('slug'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" rows="3">{{$data->description}}</textarea>
                        <span style="color: red">@error('description'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" {{$data->status ? 'checked' : 'null'}}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="popular">Popular</label>
                        <input type="checkbox" name="popular" {{$data->popular ? 'checked' : 'null'}}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$data->meta_title}}">
                        <span style="color: red">@error('meta_title'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="meta_keywords">Meta Keywords</label>
                        <textarea type="text" class="form-control" name="meta_keywords" rows="3">{{$data->meta_keywords}}</textarea>
                        <span style="color: red">@error('meta_keywords'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12 mb-12">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control" name="meta_description" rows="3" value="{{$data->meta_description}}">
                        <span style="color: red">@error('meta_description'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12">
                        <label for="image">Category Image</label>
                        @if($data->image)
                            <img src="{{asset('assets/uploads/category/'.$data->image)}}" class="w-25">
                        @endif
                        <input type="file" class="form-control" name="image"  accept="image/*">
                        <span style="color: red">@error('image'){{$message}}@enderror</span>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-facebook" name="submit">Edit Category</button>
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
