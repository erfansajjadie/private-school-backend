@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'ویرایش پروفایل کاربری')
@section('content')
<div class="header-page">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="{{route('home')}}">خانه</a>
            <span>
                پروفایل من
            </span>
        </nav>

    </div>
</div>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-side">
                    <h3 class="title">اطلاعات پایه</h3>
                </div>
                <form action="{{route('update-profile')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6 col-md-4 form-group">
                            <label for="">نام</label>
                            <input type="text" name="first_name" value="{{Auth::user()->first_name}}" placeholder="" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-4 form-group">
                            <label for="">نام خانوادگی</label>
                            <input type="text" name="last_name" value="{{Auth::user()->last_name}}" placeholder="" class="form-control">
                        </div>
                        <div class="col-sm-6 col-md-4 form-group">
                            <label for="">نام کاربری</label>
                            <input type="text" name="user_name" value="{{Auth::user()->user_name}}" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-success">تلفن همراه</label>
                                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="text-danger">شماره شبا</label>
                            <input type="text" name="sheba" value="{{Auth::user()->sheba}}" class="form-control" disabled>
                        </div>
                        <div class="col-sm-6 col-md-4 form-group">
                            <label for="">حوزه تدریس</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option> -- </option>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option {{ ( $category->id === Auth::user()->category->id) ? 'selected' : '' }} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-6 col-md-4 form-group">
                            <label for="">نوع صفحه</label>
                            <select id="is_private" name="is_private" class="form-control">
                                <option {{ ( Auth::user()->is_private === 0) ? 'selected' : '' }} value="0">عمومی</option>
                                <option {{ ( Auth::user()->is_private === 1) ? 'selected' : '' }} value="1">شخصی</option>
                            </select>
                        </div>
                        <div id="private_price" class="col-sm-6 col-md-4 form-group">
                            <label for="">مبلغ نمایش صفحه</label>
                            <input type="number" name="private_price" value="{{Auth::user()->private_price}}" class="form-control">
                        </div>
                        <div class="col-12 form-group">
                            <div>آپلود تصویر پروفایل</div>
                            <label class="btn btn-success ml-2" type="button"> <input class="d-none" type="file" name="profile_image">
                            <i class="fas fa-upload"></i> آپلود تصویر </label>
                            <img style="width: 60px; height: 60px;  object-fit: cover;" src="{{asset('storage/' . Auth::user()->profile_image)}}">
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))

                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-md-4 col-sm-6 mr-auto">
                            <button class="btn btn-lg btn-block btn-primary">ذخیره</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
    <script>
        var privateSelect = $('#is_private');
        var privateInput = $('#private_price');

        function onSelectChange(value) {
            if(value === "1") {
                privateInput.show();
            } else if (value === "0") {
                privateInput.hide();
            }
        }

        $(document).ready(function(){
            onSelectChange(privateSelect.val());
            privateSelect.on('change', function () {
                onSelectChange(this.value);
            })
        });



    </script>
@endpush
