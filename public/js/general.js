function number_3_3 (num, sep){
    let number = typeof num === "number"? num.toString() : num,
        separator = typeof sep === "undefined"? ',' : sep;
    return number.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1"+separator);
}

jQuery(function($){

    if($('#login-form').length){
        $('#login-form').disableAutoFill({
            passwordField: '#password',
        });
    }

    $('.header .hamburger').click(function () {
        $(this).toggleClass('active');
        $('.header .all-menu').slideToggle();
    });
    if ($("#price_range").length) {
        function rangeData(data) {
            $('.data-min').text(data.from);
            $('.data-max').text(data.to);
        }

        const minSlider = 1000;
        const maxSlider = 200000;

        $("#price_range").ionRangeSlider({
            type: "double",
            min: minSlider,
            max: maxSlider,
            prettify_enabled: false,
            hide_min_max: true,
            hide_from_to: true,
            onStart: function (data) {
                rangeData(data)
            },
            onFinish: function (data) {
                rangeData(data)
            },
            onChange: function (data) {
                rangeData(data)
            },
            onUpdate: function (data) {
                rangeData(data)
            },
        });
    }

    $('.btn-social').click(function () {
        $(this).toggleClass('active');
    });

    if ($(".isotope").length){
        // init Isotope
        let $grid = $('.isotope').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows',
            originLeft: false,
            getSortData: {
                number: '[data-sort] parseInt'
            },
            sortBy: [ 'number' ]
        });
        // bind filter button click
        $('.filters-isotope').on( 'click', 'button', function() {
            let filterValue = $( this ).attr('data-filter');
            $grid.isotope({ filter: filterValue });
            $('.filters-isotope button').removeClass('is-checked');
            $(this).addClass('is-checked');
        });
        $('.filters-isotope-2').on( 'click', 'button', function() {
            let filterValue = $( this ).attr('data-filter');
            $grid.isotope({ filter: filterValue });
            $('.filters-isotope-2 button').removeClass('btn-main').addClass('btn-outline-main');
            $(this).removeClass('btn-outline-main').addClass('btn-main');
        });
        $(' .isotope.hoverdir .element-item .inner').each( function() { $(this).hoverdir(); } );
    }

    $('.header .lower').scrollToFixed();

    $('.scroll-fixed').each(function () {
        $(this).scrollToFixed({
            marginTop: 100,
            zIndex: 2,
            limit: function() {
                return $('.post-course').offset().top + $('.post-course').outerHeight(true) - $(this).outerHeight(true) - 10;
            },
        });
        $('.bottom-fixed').scrollToFixed( {
            bottom: 0,
            limit: $('.post-course').offset().top + $('.post-course').outerHeight(true) - 60
        });
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.js-login').click(function () {
        $('#modalLogin').modal('show');
        $('#modalLogin .modal-content > div').removeClass('active');
        $('#modalLogin .modal-content .login').addClass('active');
    });

    $('.js-register').click(function () {
        $('#modalLogin').modal('show');
        $('#modalLogin .modal-content > div').removeClass('active');
        $('#modalLogin .modal-content .register').addClass('active');
    });

    $('.js-lost').click(function () {
        $('#modalLogin').modal('show');
        $('#modalActivation').modal('hide');
        $('#modalLogin .modal-content > div').removeClass('active');
        $('#modalLogin .modal-content .lost').addClass('active');
    });

    $('.timer-down').each(function () {
        let seconds, minutes, hours, days;
        let that = $(this);
        let total = that.attr('data-countdown');
        let timeinterval = setInterval(function () {
            total = total - 1000;
            if (total > 1000) {
                seconds = Math.floor((total / 1000) % 60);
                minutes = Math.floor((total / 1000 / 60) % 60);
                hours = Math.floor((total / (1000 * 60 * 60)) % 24);
                days = Math.floor(total / (1000 * 60 * 60 * 24));

                seconds = '<div><div>' + ('0' + seconds).slice(-2) + '</div><div>ثانیه</div></div>';
                minutes = '<div><div>' + ('0' + minutes).slice(-2) + '</div><div>دقیقه</div></div><span>:</span>';
                hours =  (hours > 0) ? '<div><div>' + ('0' + hours).slice(-2) + '</div><div>ساعت</div></div><span>:</span>' : '';
                days = (days > 0) ? '<div><div>' + days + '</div><div>روز</div></div><span>:</span>' : '';

                that.html(days + hours + minutes + seconds);
            } else {
                clearInterval(timeinterval);
                that.html('<div class="rtl">زمان پایان یافت.</div>');
            }
        }, 1000)
    });

    $('#collapse-0').collapse('show');

    $('#myCollapsible').collapse({
        toggle: false
    })
    $('.js-panel').click(function () {
        $('.panel-profile').addClass('active');
        $('body').addClass('overflow');
    });

    $('.panel-profile ~ .background, .panel-profile .btn-close').click(function () {
        $('.panel-profile').removeClass('active');
        $('body').removeClass('overflow');
    });

    $('.js-favorite').click(function () {
        let calender_id = $(this).attr('attr-id');
        let this_val = $(this);
        this_val.addClass('ajax');
        $.ajax({
            url: "/user/calender/add-to-favorite/" + calender_id,
            method: 'GET',
            success: function (data){
                this_val.removeClass('ajax');
                if(data.status == 'success')
                {
                    this_val.toggleClass('active');
                    swal({
                        title: "موفقیت",
                        text: data.message,
                        icon: "success",
                    });
                }
                else if(data.status == 'warning')
                {
                    swal({
                        title: "هشدار",
                        text: data.message.join(),
                        icon: "warning",
                    });
                }
            },
        });
    });

    function valueFileInput(e){
        e.parent('label').next('span').remove();
        e.parent('label').after('<span>' + e.val().replace("C:\\fakepath\\", "") + '</span>');
    }
    $('input[type="file"]').on('change', function () {
        valueFileInput($(this));
    });


    $('#destination_select').change(function () {
        let destination_id = $(this).val();
        window.location.search = "?road_map_section_id=" + destination_id;
    });
    $('.cancel_selected_course_line').click(function () {
        $(this).parents('.road_map_step_line').removeClass('open');
    });
    $(".road_map_step_line").click(function (e) {
        let target = $(e.target);
        if (!(target.is('.buttons') || target.is('.buttons *'))) {
            $(this).siblings('div').removeClass('open');
            $(this).addClass('open');
        }
    });


    $('body').on('click', function (e) {
        let target = $(e.target);
        if (!(target.is('.box-search') || target.is('.box-search *') )) {
            $('.box-search .suggestion').slideUp();
            $('.box-search .suggestion').removeClass('active');
            $('.box-search').removeClass('click');
        }
    });

    $(document).keyup(function (e) {
        if (e.keyCode == 27) {
            $('.modal').modal('hide');
            $('body').removeClass('overflow');
            $('.box-search .suggestion').slideUp();
            $('.box-search .suggestion').removeClass('active');
            $('.box-search').removeClass('click');
            $(this).removeClass('active');
            $('.header .all-menu').slideUp();
        }
    });

    $('.owl-4').each(function () {
        $(this).owlCarousel({
            dots: true,
            nav: true,
            loop: false,
            margin: 30,
            rtl: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                992: {
                    items: 3,
                },
                1200: {
                    items: 4,
                    margin: 20
                }
            }
        });
    });

    $('.owl-5').each(function (){
        $(this).owlCarousel({
            dots: true,
            nav: true,
            loop: true,
            margin: 30,
            rtl: true,
            autoplay: false,
            responsive: {
                0: {
                    items: 1,
                },
                576: {
                    items: 2,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 4,
                },
                1200: {
                    dots: false,
                    nav: false,
                    autoplay: false,
                    items: 5,
                    margin: 15,
                    loop: false
                }
            }
        });
    });

    $('.owl-single').each(function () {
        $(this).owlCarousel({
            dots: false,
            nav: true,
            loop: $(this).children('div').length == 1 ? false : true,
            margin: 0,
            items: 1,
            rtl: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
        });
    });

    if ($('.text-more .content').length) {
        let heightContent = $('.text-more .content').height();

        if (heightContent > 320) {
            $('.text-more .content')
                .height(270)
                .addClass('overflow')
                .after('<div class="toggle"><div><i class="fa fa-angle-double-down"></i><span class="more">نمایش بیشتر</span><span class="less">نمایش کمتر</span></div></div>');
        }

        $('.text-more .toggle').click(function () {
            if ($(this).hasClass('open')) {
                $(this).removeClass('open');
                $('.text-more .content').height(270);
            } else {
                $(this).addClass('open');
                $('.text-more .content').height(heightContent);
            }
        });
    }


    $('.box-search input').keyup(function () {
        let that = $(this);
        let box = $('.box-search .suggestion');
        box.slideDown();
        if(that.val().length > 1) {
            let searched_text = that.val();
            that.addClass('loading');
            $.ajax({
                url: "/course/search/" + searched_text,
                method: 'GET',
                success:function (data) {
                    that.removeClass('loading');
                    box.addClass('active');
                    $("#search_suggestion_place").empty();
                    $("#search_suggestion_place").append(data);
                }
            });
        }
        else {
            box.removeClass('active');
            that.removeClass('loading');
        }
    });
    $('.anchors .btn').click(function () {
        let goal = $('#' + $(this).attr('data-goal')).offset().top - 100;
        $('html, body').animate({
            scrollTop: goal
        }, 800);
    });
    $('.format-number').each(function () {
        $(this).text(number_3_3($(this).text()));
    });

    $('.rules .form-check input').change(function () {
        if($(this).is(":checked")){
            $('.rules .btn').removeClass('disabled btn-secondary').addClass('btn-primary').attr('type', 'submit');
        }else{
            $('.rules .btn').addClass('disabled btn-primary').addClass('btn-secondary').attr('type', 'button');
        }
    });
    $('.comments .js-show').click(function () {
        $(this).toggleClass('active');
        $('.comments .list').slideToggle();
    });
    $('#lost_email').on('keyup keydown change', function () {
        $('#lost_mobile').val('');
        $('#lost-form').attr('action','/user/auth/password/email');
        $('#lost-form').attr('action-type','send_mail');
    });
    $('#lost_mobile').on('keyup keydown change', function () {
        $('#lost_email').val('');
        $('#lost-form').attr('action','/user/auth/password/mobile');
        $('#lost-form').attr('action-type','send_mobile');
    });

    $('.js-reset-pass').click(function () {
        let btn = $(this);
        let action_type = $("#lost-form").attr('action-type');
        let form_data = new FormData();
        if(action_type == 'send_mail')
        {
            btn.addClass('loading');
            form_data.append('email',$('#lost_email').val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': btn.attr('data-token')
                }
            });
            $.ajax({
                url: $('#lost-form').attr('action'),
                method: 'POST',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                data: form_data,
                success: function (data) {
                    btn.removeClass('loading');
                    swal({
                        title: 'موفقیت',
                        icon: 'success',
                        text: 'ایمیلی جهت بازیابی رمز عبور برای شما ارسال گردید. لطفا ایمیل خود را به همراه پوشه SPAM چک بفرمایید.'
                    })
                },
            });
        }
        else if(action_type == 'send_mobile')
        {
            btn.addClass('loading');
            form_data.append('phone',$("#lost_mobile").val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': btn.attr('data-token')
                }
            });
            $.ajax({
                url: $('#lost-form').attr('action'),
                method: 'POST',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                data: form_data,
                success: function (data) {
                    btn.removeClass('loading');
                    if(data.status == 'success')
                    {
                        $('<input>').attr({
                            type: 'hidden',
                            name: 'activation_mobile',
                            id: 'activation_mobile',
                            value: $("#lost_mobile").val()
                        }).appendTo('#mobile-recovery-form');

                        $('#modalLogin').modal('hide');
                        $('#modalActivation').modal('show');
                    }
                    else
                    {
                        swal({
                            title: 'هشدار',
                            icon: 'warning',
                            text: data.message.join()
                        });
                    }
                },
            });
        }
    });
    $('.js-confirm-activation-code').click(function () {
        let form_data = new FormData();
        let btn = $(this);
        form_data.append('activation_mobile',$('#activation_mobile').val());
        form_data.append('activation_code',$('#activation_code').val());
        btn.addClass('loading');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': btn.attr('data-token')
            }
        });
        $.ajax({
            url: '/user/auth/password/mobile/reset/confirm',
            method: 'POST',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            data: form_data,
            success: function (data) {
                btn.removeClass('loading');
                if(data.status == 'success')
                {
                    $(location).attr('href', '/user/auth/password/mobile/reset/' + $('#activation_mobile').val());
                }
                else
                {
                    swal({
                        title: 'هشدار',
                        icon: 'warning',
                        text: data.message.join()
                    });
                }
            },
        });
    });
    $('.barrating select').each(function () {
        $(this).barrating({
            theme: 'fontawesome-stars'
        });
    });

    $('.owl-words').each(function () {
        $(this).owlCarousel({
            dots: false,
            nav: false,
            loop: true,
            margin: 0,
            items: 1,
            rtl: true,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
        });
    });

    $('.elastic').each(function() {
        let elastic = $(this);
        let tabs = elastic.find(".tabs");
        let selector = tabs.find(".selector");
        let item = tabs.find("button");
        let activeItem = tabs.find('.active');
        let activeWidth = activeItem.innerWidth();
        selector.css({
            "left": activeItem.position().left + "px",
            "width": activeWidth + "px"
        });
        item.click(function(){
            let activeTab = $(this).attr("rel");
            if(!$(this).hasClass('active')) {
                elastic.find('.box').hide();
                $("#" + activeTab).fadeIn('slow');
            }
            item.removeClass("active");
            $(this).addClass('active');
            let activeWidth = $(this).innerWidth();
            let itemPos = $(this).position();
            selector.css({
                "left":itemPos.left + "px",
                "width": activeWidth + "px"
            });
        });
    });

    $('.faq h4').click(function(){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
        }else{
            $(this).parents('.faq').find('h4').removeClass('active');
            $(this).addClass('active');
        }
    });
});
