@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'لیست اساتید')
@section('content')
    <div class="header-page">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{route('home')}}">خانه</a>
                <span>
                    لیست اساتید
                </span>
            </nav>

        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                @foreach($users as $user)
                    <div class="col-xl-20 col-lg-3 col-md-4 col-sm-6 my-4">
                        <div class="item-faculty">
                            <a href="{{route('user-details', $user->id)}}" class="thumb"
                               style="background-image:url({{asset('storage/'. $user->profile_image)}});"></a>
                            <div class="inner">
                                <h5 class="title"><a href="{{route('user-details', $user->id)}}">{{$user->fullname}}</a></h5>
                                <h6 class="text-sm-center"><a href="{{route('user-details', $user->id)}}">{{$user->user_name}}</a></h6>
                                <div class="content">
                                    <div class="key">حوزه تدریس :</div>
                                    <div class="value">{{$user->category->name ?? "نامشخص"}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
