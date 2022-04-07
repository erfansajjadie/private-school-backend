@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', $user->fullname)
@section('content')
<div class="header-page">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="{{route('home')}}">خانه</a>
            <span>
                {{$user->fullname}}
            </span>
        </nav>

    </div>
</div>
<section>
    <div class="container">
        <div class="post-faculty">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{asset('storage/' . $user->profile_image)}}" alt="{{$user->fullname}}">
                </div>
                <div class="col-md-4">
                    <h2 class="mb-4">{{$user->fullname}}</h2>
                    <h6 class="mb-4">نام کاربری: {{$user->user_name}}</h6>
                    <span>حوزه تدریس:</span>
                    <h5 class="mt-2 mb-4">{{$user->category->name ?? ""}}</h5>
                    <div class="social">
                        <button class="btn btn-lg btn-light btn-social">
                            @if($user->is_private === 0)
                                <i class="fa fa-fw fa-user-alt"></i>
                                صفحه عمومی
                            @else
                                <i class="fa fa-fw fa-lock"></i>
                                صفحه خصوصی
                            @endif
                        </button>
                    </div>
                    @auth
                    @if (Auth::user()->hasPurchasedPrivate($user->id))
                        <span class="badge badge-success mb-4">اشتراک خریداری شده</span>
                    @endif
                    <form action="{{route('follow', $user->id)}}" id="follow">
                         @if (Auth::user()->isFollowing($user))
                            <button type="submit" form="follow" value="Submit" class="btn btn-success" >دنبال کردن</a>
                         @else
                            <button type="submit" form="follow" value="Submit" class="btn btn-danger" >لغو دنبال کردن</a>
                         @endif   
                    </form>   
                    @endauth
                </div>
            </div>
        
        </div>
        <div class="title-side">
            <h3 class="title"> دور های آموزشی اخیر {{$user->fullname}}</h3>
        </div>
        <div class="row">
            @foreach($user->courses as $course)
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
        <div class="title-side">
            <h3 class="title"> پست های اخیر {{$user->fullname}}</h3>
        </div>
        <div class="row">
            @foreach($user->posts as $post)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="item-course">
                        <a href="{{route('post-details', $post->id)}}" class="thumb"
                           style="background-image:url('{{asset('storage/'. $post->images()->first()->image)}}');"></a>
                        <h3 class="title">
                            <a href="{{route('post-details', $post->id)}}">{{$post->title}}</a>
                        </h3>
                        <p class = 'content'>
                            {{\Illuminate\Support\Str::limit($post->description, 100, '...')}}
                        </p>
                        <div class="content">
                            <div><i class="fas fa-fw fa-calendar ml-1"></i>{{$post->date()}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
@push('js')
    <script>

        

        var user = {!! json_encode($user->toArray()) !!};

        var loggedIn = "{{ auth()->check() ? 'true' : 'false' }}";

        var is_purchased = "{{ auth()->check() ? (auth()->user()->hasPurchasedPrivate($user->id) ? 'true' : 'false') : 'false' }}";


        var price = '{{\App\Helpers\Utils::format_price($user->private_price)}}';

        var url = '{{ route("purchase-private", ":id") }}';

        url = url.replace(':id', user.id);

        var text = `خرید اشتراک - ${price} تومان`

        function checkAccess() {
            if((user.is_private == 1 && is_purchased == 'false')) {
                Swal.fire({
                    title: 'عدم دسترسی',
                    text: 'برای استفاده از محتوای این استاد باید اشتراک خریداری کنید',
                    icon: 'info',
                    confirmButtonText: text,
                    showCancelButton: true,
                    cancelButtonText: "خروج",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(function(result) {
                    if (result.isConfirmed && loggedIn == 'true') {
                        window.location.href = url;
                    } else if (result.dismiss == 'cancel') {
                        window.history.go(-1); return false;
                    }else {
                        Swal.fire('برای خرید ابتدا وارد شوید');
                    }
                })
            } 
        }
        window.onload = checkAccess;
    </script>
@endpush