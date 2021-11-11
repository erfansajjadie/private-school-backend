@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'لیست دوره های آموزشی')
@section('content')
    <div class="header-page">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{route('home')}}">خانه</a>
                <span>
                    دوره‌های آموزشی
                </span>
            </nav>

        </div>
    </div>
    <section>
        <div class="container">
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                @endforeach
            </div>
            <a href="{{route('create-course')}}" class="btn btn-primary">افزودن دوره جدید +</a>
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th scope="col">شناسه</th>
                    <th scope="col">عکس</th>
                    <th scope="col">نام</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">تخفیف</th>
                    <th scope="col">توضیحات</th>
                    <th scope="col">فایل ها</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr >
                        <td>{{$course->id}}</td>
                        <td>
                            <img src="{{asset('storage/' . $course->image)}}" style="height: 50px; width: 50px; object-fit: cover">
                        </td>
                        <td>{{$course->name}}</td>
                        <td class="format-number">{{$course->price}}</td>
                        <td>{{$course->discount}}</td>
                        <td>{{Str::limit($course->description)}}</td>
                        <td>
                            <button data-toggle="collapse" data-target="#course{{$course->id}}"  class="btn btn-default">نمایش جلسات</button>
                        </td>
                        <td>
                            <span onclick="deleteItem('{{route('delete-course', $course->id)}}')" class = 'fa fa-trash' style="cursor: pointer"></span>
                            <a href="{{route('edit-course', $course->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12" class="hiddenRow">
                            <div class="accordian-body collapse" id="course{{$course->id}}">
                                <a href="{{route('create-topic', $course->id)}}" class="btn btn-primary mb-2">افزودن جلسه +</a>
                                <table class="table">
                                    <thead>
                                    <tr class="info">
                                        <th>شناسه</th>
                                        <th>عنوان</th>
                                        <th>فایل</th>
                                        <th>وضعیت</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($course->topics as $topic)
                                        <tr>
                                            <td>{{$topic->id}}</td>

                                            <td>{{$topic->title}}</td>
                                            <td>
                                                <a href = "{{asset('storage/'. $topic->file)}}" target="_blank" class="btn btn-default">نمایش فایل</a>
                                            </td>
                                            <td>
                                                @if($topic->approved === 1)
                                                    <span class="badge badge-success">تایید شده</span>
                                                @else
                                                    <span class="badge badge-secondary">در انتظار تایید</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <span onclick="deleteItem('{{route('delete-topic', $topic->id)}}')" class = 'fa fa-trash' style="cursor: pointer"></span>
                                                <a href="{{route('edit-topic', $topic->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

