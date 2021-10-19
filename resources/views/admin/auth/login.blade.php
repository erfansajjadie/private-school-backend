
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <h1>فرم ورود</h1>
                    <div dir="ltr">
                        <x-input class="form-control"
                                 placeholder="ایمیل"
                                 id="email"
                                 type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div dir="ltr">
                        <x-input type="password" class="form-control" placeholder="رمز ورود" id="password"
                                 name="password"
                                 required autocomplete="current-password"  />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">مرا به خاطر داشته باش</span>
                        </label>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <div>
                        <x-button class="btn btn-default submit">
                            ورود
                        </x-button>
                        <a class="reset_pass" href="{{route('admin.password.request')}}">رمز ورود را فراموش کردید؟</a>
                    </div>

                    <div class="clearfix"></div>



                    <div class="separator">
                        <p class="change_link">اکانت ندارید؟
                            <a href="{{route('admin.register')}}" class="to_register"> ایجاد حساب </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
