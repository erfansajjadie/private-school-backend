
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <title>سامانه آموزشی private school</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="مشاغل تخصصی بازاریابی و فروش، با ارایه گواهینامه بین المللی از سازمان آموزش فنی و حرفه‌ای">
    <link rel="apple-touch-icon" sizes="76x76" href="https://marketingschool.ir/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://marketingschool.ir/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://marketingschool.ir/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="https://marketingschool.ir/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="https://marketingschool.ir/images/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="https://marketingschool.ir/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="https://marketingschool.ir/images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/scss/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/owl/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name=theme-color content=#de8a1e>

    <link rel="canonical" href="{{url('')}}"/>
</head>
<body class="home-page">

<div class="scroll-footer">
    @include('includes.header')
    <section class="position-1">
        <div class="container">
            <div class="inner">
                <h2 class="title">
                    <div class="up">مرکز آموزش</div>
                    <div class="down">مهارت و مشاغل تخصصی بازاریابی و فروش</div>
                </h2>
                <div class="box-search">
                    <form action="" method="">
                        <input type="search" class="box" placeholder="جستجو در میان اساتید و دوره ها"/>
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
                        <div class="number counter">12668</div>
                        <div class="text">دانشجو</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <div class="number counter">112</div>
                        <div class="text">دوره‌های آموزشی</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <div class="number counter">68</div>
                        <div class="text">اعضای هیات علمی</div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <div class="number counter">210</div>
                        <div class="text">سازمان‌های همکار</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-3 py-75 pb-medium-35 container">
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
    </section>
    <section class="py-75 container">
        <h3 class="title-parts">
            <div class="down">تقویم آموزشی 1400</div>
        </h3>
        <div class="filters-isotope">
            <div class="inner">
                <button class="btn is-checked" data-filter="*"><span>همه موارد</span></button>
                <button class="btn" data-filter=".coursecat1"><span>دوره‌های کاربردی</span></button>
                <button class="btn" data-filter=".coursecat2"><span>دوره‌های جامع</span></button>
                <button class="btn" data-filter=".coursecat-marketing-shop-dvds"><span>بسته های غیر حضوری</span></button>
            </div>
        </div>
        <div class="row isotope hoverdir">
            <div class="col-lg-3 col-md-4 col-sm-6 element-item                                             coursecat2
                                     ">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/mba.jpg_1610180333.jpg');">
                        <div class="slide">
                            <button class="btn favorite js-login" data-toggle="tooltip" data-placement="top" title="افزودن به نشان شده‌ها">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="https://marketingschool.ir/course/detail/64" class="link">
                                <span><i class="fas fa-fw fa-history ml-1"></i> 200 ساعت</span>
                                <span><i class="fas fa-fw fa-calendar-day ml-1"></i>روز برگزاری: روزهای 5 شنبه یک هفته درمیان 2- جلسه در یک روز</span>
                                <span><i class="far fa-fw fa-calendar-check ml-1"></i>
                                    1 مهر 1400
                                    <span class="px-2">تا</span>
                                    6 مهر 1401
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="title">
                        <a href="https://marketingschool.ir/course/detail/64/72">مدیریت ارشد کسب و کار MBA-کد سوم</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item                                             coursecat1
                                     ">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/photo-1557180295-76eee20ae8aa.jpeg_1619426190.jpg');">
                        <div class="slide">
                            <button class="btn favorite js-login" data-toggle="tooltip" data-placement="top" title="افزودن به نشان شده‌ها">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="https://marketingschool.ir/course/detail/99" class="link">
                                <span><i class="fas fa-fw fa-history ml-1"></i> 12 ساعت</span>
                                <span><i class="fas fa-fw fa-calendar-day ml-1"></i>روز برگزاری: شنبه ها ساعت 15 تا 19</span>
                                <span><i class="far fa-fw fa-calendar-check ml-1"></i>
                                    17 مهر 1400
                                    <span class="px-2">تا</span>
                                    1 آذر 1400
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="title">
                        <a href="https://marketingschool.ir/course/detail/99/143">بازاریابی و فروش تلفنی   (حضوری و آنلاین)</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item                                             coursecat2
                                     ">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/digital-marketing-1.png_1624170753.jpg');">
                        <div class="slide">
                            <button class="btn favorite js-login" data-toggle="tooltip" data-placement="top" title="افزودن به نشان شده‌ها">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="https://marketingschool.ir/course/detail/110" class="link">
                                <span><i class="fas fa-fw fa-history ml-1"></i> 92 ساعت</span>
                                <span><i class="fas fa-fw fa-calendar-day ml-1"></i>روز برگزاری: دو شنبه ها ساعت15 تا 19</span>
                                <span><i class="far fa-fw fa-calendar-check ml-1"></i>
                                    19 مهر 1400
                                    <span class="px-2">تا</span>
                                    16 اسفند 1400
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="title">
                        <a href="https://marketingschool.ir/course/detail/110/137">دوره جامع دیجیتال مارکتینگ   (حضوری و آنلاین)</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item                                             coursecat2
                                     ">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/Rewards-and-Recognition-Ideas.png_1630561332.jpg');">
                        <div class="slide">
                            <button class="btn favorite js-login" data-toggle="tooltip" data-placement="top" title="افزودن به نشان شده‌ها">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="https://marketingschool.ir/course/detail/114" class="link">
                                <span><i class="fas fa-fw fa-history ml-1"></i> 132 ساعت</span>
                                <span><i class="fas fa-fw fa-calendar-day ml-1"></i>روز برگزاری: چهارشنبه ها ساعت 15 تا 19</span>
                                <span><i class="far fa-fw fa-calendar-check ml-1"></i>
                                    22 مهر 1400
                                    <span class="px-2">تا</span>
                                    31 فروردین 1401
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="title">
                        <a href="https://marketingschool.ir/course/detail/114/141">پرورش محقق بازاریابی با رویکرد تحلیل داده و هوش تجاری BI  (حضوری)</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item                                             coursecat1
                                     ">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/coaching.jpg.png_1602066649.jpg');">
                        <div class="slide">
                            <button class="btn favorite js-login" data-toggle="tooltip" data-placement="top" title="افزودن به نشان شده‌ها">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="https://marketingschool.ir/course/detail/95" class="link">
                                <span><i class="fas fa-fw fa-history ml-1"></i> 40 ساعت</span>
                                <span><i class="fas fa-fw fa-calendar-day ml-1"></i>روز برگزاری: جمعه ساعت 8:30 الی 16:30 (2 جلسه در یک روز)</span>
                                <span><i class="far fa-fw fa-calendar-check ml-1"></i>
                                    23 مهر 1400
                                    <span class="px-2">تا</span>
                                    26 آذر 1400
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="title">
                        <a href="https://marketingschool.ir/course/detail/95/142">کوچینگ بازاریابی و فروش   (حضوری)</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item                                             coursecat1
                                     ">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/supervisor-cong-viec.jpg_1632306988.jpg');">
                        <div class="slide">
                            <button class="btn favorite js-login" data-toggle="tooltip" data-placement="top" title="افزودن به نشان شده‌ها">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="https://marketingschool.ir/course/detail/115" class="link">
                                <span><i class="fas fa-fw fa-history ml-1"></i> 16 ساعت</span>
                                <span><i class="fas fa-fw fa-calendar-day ml-1"></i>روز برگزاری: چهارشنبه ها ساعت 15 تا 19</span>
                                <span><i class="far fa-fw fa-calendar-check ml-1"></i>
                                    28 مهر 1400
                                    <span class="px-2">تا</span>
                                    19 آبان 1400
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="title">
                        <a href="https://marketingschool.ir/course/detail/115/144">کارگاه سرپرستان فروش    (حضوری و آنلاین)</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item                                             coursecat2
                                     ">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/Advertising.png_1600699591.jpg');">
                        <div class="slide">
                            <button class="btn favorite js-login" data-toggle="tooltip" data-placement="top" title="افزودن به نشان شده‌ها">
                                <i class="far fa-heart"></i>
                            </button>
                            <a href="https://marketingschool.ir/course/detail/7" class="link">
                                <span><i class="fas fa-fw fa-history ml-1"></i> 200 ساعت</span>
                                <span><i class="fas fa-fw fa-calendar-day ml-1"></i>روز برگزاری: چهارشنبه ساعت 9 تا 14</span>
                                <span><i class="far fa-fw fa-calendar-check ml-1"></i>
                                    23 آذر 1400
                                    <span class="px-2">تا</span>
                                    22 آذر 1401
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="title">
                        <a href="https://marketingschool.ir/course/detail/7/122">6 امین دوره پرورش متخصص بازاریابی   (حضوری)</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item coursecat-marketing-shop-dvds">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingshop.ir/storage/books/n4apzhc0i28Mm24A4tbFatBFeDvqsJrUDCVtqHjD.jpeg');">
                    </div>
                    <div class="title">
                        <a href="https://marketingshop.ir/product/6026">آینده پژوهی در تغییر کسب و کارها</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item coursecat-marketing-shop-dvds">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingshop.ir/storage/books/P8EB9oEXGiHE7HosTrzcxzdaZAsLGVxQFhHDBQZ3.jpeg');">
                    </div>
                    <div class="title">
                        <a href="https://marketingshop.ir/product/6027">تکنیکهای فروش در بازاریابی صنعتی (B2B )</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item coursecat-marketing-shop-dvds">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingshop.ir/storage/books/UIDG7MdprEjoY2OuGfALikmjRaqAYUiKBC6y8mEl.jpeg');">
                    </div>
                    <div class="title">
                        <a href="https://marketingshop.ir/product/6028">تکنیکهای فروش در بازاریابی دولتی (B2G)	</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 element-item coursecat-marketing-shop-dvds">
                <div class="inner">
                    <div class="thumb" style="background-image:url('https://marketingshop.ir/storage/books/tDgXHUPqo8Gbcrq1MigScIB3k45OnSIVxRnXDeSo.jpeg');">
                    </div>
                    <div class="title">
                        <a href="https://marketingshop.ir/product/6029">تکنیکهای بازاریابی خدمات بانکی و مالی	</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="#" class="btn btn-secondary btn-lg">مشاهده همه موارد</a>
        </div>
    </section>
    <section class="position-5 py-75">
        <div class="container">
            <div class="row flex-lg-row-reverse">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-fade">
                        <img src="/images/slide/1.jpg" alt="کافه بازارسازان" title="کافه بازارسازان">
                        <img src="/images/slide/2.jpg" alt="آموزشگاه بازارسازان" title="آموزشگاه بازارسازان">
                        <img src="/images/slide/3.jpg" alt="سالن همایش بازارسازان" title="سالن همایش بازارسازان">
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="faculty">
                        <h3 class="title-parts">
                            <div class="down"><a href="https://marketingschool.ir/academic-staff/list">اعضای هیأت علمی</a></div>
                        </h3>
                        <div class="owl-carousel owl-single">
                            <div class="item">
                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/1" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/wjJsF4nlM81Yisw6RAdPaK1UwrfRqJOTnsYHXUOdwjJsF4nlM81Yisw6RAdPaK1UwrfRqJOTnsYHXUOd.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/1">پرویز درگی</a></h4>
                                </div>


                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/3" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/bT4rw74wKN8dyKdizpkAhh3AnY2EfyCHTa9rdp08bT4rw74wKN8dyKdizpkAhh3AnY2EfyCHTa9rdp08.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/3">محمود امانی</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/4" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/yFkHyPh73G5q0Jyv34NYhIwwk8HnEfKGEsFYJZpzyFkHyPh73G5q0Jyv34NYhIwwk8HnEfKGEsFYJZpz.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/4">بهزاد ابوالعلایی</a></h4>
                                </div>


                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/5" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/smyTyaqnT3AubdgnX5vXGjlFw05hrB0FcRz0XqvssmyTyaqnT3AubdgnX5vXGjlFw05hrB0FcRz0Xqvs.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/5">دکتر محمدعلی حقیقی</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/6" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/hwXjQzlx2UwDXnuEDlOpwsFTpIN0o4rogMOtizeuhwXjQzlx2UwDXnuEDlOpwsFTpIN0o4rogMOtizeu.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/6">دکتر مسعود نصرت آبادی</a></h4>
                                </div>


                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/7" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/Kk53NR3ceWgtWOd0Ro97PF3aahwglGy02PxW3YNRKk53NR3ceWgtWOd0Ro97PF3aahwglGy02PxW3YNR.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/7">بهرام رزمان</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/8" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/p2c3lTtdq6uXG5bC9YG8V0JE6R8oK1884UXwI0AGp2c3lTtdq6uXG5bC9YG8V0JE6R8oK1884UXwI0AG.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/8">دکتر حمید سعیدی</a></h4>
                                </div>


                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/9" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/EBH3dUtaAfsWKdDAq0q2Px581VTTa3ZImXX3rZyzEBH3dUtaAfsWKdDAq0q2Px581VTTa3ZImXX3rZyz.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/9">استاد مهدی فربهی</a></h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/10" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/BX4JLgE0M8AiO3QSH0op0iUNltg2c9BT92uPx9NoBX4JLgE0M8AiO3QSH0op0iUNltg2c9BT92uPx9No.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/10">علي محمد بيدار مغز</a></h4>
                                </div>


                                <div class="box">
                                    <a href="https://marketingschool.ir/academic-staff/detail/11" class="thumb" style="background-image:url('https://marketingschool.ir/storage//teachers_picture/qUiE8Nh8HarCmEeEIW09zTVjXA89VN9eCEIb4KkrqUiE8Nh8HarCmEeEIW09zTVjXA89VN9eCEIb4Kkr.jpg');"></a>
                                    <h4 class="title"><a href="https://marketingschool.ir/academic-staff/detail/11">دکتر بابک سبزیان پور</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="py-75 container">
        <div class="owl-carousel owl-4">
            <a target="_blank" href="/bazaryad"
               class="thumb" style="background-image:url(/images/banner/1.jpg);"></a>
            <a href="/course/list/2"
               class="thumb" style="background-image:url(/images/banner/2.jpg);"></a>
            <a href="/course/list/1"
               class="thumb" style="background-image:url(/images/banner/3.jpg);"></a>
            <a href="/calender-course/request-course"
               class="thumb" style="background-image:url(/images/banner/4.jpg);"></a>
        </div>
    </div>
    <section class="position-7 py-75">
        <div class="container">
            <h3 class="title-parts">
                <div class="down">تازه های آموزشگاه بازارسازان</div>
            </h3>
            <div class="timeline">
                <div class="item">
                    <div class="date">01 مهر 1400</div>
                    <div class="box">
                        <div
                            class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/mba.jpg_1610180333.jpg');">
                        </div>
                        <div class="inner">
                            <h4>

                                <i class="far fa-newspaper"></i>
                                شروع دوره مدیریت ارشد کسب و کار MBA-کد سوم

                            </h4>
                            <div class="text">
                                دوره مدیریت ارشد کسب و کار MBA-کد سوم با تدریس اساتید پرویز درگی ,بهزاد ابوالعلایی ,بهرام رزمان ,دکتر مرتضی عمادزاده ,دکتر رضا اکبری اصل ,دکتر سارا میرزایی ,دکتر شهرزاد چیت ساز ,دکتر فرشید عزیزخانی ,دکتر مژده قنبري ,دکتر آذر صائميان امروز شروع میشود.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="date">27 شهریور 1400</div>
                    <div class="box">
                        <div
                            class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/363.jpeg_1628744232.jpg');">
                        </div>
                        <div class="inner">
                            <h4>

                                <i class="far fa-newspaper"></i>
                                شروع دوره سخنرانی و فن بیان و سخنوری   (حضوری و آنلاین)

                            </h4>
                            <div class="text">
                                دوره سخنرانی و فن بیان و سخنوری   (حضوری و آنلاین) با تدریس استاد فرزانه قهرمانی امروز شروع میشود.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="date">20 شهریور 1400</div>
                    <div class="box">
                        <div
                            class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/Seasons.jpg_1623666526.jpg');">
                        </div>
                        <div class="inner">
                            <h4>

                                <i class="far fa-newspaper"></i>
                                شروع دوره 12 فصل زندگی    (حضوری و آنلاین)

                            </h4>
                            <div class="text">
                                دوره 12 فصل زندگی    (حضوری و آنلاین) با تدریس استاد دکتر سارا میرزایی امروز شروع میشود.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="date">07 شهریور 1400</div>
                    <div class="box">
                        <div
                            class="thumb" style="background-image:url('https://marketingschool.ir/storage//courses/PERSONALITY-TRAITS-AND-THE-PLACEBO-RESPONSE.jpg_1628746537.jpg');">
                        </div>
                        <div class="inner">
                            <h4>

                                <i class="far fa-newspaper"></i>
                                شروع دوره کارگاه تدوین برنامه اجرایی فروش و نظارت بر اجرا و کنترل عملیات فروش براساس تیپ شناسی شخصیتی

                            </h4>
                            <div class="text">
                                دوره کارگاه تدوین برنامه اجرایی فروش و نظارت بر اجرا و کنترل عملیات فروش براساس تیپ شناسی شخصیتی با تدریس استاد دکتر رضا اکبری اصل امروز شروع میشود.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-8">
        <div class="container">
            <h3 class="main-title">دیدگاه دانشجویان ما</h3>
            <i class="fas fa-quote-right"></i>
            <div class="owl-carousel owl-single-dots">
                <div class="item">
                    <div class="text">
                        در سال های اخیر ارتباط با مشتریان و همچین نوع پاسخ گویی به انتظارات و همچنین اعتراضات آن ها جدی تر شده و نیاز به آموزش در این مورد احساس کردیم و با توجه به تحقیقاتی که انجام دادیم دوره روانشناسی ارتباط با مشتریان آموزشگاه بازارسازان را انتخاب کرده و سعی کردیم دانش خودمان رو در این زمینه افزایش دهیم تا بتوانیم در بازار کار در نزد مشتریان اعتبار بیشتری کسب کنیم
                    </div>
                    <div class="name">علیرضا حجازیان (مدیر عامل مجموعه هلدینگ شرکت توسعه گستر)</div>
                </div>
                <div class="item">
                    <div class="text">
                        یکی از دلایل مهم انتخاب آموزشگاه بازارسازان، حضور اساتید کاربلد و با تجربه و فعال در بازار کار و همچین کلاس های کاربردی و مهارتی است که می توانیم بلافاصله پس از آموزش مطالب را در بازار کار استفاده کنیم و بتوانیم مسیر کسب سود خودمان را سریع تر پیش بگیریم
                    </div>
                    <div class="name">جلال شهیدی فرد (مدیر عامل شرکت زندگی سازان)</div>
                </div>
            </div>
        </div>
    </section>
    <section class="position-9 py-75 container">
        <div class="title-side">
            <h3 class="title">فروشگاه آنلاین</h3>
            <a href="http://marketingshop.ir/" class="btn btn-lg btn-main" target="_blank">مشاهده همه محصولات</a>
        </div>
        <div class="owl-carousel owl-5">
            <div class="product-item">
                <a href="https://marketingshop.ir/product/7607" class="thumb external" style="background-image:url('https://marketingshop.ir/storage/books/WIkICWQ7FbCsdTd3uRV0Eq1jccP86UrjToCqB8Lx.jpeg');" target="_blank"></a>
                <h5 class="title"><a href="https://marketingshop.ir/product/7607">چگونه فورا به اعتماد باور نفوذ و رابطه ی دوستانه برسید</a></h5>
                <a href="https://marketingshop.ir/product/10000" class="fas fa-shopping-cart"></a>
                <div class="sub"><a href="https://marketingshop.ir/product/7607"></a></div>
                <div class="prApp\Mail\JobVacanyRecommendationEmailice">
                    <span class="format-number">20000</span>
                    <span class="small">تومان</span>
                </div>
            </div>
            <div class="product-item">
                <a href="https://marketingshop.ir/product/7606" class="thumb external" style="background-image:url('https://marketingshop.ir/storage/books/LFOkY4HgyE5uIltfWRmSzJjcw42tucHaFgZZfmKO.jpeg');" target="_blank"></a>
                <h5 class="title"><a href="https://marketingshop.ir/product/7606">همه ی بازاریاب ها دروغگو هستند</a></h5>
                <a href="https://marketingshop.ir/product/10000" class="fas fa-shopping-cart"></a>
                <div class="sub"><a href="https://marketingshop.ir/product/7606"></a></div>
                <div class="prApp\Mail\JobVacanyRecommendationEmailice">
                    <span class="format-number">48000</span>
                    <span class="small">تومان</span>
                </div>
            </div>
            <div class="product-item">
                <a href="https://marketingshop.ir/product/7605" class="thumb external" style="background-image:url('https://marketingshop.ir/storage/books/fXbsPexQf3mK4iYFraadaygOPrZIRhsDha8nDJdV.jpeg');" target="_blank"></a>
                <h5 class="title"><a href="https://marketingshop.ir/product/7605">10مقاله ای که باید از هاروارد بخوانید- ارتباطات</a></h5>
                <a href="https://marketingshop.ir/product/10000" class="fas fa-shopping-cart"></a>
                <div class="sub"><a href="https://marketingshop.ir/product/7605"></a></div>
                <div class="prApp\Mail\JobVacanyRecommendationEmailice">
                    <span class="format-number">60000</span>
                    <span class="small">تومان</span>
                </div>
            </div>
            <div class="product-item">
                <a href="https://marketingshop.ir/product/7604" class="thumb external" style="background-image:url('https://marketingshop.ir/storage/books/oMFwT46a5r8fzPDTRtkJhy3EJSWdMeSEW3O8aj3A.jpeg');" target="_blank"></a>
                <h5 class="title"><a href="https://marketingshop.ir/product/7604">نسخه سوم بازاریابی - نشر آموخته</a></h5>
                <a href="https://marketingshop.ir/product/10000" class="fas fa-shopping-cart"></a>
                <div class="sub"><a href="https://marketingshop.ir/product/7604"></a></div>
                <div class="prApp\Mail\JobVacanyRecommendationEmailice">
                    <span class="format-number">30000</span>
                    <span class="small">تومان</span>
                </div>
            </div>
            <div class="product-item">
                <a href="https://marketingshop.ir/product/7603" class="thumb external" style="background-image:url('https://marketingshop.ir/storage/books/0OqxZcdmBva7trfMEhmW3k4LSy7HVhaTjyuAwxkq.jpeg');" target="_blank"></a>
                <h5 class="title"><a href="https://marketingshop.ir/product/7603">موفقیت ها و اشتباه های بازاریابی</a></h5>
                <a href="https://marketingshop.ir/product/10000" class="fas fa-shopping-cart"></a>
                <div class="sub"><a href="https://marketingshop.ir/product/7603"></a></div>
                <div class="prApp\Mail\JobVacanyRecommendationEmailice">
                    <span class="format-number">100000</span>
                    <span class="small">تومان</span>
                </div>
            </div>
        </div>
    </section>
    <section class="position-10 py-75">
        <div class="bg-blog"></div>
        <div class="container">
            <div class="title-side">
                <h3 class="title">وبلاگ</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <article class="item-blog">
                        <a href="https://dargi.ir/blog/show/2583/%D9%BE%DB%8C%D8%A7%D9%85+%D9%85%D8%B9%D9%84%D9%85+%D8%A8%D8%A7%D8%B2%D8%A7%D8%B1%DB%8C%D8%A7%D8%A8%DB%8C+%D8%A8%D9%87+%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%AA+%D8%A7%D9%81%D8%AA%D8%AA%D8%A7%D8%AD+%DA%A9%D8%A7%D9%81%D9%87+%DA%A9%D8%AA%D8%A7%D8%A8+%DA%A9%D8%A7%D8%B1%D9%88%DA%A9%D8%B3%D8%A8"
                           class="thumb external" target="_blank"
                           style="background-image:url('https://dargi.ir/storage/blog/image/lnkQAOm7l4QuuUxoQpu96gw2XvTZVYrrv60IgCNP.png');"></a>
                        <div class="inner">
                            <div class="info">
                                <a href="https://bazarshenasan.com">بازارشناسان</a>
                                <a href="https://dargi.ir/blog/show/2583/%D9%BE%DB%8C%D8%A7%D9%85+%D9%85%D8%B9%D9%84%D9%85+%D8%A8%D8%A7%D8%B2%D8%A7%D8%B1%DB%8C%D8%A7%D8%A8%DB%8C+%D8%A8%D9%87+%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%AA+%D8%A7%D9%81%D8%AA%D8%AA%D8%A7%D8%AD+%DA%A9%D8%A7%D9%81%D9%87+%DA%A9%D8%AA%D8%A7%D8%A8+%DA%A9%D8%A7%D8%B1%D9%88%DA%A9%D8%B3%D8%A8">07 مهر 1400</a>
                            </div>
                            <h3 class="title">
                                <a href="https://dargi.ir/blog/show/2583/%D9%BE%DB%8C%D8%A7%D9%85+%D9%85%D8%B9%D9%84%D9%85+%D8%A8%D8%A7%D8%B2%D8%A7%D8%B1%DB%8C%D8%A7%D8%A8%DB%8C+%D8%A8%D9%87+%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%AA+%D8%A7%D9%81%D8%AA%D8%AA%D8%A7%D8%AD+%DA%A9%D8%A7%D9%81%D9%87+%DA%A9%D8%AA%D8%A7%D8%A8+%DA%A9%D8%A7%D8%B1%D9%88%DA%A9%D8%B3%D8%A8" target="_blank">پیام معلم بازاریابی به مناسبت افتتاح کافه کتاب کاروکسب</a>
                            </h3>
                            <div class="text-justify">
                                TMBA در سال 1383 آغاز بکار کرد، از یک دفتر کوچک در خیابان زمرد، پشت حسینیه ارشاد."آموزش بازاریابی" ا...
                            </div>
                            <a href="https://dargi.ir/blog/show/2583/%D9%BE%DB%8C%D8%A7%D9%85+%D9%85%D8%B9%D9%84%D9%85+%D8%A8%D8%A7%D8%B2%D8%A7%D8%B1%DB%8C%D8%A7%D8%A8%DB%8C+%D8%A8%D9%87+%D9%85%D9%86%D8%A7%D8%B3%D8%A8%D8%AA+%D8%A7%D9%81%D8%AA%D8%AA%D8%A7%D8%AD+%DA%A9%D8%A7%D9%81%D9%87+%DA%A9%D8%AA%D8%A7%D8%A8+%DA%A9%D8%A7%D8%B1%D9%88%DA%A9%D8%B3%D8%A8" class="far fa-comment"></a>
                            <div class="lower">
                                <a href="https://dargi.ir/blog/list?category=1" target="_blank">عمومی</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-sm-6 mb-5 mb-lg-0">
                    <article class="item-blog">
                        <a href="https://dargi.ir/blog/show/2582/%D9%82%D8%AF%D8%B1%D8%AA+%D8%A8%D8%A7%D9%88%D8%B1%D9%87%D8%A7+%D8%AF%D8%B1+%DA%A9%D8%A7%D8%B1%D9%88%DA%A9%D8%B3%D8%A8"
                           class="thumb external" target="_blank"
                           style="background-image:url('https://dargi.ir/storage/blog/image/29TnGhoDTmUOodbRSn6D5xXMJTCeAlDt8auOcANz.jpeg');"></a>
                        <div class="inner">
                            <div class="info">
                                <a href="https://bazarshenasan.com">بازارشناسان</a>
                                <a href="https://dargi.ir/blog/show/2582/%D9%82%D8%AF%D8%B1%D8%AA+%D8%A8%D8%A7%D9%88%D8%B1%D9%87%D8%A7+%D8%AF%D8%B1+%DA%A9%D8%A7%D8%B1%D9%88%DA%A9%D8%B3%D8%A8">02 تیر 1400</a>
                            </div>
                            <h3 class="title">
                                <a href="https://dargi.ir/blog/show/2582/%D9%82%D8%AF%D8%B1%D8%AA+%D8%A8%D8%A7%D9%88%D8%B1%D9%87%D8%A7+%D8%AF%D8%B1+%DA%A9%D8%A7%D8%B1%D9%88%DA%A9%D8%B3%D8%A8" target="_blank">قدرت باورها در کاروکسب</a>
                            </h3>
                            <div class="text-justify">
                                شاید به این مسئله آگاه نباشیم، اما باورها نیرویی نامرئی است که در پس تصمیمات ما قرار دارد و مسیر زند...
                            </div>
                            <a href="https://dargi.ir/blog/show/2582/%D9%82%D8%AF%D8%B1%D8%AA+%D8%A8%D8%A7%D9%88%D8%B1%D9%87%D8%A7+%D8%AF%D8%B1+%DA%A9%D8%A7%D8%B1%D9%88%DA%A9%D8%B3%D8%A8" class="far fa-comment"></a>
                            <div class="lower">
                                <a href="https://dargi.ir/blog/list?category=1" target="_blank">عمومی</a>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="title-parts">
                        <div class="up">به روز باش</div>
                        <div class="down">خبرنامه بازارسازان</div>
                    </div>
                    <form action="">
                        <div class="input-group">
                            <input type="email" class="form-control form-control-lg" placeholder="آدرس پست الکترونیک">
                            <div class="input-group-append">
                                <button class=" btn btn-lg btn-main input-group-text"
                                        data-sitekey="6LecqpYUAAAAAAL6kdCKGjrRN_xWhHI2ngnJbS1J">اشتراک</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <nav class="position-11 container">
        <h3 class="main-title">سایر خدمات ما</h3>
        <div class="row justify-content-center">
            <div class="col-xl-20 col-lg-3 col-sm-4 col-6">
                <div class="ic-1">
                    <a href="http://marketing-research.ir/" target="_blank" class="icon">
                        <span>تحقیقات بازاریابی</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-20 col-lg-3 col-sm-4 col-6">
                <div class="ic-2">
                    <a href="http://bazarshenasan.com/" target="_blank" class="icon">
                        <span>استخدام</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-20 col-lg-3 col-sm-4 col-6">
                <div class="ic-3">
                    <a href="http://www./bazaryad/" target="_blank" class="icon">
                        <span>آموزش آنلاین</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-20 col-lg-3 col-sm-4 col-6">
                <div class="ic-4">
                    <a href="http://marketingshop.ir/" target="_blank" class="icon">
                        <span>فروشگاه آنلاین کتاب</span>
                    </a>
                </div>
            </div>
            <div class="col-xl-20 col-lg-3 col-sm-4 col-6">
                <div class="ic-5">
                    <a href="http://marketingconsulting.ir/" target="_blank" class="icon">
                        <span>مشاوره کار و کسب</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
@include('includes.footer')
<div class="modal fade modal-user" id="modalLogin">
    <div class="modal-dialog max-width-400">
        <div class="modal-content">
            <div class="login">
                <div class="modal-header">
                    <div class="modal-title">ورود به سامانه دانشجویی بازارسازان</div>
                    <button type="button" class="close fa fa-times-circle" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="login-form" method="POST" action="https://marketingschool.ir/user/auth/login" autocomplete="off">
                        <input type="hidden" name="_token" value="YleuQwqCYHVmnXvy8UGpL791IAPWOySgsk0bBNyd">
                        <div class="form-group">
                            <label for="melli_code">کد ملی:</label>
                            <div class="input-fa">
                                <i class="fa fa-user"></i>
                                <input id="melli_code" name="melli_code" autocomplete="off"
                                       class="form-control " type="text" placeholder="کد ملی خود را وارد کنید" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="title-lost">
                                <label for="login_lost_btn">رمز عبور:</label>
                                <button id="login_lost_btn" type="button" class="btn btn-link js-lost">رمز عبور را فراموش کرده ام</button>
                            </div>
                            <div class="input-fa">
                                <i class="fa fa-lock"></i>
                                <input id="password" name="password" class="form-control " type="password" placeholder="رمز عبور خود را وارد نمایید"  autocomplete="off">
                            </div>
                        </div>
                        <div>
                            <button class=" btn btn-lg btn-block btn-primary" type="submit"
                                    data-sitekey="6LcihpoUAAAAAF3jmXblZp85RW-TVAlOpGapCm1j">ورود</button>
                        </div>
                        <div class="form-check">
                            <label>
                                <input type="checkbox" name="remember"> <span class="label-text" > مرا بخاطر بسپار</span>
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <span>کاربر جدید هستید؟</span>
                    <button class="btn btn-link js-register">ثبت نام در سامانه دانشجویی بازارسازان</button>
                </div>
            </div>
            <div class="register">
                <div class="modal-header">
                    <div class="modal-title">ثبت نام در سامانه دانشجویی بازارسازان</div>
                    <button type="button" class="close fa fa-times-circle" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="register-form" action="https://marketingschool.ir/user/auth/register" method="POST">
                        <input type="hidden" name="_token" value="YleuQwqCYHVmnXvy8UGpL791IAPWOySgsk0bBNyd">
                        <div class="form-group">
                            <label for="name_reg">نام و نام خانوادگی:</label>
                            <div class="input-fa">
                                <i class="fa fa-user"></i>
                                <input name="name" class="form-control " type="text" placeholder="نام و نام خانوادگی خود را وارد کنید" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_reg">آدرس پست الکترونیکی:</label>
                            <div class="input-fa">
                                <i class="fa fa-envelope"></i>
                                <input id="email_reg" name="email" required
                                       class="form-control " type="email" placeholder="ایمیل خود را وارد کنید" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email_reg">کد ملی:</label>
                            <div class="input-fa">
                                <i class="fa fa-id-card"></i>
                                <input id="" name="melli_code" required
                                       class="form-control " type="number" placeholder="کد ملی خود را وارد کنید" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mobile_reg">شماره همراه تماس:</label>
                            <div class="input-fa">
                                <i class="fa fa-mobile-alt"></i>
                                <input id="mobile_reg" name="phone" required
                                       class="form-control " type="text"
                                       placeholder="شماره تماس خود را وارد کنید" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_reg">رمز عبور:</label>
                            <div class="input-fa">
                                <i class="fa fa-lock"></i>
                                <input id="password_reg" name="password" required class="form-control " type="password" placeholder="رمز عبور خود را وارد نمایید" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password_reg_confirmation">تکرار رمز عبور:</label>
                            <div class="input-fa">
                                <i class="fa fa-lock"></i>
                                <input id="password_reg_confirmation" required name="password_confirmation" class="form-control" type="password" placeholder="رمز عبور خود را دوباره وارد نمایید" >
                            </div>
                        </div>
                        <div>
                            <button class=" btn btn-lg btn-block btn-primary" type="submit"
                                    data-sitekey="6LcihpoUAAAAAF3jmXblZp85RW-TVAlOpGapCm1j">ثبت نام</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <span>قبلا در سامانه دانشجویی بازارسازان ثبت‌نام کرده‌اید؟</span>
                    <button class="btn btn-link js-login">وارد شوید</button>
                </div>
            </div>
            <div class="lost">
                <div class="modal-header">
                    <div class="modal-title">یادآوری کلمه عبور</div>
                    <button type="button" class="close fa fa-times-circle" data-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="lost-form" action="" action-type="" method="POST">
                        <input type="hidden" name="_token" value="YleuQwqCYHVmnXvy8UGpL791IAPWOySgsk0bBNyd">
                        <div class="form-group">
                            <label for="lost_email">آدرس پست الکترونیک:</label>
                            <div class="input-fa">
                                <i class="fa fa-envelope"></i>
                                <input id="lost_email" name="email" class="form-control" type="text"
                                       placeholder="آدرس پست الکترونیک خود را وارد نمایید." >
                            </div>
                        </div>
                        <div class="or"><span>یا</span></div>
                        <div class="form-group">
                            <label for="lost_mobile">شماره همراه تماس:</label>
                            <div class="input-fa">
                                <i class="fa fa-mobile-alt"></i>
                                <input id="lost_mobile" name="phone" class="form-control" type="text"
                                       placeholder="شماره تماس خود را وارد کنید">
                            </div>
                        </div>
                        <div>
                            <button class=" btn btn-lg btn-block btn-primary js-reset-pass" type="button"
                                    data-sitekey="6LcihpoUAAAAAF3jmXblZp85RW-TVAlOpGapCm1j"
                                    data-token="YleuQwqCYHVmnXvy8UGpL791IAPWOySgsk0bBNyd">
                                <span>درخواست رمز عبور</span>
                                <i class="icon-loading"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <span>قبلا در سامانه دانشجویی بازارسازان ثبت‌نام کرده‌اید؟</span>
                    <button class="btn btn-link js-login">وارد شوید</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-user" id="modalActivation">
    <div class="modal-dialog max-width-400">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">کد فعال‌سازی</div>
                <button type="button" class="close fa fa-times-circle" data-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="mobile-recovery-form" action="" method="POST">
                    <div class="form-group">
                        <div class="input-fa">
                            <i class="fa fa-envelope"></i>
                            <input id="activation_code" name="activation" value="" class="form-control" type="text"
                                   placeholder="کد فعال‌سازی خود را وارد نمایید." >
                        </div>
                    </div>
                    <div>
                        <button class=" btn btn-lg btn-block btn-primary js-confirm-activation-code" type="button"
                                data-sitekey="6LcihpoUAAAAAF3jmXblZp85RW-TVAlOpGapCm1j"
                                data-token="YleuQwqCYHVmnXvy8UGpL791IAPWOySgsk0bBNyd">
                            <span>ارسال</span>
                            <i class="icon-loading"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <span>اگر کد فعال‌سازی ارسال نشد، دوباره</span>
                <button class="btn btn-link js-lost">درخواست بدهید.</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('plugins/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/jquery-scrolltofixed-min.js')}}"></script>
<script src="{{asset('plugins/sweetalert.min.js')}}"></script>
<script src="{{asset('plugins/jquery.disableAutoFill.min.js')}}"></script>
<script src="{{asset('plugins/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('plugins/jquery.counterup.min.js')}}"></script>
<script src="{{asset('plugins/parallax.min.js')}}"></script>
<script src="{{asset('plugins/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('plugins/jquery.hoverdir.js')}}"></script>
<script src="{{asset('plugins/owl/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
<script src="{{asset('js/general.js')}}"></script>
<script src="{{asset('plugins/fontawesome/css/all.min.js')}}"></script>
</body>
</html>
