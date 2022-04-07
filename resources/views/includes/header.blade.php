<header class="header">
    <div class="upper">
        <div class="container">
            <div class="inner">
                <a href="/">
                    <h1 class="logo">
                        سامانه private school
                    </h1>
                </a>
                <div class="info">
                    <div class="box">
                        <i class="fas fa-phone-volume"></i>
                        <a href="tel:+989165256072" class="ltr">09165256072</a>
                    </div>
                    <div class="box">
                        <i class="far fa-envelope"></i>
                        <a href="mailto:privateschool.ir@gmail.com">privateschool.ir@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lower">
        <div class="container">
            <div class="inner">
                <div class="hamburger">
                    <div class="box">
                    </div>
                </div>
                <nav class="all-menu">
                    <ul class="main-menu navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('home')}}">صفحه اصلی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('courses-list')}}">دوره های آموزشی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('users-list')}}">اساتید</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('posts-list')}}">مطالب کاربران</a>
                        </li>
                    </ul>

                </nav>
                <nav class="user-menu">
{{--                    <a href="https://marketingschool.ir/user/affiliate" class="btn btn-outline-main d-none d-sm-inline-block ml-3">سیستم کسب درآمد</a>--}}
                    @guest
                        <button class="btn js-login" data-toggle="modal" data-target="#modalLogin">
                            <i class="fas fa-user-graduate"></i>
                            <span> ورود / ثبت نام </span>
                        </button>
                    @endguest
                    @auth
                        <button  class="btn js-panel">
                            <i class="fas fa-user-cog"></i>
                            <span>{{Auth::user()->user_name  ?? "ورود به پنل"}}</span>
                        </button>
                    @endauth
                </nav>
            </div>
        </div>
    </div>
</header>
