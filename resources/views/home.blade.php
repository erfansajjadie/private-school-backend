@extends('layouts.app', ['body_class' => 'home-page'])
@section('title', 'سامانه آموزشی private school')
@section('content')
    <section class="position-1">
        <div class="container">
            <div class="inner">
                <h2 class="title">
                    <div class="up">مرکز آموزش</div>
                    <div class="down">مهارت و مشاغل تخصصی بازاریابی و فروش</div>
                </h2>
                <div class="box-search">
                    <form action="" method="">
                        <input id= "search-text" type="search" class="box" placeholder="جستجو در میان اساتید و دوره ها"/>
                        <i class="fas fa-spinner fa-pulse"></i>
                        <button class="button" type="button">
                            <span class="icon"></span>
                        </button>
                    </form>
                    <div class="suggestion">
                        <div class="arrow">
                            <div class="tip">برای آغاز جستجو حداقل دو حرف تایپ کنید.</div>
                            <div class="result" id="search_suggestion_place"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <span class="image i-1 slideInDown animated"></span>
                <span class="image i-2 slideInDown animated"></span>
                <span class="image i-3 zoomIn animated"></span>
                <div class="pos-4 flipInX animated" id="scene-1">
                    <span class="image i-4" data-depth="0.8"></span>
                </div>
                <div class="pos-5 flipInX animated" id="scene-2">
                    <span class="image i-5" data-depth="0.8"></span>
                </div>
            </div>
        </div>
        <div class="pos-6 slideInLeft animated" id="scene-3">
            <span class="image i-6" data-depth="0.6"></span>
        </div>
    </section>
    <section class="container">
        <div class="position-2">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <div class="number counter">{{$users_count}}</div>
                        <div class="text">دانشجو</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <div class="number counter">{{$courses_count}}</div>
                        <div class="text">دوره‌های آموزشی</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <div class="number counter">{{$teachers_count}}</div>
                        <div class="text">اساتید</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <div class="number counter">{{$posts_count}}</div>
                        <div class="text">پست آموزشی</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   {{-- <section class="position-3 py-75 pb-medium-35 container">
        <div class="owl-carousel owl-3">
            <a href="https://marketingschool.ir/course/detail/114/141" class="thumb banner" style="background-image:url('https://marketingschool.ir/storage//banners/resarch.jpeg_2021-08-11 06:51:11.jpg');">
                <button class="btn">بیشتر بخوانید</button>
            </a>
            <a href="https://marketingschool.ir/course/detail/110/137" class="thumb banner" style="background-image:url('https://marketingschool.ir/storage//banners/دوره_جامع_دیجیتال_مارکتینگ.jpg_2021-09-13 06:23:32.jpg');">
                <button class="btn">بیشتر بخوانید</button>
            </a>
            <a href="https://marketingschool.ir/course/detail/99/143" class="thumb banner" style="background-image:url('https://marketingschool.ir/storage//banners/1800.jpg_2021-09-22 08:34:38.jpg');">
                <button class="btn">بیشتر بخوانید</button>
            </a>
        </div>
    </section>--}}
    <section class="py-75 container">
        <h3 class="title-parts">
            <div class="down">آخرین دوره های آموزشی</div>
        </h3>
        <div class="row isotope hoverdir">
            @foreach($courses as $course)
                <div class="col-lg-3 col-md-4 col-sm-6 element-item coursecat2">
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
        <div class="text-center">
            <a href="{{route('courses-list')}}" class="btn btn-secondary btn-lg">مشاهده همه موارد</a>
        </div>
    </section>
    <section class="position-5 py-75">
        <div class="container">
            <div class="row flex-lg-row-reverse">
                <div class="col-lg-12 mt-5 mt-lg-0">
                    <div >
                        <h3 class="title-parts">
                            <div class="down"><a href="{{route('users-list')}}">آخرین اساتید سایت</a></div>
                        </h3>
                        <div class="container">
                            <div class="row">
                                @foreach($users as $user)
                                    <div class="col-xl-20 col-lg-3 col-md-4 col-sm-6 my-4">
                                        <div class="item-faculty">
                                            <a href="{{route('user-details', $user->id)}}" class="thumb"
                                               style="background-image:url({{asset('storage/'. $user->profile_image)}});"></a>
                                            <div class="inner">
                                                <h5 class="title"><a href="{{route('user-details', $user->id)}}">{{$user->fullname}}</a></h5>
                                                <h6 class="text-sm-center"><a href="{{route('user-details', $user->id)}}">{{$user->user_name ?? ""}}</a></h6>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <section class="position-8">--}}
{{--        <div class="container">--}}
{{--            <h3 class="main-title">دیدگاه دانشجویان ما</h3>--}}
{{--            <i class="fas fa-quote-right"></i>--}}
{{--            <div class="owl-carousel owl-single-dots">--}}
{{--                <div class="item">--}}
{{--                    <div class="text">--}}
{{--                        در سال های اخیر ارتباط با مشتریان و همچین نوع پاسخ گویی به انتظارات و همچنین اعتراضات آن ها جدی تر شده و نیاز به آموزش در این مورد احساس کردیم و با توجه به تحقیقاتی که انجام دادیم دوره روانشناسی ارتباط با مشتریان آموزشگاه بازارسازان را انتخاب کرده و سعی کردیم دانش خودمان رو در این زمینه افزایش دهیم تا بتوانیم در بازار کار در نزد مشتریان اعتبار بیشتری کسب کنیم--}}
{{--                    </div>--}}
{{--                    <div class="name">علیرضا حجازیان (مدیر عامل مجموعه هلدینگ شرکت توسعه گستر)</div>--}}
{{--                </div>--}}
{{--                <div class="item">--}}
{{--                    <div class="text">--}}
{{--                        یکی از دلایل مهم انتخاب آموزشگاه بازارسازان، حضور اساتید کاربلد و با تجربه و فعال در بازار کار و همچین کلاس های کاربردی و مهارتی است که می توانیم بلافاصله پس از آموزش مطالب را در بازار کار استفاده کنیم و بتوانیم مسیر کسب سود خودمان را سریع تر پیش بگیریم--}}
{{--                    </div>--}}
{{--                    <div class="name">جلال شهیدی فرد (مدیر عامل شرکت زندگی سازان)</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="position-10 py-75">
        {{-- <div class="bg-blog"></div> --}}
        <div class="container">
            <div class="title-side">
                <h3 class="title">وبلاگ</h3>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                        <article class="item-blog">
                            <a href="{{route('post-details', $post->id)}}"
                               class="thumb external" target="_blank"
                               style="background-image:url('{{asset('storage/'. $post->images()->first()->image)}}');"></a>
                            <div class="inner">
                                <div class="info">
                                    <a href="{{route('user-details', $post->user->id)}}">{{$post->user->user_name ?? ""}}</a>
                                    <a href="{{route('post-details', $post->id)}}">{{$post->date()}}</a>
                                </div>
                                <h3 class="title">
                                    {{$post->title}}
                                </h3>
                                <div class="text-justify">
                                    {{Str::limit($post->description)}}
                                </div>
                                <div>
                                    <a  class="far fa-heart"></a>
                                    {{$post->likes_count}}

                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="title-parts">
                        <div class="up">به روز باش</div>
                        <div class="down">مطالب کاربران</div>
                    </div>
                    <a href="{{route('posts-list')}}" class="btn btn-default">همه مطالب</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $( document ).ready(function() {
            $("input").keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                }
            });
        });
    </script>
@endpush
