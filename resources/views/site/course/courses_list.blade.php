@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'لیست دوره های آموزشی')
@section('content')
    <div class="header-page">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{route('home')}}">خانه</a>
                <span>
                    دوره‌های آموزشی
                </span>
            </nav>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="item-course">
                            @if($course->discount !== 0)
                                <button class="btn favorite js-login" data-toggle="tooltip" data-placement="top" title="افزودن به نشان شده‌ها">
                                    <span>{{$course->discount_percent()}}%</span>
                                </button>
                            @endif
                            <a href="{{route('course-details', $course->id)}}" class="thumb"
                               style="background-image:url('{{asset('storage/'. $course->image)}}');"></a>
                            <h5 class="title">
                                <a href="{{route('course-details', $course->id)}}">{{$course->name}}</a>
                            </h5>
                            <div class="content">
                                <div><i class="fas fa-fw fa-user ml-1"></i>{{$course->user->user_name}}</div>
                                <div class="mt-2">
                                    <i class="fas fa-fw fa-money-bill ml-1"></i>
                                    <span class="format-number">{{$course->price()}}</span> تومان
                                    @if($course->discount !== 0)
                                        <del class="text-muted text-sm-left  format-number">{{$course->price}}</del>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

