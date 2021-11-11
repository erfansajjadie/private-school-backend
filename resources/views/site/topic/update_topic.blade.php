@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'ویرایش جلسه')
@section('content')
<div class="header-page">
    <div class="container">
        <nav class="breadcrumbs">
            <a href="{{route('home')}}">خانه</a>
            <span>
                ویرایش جلسه
            </span>
            <strong>{{$topic->title}}</strong>
        </nav>

    </div>
</div>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-side">
                    <h3 class="title">اطلاعات جلسه</h3>
                </div>
                <form id="topicForm" action="{{route('update-topic', $topic->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-12 form-group">
                            <label for="">عنوان جلسه</label>
                            <input type="text" name="title"  placeholder="" value="{{$topic->title}}" class="form-control">
                        </div>
                        <div class="col-12 form-group">
                            <div>آپلود فایل</div>
                            <label class="btn btn-success ml-2" type="button"> <input class="d-none" type="file" name="file">
                            <i class="fas fa-upload"></i> آپلود فایل </label>
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

                        <div class="col-12 form-group">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6 mr-auto">
                            <button  type="submit" value="Submit" class="btn btn-lg btn-block btn-primary">ویرایش</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(function () {
            $(document).ready(function () {
                $('#topicForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        console.log(percentage);
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                            return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },

                    complete: function (xhr) {
                        console.log('File has uploaded');
                    },
                    success: function() {
                        window.history.back();
                    },
                    error: function() {
                        Swal.fire('لطفا همه فیلد ها را وارد کنید');
                        $('.progress .progress-bar').css("width", 0+'%', function() {
                            return $(this).attr("aria-valuenow", 0) + "%";
                        })
                    }
                });
            });
        });
    </script>
@endpush
