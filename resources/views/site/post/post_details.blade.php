@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', $post->title)
@section('content')
    <div class="header-page">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{route('home')}}">خانه</a>
                <a href="{{route('posts-list')}}">مطالب کاربران</a>
                <span>
                    {{$post->title}}
                </span>
            </nav>

        </div>
    </div>
    <section>
        <div class="container">
            <div class="post-course">
                <h1 class="main-title">{{$post->title}}</h1>
                <div class="row">
                    <div class="col-lg-8 my-5">
                        <div class="images">
                            @auth
                                <form action="{{route('like', $post->id)}}" method="get">
                                    <button class="btn favorite" data-toggle="tooltip" data-placement="top"
                                        title="لایک کردن">
                                        @if (Auth::user()->hasLiked($post))
                                            <i class="fa fa-fw fa-heart"></i>
                                        @else
                                            <i class="far fa-heart"></i>
                                        @endif
                                    </button>
                                </form>
                            @endauth
                            <div class="owl-carousel owl-single main">
                                @foreach($post->images as $image)
                                    <div class="item"><img src="{{asset('storage/'. $image->image)}}"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="content">
                            <h3>متن مطلب</h3>
                            <div><p>{{$post->description}}</p></div>
                        </div>
                        {{--<div class="comments">
                            <div class="title"><i class="far fa-comment-dots"></i> دیدگاه</div>
                            <form action="https://marketingschool.ir/course/add/comment/8" method="POST">
                                <input type="hidden" name="_token" value="Fetck5qBFVZqDjYzN8xeABoPrbe96tWGJYx23eeP">
                                <div class="form-group">
                            <textarea name="text" id="" cols="30" rows="4"
                                      class="form-control js-login"></textarea>
                                </div>
                                <div class="text-left">
                                    <button
                                        class=" btn btn-primary disabled"
                                        type="button"
                                        data-sitekey="6LcihpoUAAAAAF3jmXblZp85RW-TVAlOpGapCm1j">ارسال دیدگاه
                                    </button>
                                </div>
                            </form>
                        </div>--}}
                    </div>
                    <div class="col-lg-4 position-static my-5">
                        <div class="scroll-fixed">
                            <div class="social">
                                <button class="btn btn-lg btn-light btn-social" data-toggle="modal"
                                        href="#myModal3">
                                    <i class="fas fa-share-alt"></i>
                                    اشتراک گذاری
                                </button>
                                <div class="modal" id="myModal3">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">اشتراک در شبکه های اجتماعی</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <ul class="socials">
                                                    <li class="social whatsapp">
                                                        <a href="https://marketingschool.ir/course/share/whats_app/8/6"
                                                           target="_blank">
                                                            <span class="circle fab fa-fw fa-whatsapp d-block w-100"></span>
                                                            <span class="text">واتس آپ</span>
                                                        </a>
                                                    </li>
                                                    <li class="social linkedin">
                                                        <a href="https://marketingschool.ir/course/share/linkedin/8/6"
                                                           target="_blank">
                                                            <span class="circle fab fa-fw fa-linkedin-in d-block w-100"></span>
                                                            <span class="text">لینکداین</span>
                                                        </a>
                                                    </li>
                                                    <li class="social telegram">
                                                        <a href="https://marketingschool.ir/course/share/telegram/8/6"
                                                           target="_blank">
                                                            <span class="circle fab fa-fw fa-telegram d-block w-100"></span>
                                                            <span class="text">تلگرام</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion" id="accordionCalendar">
                                <div class="inner">
                                    <div class="btn btn-light btn-block btn-lg btn-title" data-toggle="collapse"
                                         data-target="#collapse-0">
                                        جزئیات مطلب
                                    </div>
                                    <div id="collapse-0" class="collapse"
                                         data-parent="#accordionCalendar">
                                        <div class="detail">
                                            <div class="item">
                                                <i class="fa fa-fw fa-calendar-alt"></i>
                                                <div class="key">تاریخ انتشار</div>
                                                <div class="value">
                                                    <span class="value">{{$post->date()}}</span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <i class="fa fa-fw fa-heart"></i>
                                                <div class="key">تعداد لایک</div>
                                                <div class="value format-number">{{$post->likes_count}}</div>
                                            </div>
                                            <div class="item">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                                <div class="key">نویسنده مطلب</div>
                                                <div class="owl-carousel owl-single teachers">
                                                    <div class="box">
                                                        <a href="{{route('user-details', $post->user->id)}}"
                                                           style="background-image:url({{asset('storage/'. $post->user->profile_image)}});"
                                                           class="thumb"></a>
                                                        <h5>
                                                            <a href="{{route('user-details', $post->user->id)}}">{{$post->user->user_name}}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
