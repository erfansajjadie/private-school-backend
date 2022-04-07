<div class="panel-profile">
    <button class="btn fas fa-times btn-close"></button>
    <a href="{{route('logout')}}" class="btn btn-outline-danger log-out">
        <i class="fas fa-sign-out-alt"></i>
        <span>خروج</span>
    </a>
    <div class="title">پنل کاربری سامانه دانشجو</div>
    <div class="avatar" style="background-image:url({{asset('storage/'. Auth::user()->profile_image)}});"></div>
    <div class="name">{{Auth::user()->user_name ?? "بدون نام"}}</div>
    <ul class="menu">
        <li><a href="{{route('edit-profile')}}">اطلاعات کاربر</a></li>
        <li><a href="{{route('user-courses')}}">دوره‌های آموزشی من</a></li>
        <li><a href="{{route('user-posts')}}">پست های من</a></li>
        <li><a href="{{route('user-sales')}}">فروش های من</a></li>
        <li><a href="{{route('user-payments')}}">خرید های من</a></li>
    </ul>
</div>
