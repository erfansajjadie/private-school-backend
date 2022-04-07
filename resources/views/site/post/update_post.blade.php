@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'ویرایش پست')
@section('content')
<div class="header-page">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="{{route('home')}}">خانه</a>
            <span>
                ویرایش پست
            </span>
            <span>
                {{$post->title}}
            </span>
        </nav>

    </div>
</div>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-side">
                    <h3 class="title">اطلاعات مطلب</h3>
                </div>
                <form action="{{route('update-post', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="">عنوان</label>
                            <input type="text" name="title" value="{{$post->title}}" placeholder="" class="form-control">
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="text-success">محتوای مطلب</label>
                                <textarea rows="5" name="description" class="form-control">{{$post->title}}</textarea>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <div>آپلود تصاویر</div>
                            <label class="btn btn-success ml-2" type="button">
                            <input class="d-none" type="file" name="images[]" multiple>
                            <i class="fas fa-upload"></i> آپلود تصویر </label>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @foreach($post->images as $image)
                            <div class = "image-area">
                                <img src="{{asset('storage/'. $image->image)}}">
                                <a onclick="deleteItem('{{route('delete-post-image', $image->id)}}')" class="remove-image" href="#" style="display: inline;"><i class="fa fa-sm fa-trash"></i></a>
                            </div>
                        @endforeach

                        <div class="col-md-4 col-sm-6 mr-auto">
                            <button class="btn btn-lg btn-block btn-primary">ذخیره</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
