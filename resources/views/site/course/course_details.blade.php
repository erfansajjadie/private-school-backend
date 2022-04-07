@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', $course->name)
@section('content')
    <div class="header-page">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{route('home')}}">خانه</a>
                <a href="{{route('courses-list')}}">دوره‌های آموزشی</a>
                <span>
                    {{$course->name}}
                </span>
            </nav>

        </div>
    </div>
    <section>
        <div class="container">
            <div class="post-course">
                <h1 class="main-title">{{$course->name}}</h1>
                <div class="row">
                    <div class="col-lg-8 my-5">
                        <div class="images">
                           
                            <div class="owl-carousel owl-single main">
                                <div class="item"><img src="{{asset('storage/'. $course->image)}}"></div>
                            </div>
                        </div>
                        <div class="content">
                            <h3>معرفی دوره</h3>
                            <div><p>{{$course->description}}</p></div>
                            <h3>سرفصل های دوره</h3>

                            <ul class="list-group">
                                @foreach($course->topics as $topic)
                                    <li class="list-group-item">
                                        <h4>
                                            <span class="badge badge-primary ml-2">{{$loop->index + 1}}</span>
                                            <strong>{{$topic->title}}</strong>
                                            @auth
                                                @if($course->price() === 0 || Auth::user()->hasPurchasedCourse($course->id))
                                                    <a href="{{asset('storage/' . $topic->file)}}" target="_blank" class="btn btn-primary float-left">دانلود</a>
                                                @else
                                                    <i class="fa fa-fw fa-lock float-left"></i>
                                                @endif
                                            @else
                                                <i class="fa fa-fw fa-lock float-left"></i>
                                            @endauth
                                        </h4>
                                    </li>
                                @endforeach
                            </ul>


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
                                        جزئیات دوره
                                    </div>
                                    <div id="collapse-0" class="collapse"
                                         data-parent="#accordionCalendar">
                                        <div class="detail">
                                            <div class="item">
                                                <i class="fa fa-fw fa-money-bill"></i>
                                                <div class="key">قیمت دوره</div>
                                                <div class="value">
                                                    <span class="format-number">{{$course->price()}}</span> تومان
                                                    @if($course->discount !== 0)
                                                        <del class="text-muted text-sm-left  format-number">{{$course->price}}</del>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="item">
                                                <i class="fas fa-history"></i>
                                                <div class="key">تعداد جلسات</div>
                                                <div class="value">{{$course->topics()->count()}}</div>
                                            </div>
                                            <div class="item">
                                                <i class="fas fa-chalkboard-teacher"></i>
                                                <div class="key">استاد</div>
                                                <div class="owl-carousel owl-single teachers">
                                                    <div class="box">
                                                        <a href="{{route('user-details', $course->user->id)}}"
                                                           style="background-image:url({{asset('storage/'. $course->user->profile_image)}});"
                                                           class="thumb"></a>
                                                        <h5>
                                                            <a href="{{route('user-details', $course->user->id)}}">{{$course->user->user_name}}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="discount">
                                                <div class="bottom-fixed">
                                                    @auth
                                                        @if(Auth::user()->hasPurchasedCourse($course->id))
                                                            <a class="btn btn-lg btn-block btn-success text-white">
                                                                دوره توسط شما خریداری شده است
                                                            </a>
                                                        @elseif($course->price() === 0)
                                                            <a class="btn btn-lg btn-block btn-success text-white">
                                                                این دوره رایگان هست
                                                            </a>
                                                        @else
                                                            <a href="{{route('purchase-course', $course->id)}}" type="button"
                                                               class="btn btn-lg btn-block btn-primary">
                                                                خریده دوره
                                                            </a>
                                                        @endif
                                                    @endauth
                                                    @guest
                                                        <span>جهت خرید لطفا وارد شوید</span>
                                                    @endguest
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
@push('js')
    <script>

        

        var user = {!! json_encode($course->user->toArray()) !!};

    


        var is_purchased = "{{ auth()->check() ? (auth()->user()->hasPurchasedPrivate($course->user->id) ? 'true' : 'false') : 'false' }}";
        

        var isLogged = "{{auth()->check() ? 'true' : 'false'}}"
        var price = '{{\App\Helpers\Utils::format_price($course->user->private_price)}}';

        var url = '{{ route("purchase-private", ":id") }}';

        url = url.replace(':id', user.id);

        var text = `خرید اشتراک - ${price} تومان`

        function checkAccess() {
            if((user.is_private == 1 && is_purchased == 'false')) {
                Swal.fire({
                    title: 'عدم دسترسی',
                    text: 'برای استفاده از محتوای این استاد باید اشتراک خریداری کنید',
                    icon: 'error',
                    confirmButtonText: text,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function(isConfirm) {
                    if (isConfirm && isLogged == 'true') {
                        window.location.href = url;
                    }else {
                        Swal.fire('برای خرید ابتدا وارد شوید');
                    }
                })
            }
        }
        window.onload = checkAccess;
    </script>
@endpush
