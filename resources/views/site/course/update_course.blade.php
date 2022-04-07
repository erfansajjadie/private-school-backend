@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'ویرایش ' . $course->name)
@section('content')
<div class="header-page">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="{{route('home')}}">خانه</a>
            <span>
                ویرایش
            </span>
            <strong>{{$course->name}}</strong>
        </nav>

    </div>
</div>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-side">
                    <h3 class="title">اطلاعات دوره</h3>
                </div>
                <form action="{{route('update-course', $course->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4 form-group">
                            <label for="">نام دوره</label>
                            <input type="text" name="name"  value = "{{$course->name}}" placeholder="" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-4 form-group">
                            <label for="">قیمت (تومان)</label>
                            <input type="number" name="price" value = "{{$course->price}}" placeholder="" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-4 form-group">
                            <label for="">تخفیف</label>
                            <input type="number" name="discount"  value = "{{$course->discount}}" class="form-control">
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="text-success">توضیحات</label>
                                <textarea rows="5" name="description"   class="form-control">{{$course->description}}</textarea>
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <div>آپلود تصویر دوره</div>
                            <label class="btn btn-success ml-2" type="button"> <input class="d-none" type="file" name="image">
                            <i class="fas fa-upload"></i> آپلود تصویر </label>
                            <img src="{{asset('storage/'. $course->image)}}" style="height: 50px; width: 50px; object-fit: contain">
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

                        <div class="col-md-4 col-sm-6 mr-auto">
                            <button class="btn btn-lg btn-block btn-primary">ویرایش</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
