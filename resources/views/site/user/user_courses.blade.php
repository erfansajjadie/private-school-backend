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
            <div class="description-category">
                دوره های کاربردی و تخصصی بازارسازان در قالب دوره های کوتاه مدت، به آموزش دانش و مهارتهای بازاریابی و فروش می پردازد. طراحی این دوره ها بر اساس اجزاءِ مدل شایستگی مشاغل حوزه صورت گرفته است. هر دوره مشتمل بر 3 الی 5 جلسه آموزشی (4 ساعته) است. هر هفته یکی از جلسات آموزشی، برگزار خواهد شد. مجموع مباحث هر دوره کاربردی توسط یک مدرس ارایه خواهد شد. با توجه به تطابق این برنامه ها با واقعیتها و چالش های بازار ایران، هر یک از این کارگاه ها می تواند نقش موثری در بهبود عملکرد شغلی فراگیران ایفا نماید.
            </div>
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

