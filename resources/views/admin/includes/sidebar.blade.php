<div class="col-md-3 left_col hidden-print">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Private School</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{asset('images/img.jpg')}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>خوش آمدید،</span>
                <h2>{{auth()->guard('admin')->user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br/>

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <ul class="nav side-menu">
                    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> پیشخوان </a></li>
                    <li><a><i class="fa fa-users"></i> کاربران <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('user.index')}}">لیست کاربران</a></li>
                            <li><a href="{{route('message.index')}}">لیست پیام ها</a></li>
                            <li><a href="{{route('file.index')}}">لیست فایل های ارسالی</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-dollar"></i> مالی و فروش <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{route('payments')}}">لیست فروش های دوره</a></li>
                            <li><a href="{{route('private-payments')}}">لیست فروش های شخصی</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('category.index')}}"><i class="fa fa-cogs"></i> حوزه های کاری </a></li>

                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="تنظیمات">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="تمام صفحه" onclick="toggleFullScreen();">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="قفل" class="lock_btn">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf

                <a data-toggle="tooltip" data-placement="top" title="خروج"  href="{{route('admin.logout')}}"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </form>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
