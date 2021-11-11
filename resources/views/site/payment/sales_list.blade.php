@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'لیست مطالب کاربران')
@section('content')
    <div class="header-page">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{route('home')}}">خانه</a>
                <span>
                    مطالب کاربران
                </span>
            </nav>

        </div>
    </div>
    <div class="container">
        <div class="row isotope" id="products_section">
            @foreach($posts as $post)
                <div class="col-md-4 col-sm-6 element-item bz-5" style="position: absolute; right: 0px; top: 0px;">
                    <div class="item-video">
                        <div class="thumb"
                             style="background-image:url({{$post->thumbnail()}});">
                            <div class="teachers">
                                <div class="owl-carousel owl-single">
                                    <div class="item">
                                        <a class="picture" href="{{route('user-details', $post->user->id)}}"
                                           style="background-image:url({{asset('storage/' . $post->user->profile_image)}});"></a>
                                        <a class="name" href="{{route('user-details', $post->user->id)}}">{{$post->user->user_name}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-3">
                            <h5 class="title">
                                <a href="{{route('post-details', $post->id)}}">{{$post->title}}</a>
                            </h5>
                            <div class="subtitle">
                                <i class="fas fa-fw fa-user-circle"></i>
                                <a href="{{route('user-details', $post->user->id)}}">{{$post->user->user_name}}</a>
                            </div>
                            <div class="detail">
                                <div>
                                    <i class="fas fa-fw fa-calendar ml-1"></i>
                                    {{$post->date()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
