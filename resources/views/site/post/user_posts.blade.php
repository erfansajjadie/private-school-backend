@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'لیست پست های آموزشی')
@section('content')
    <div class="header-page">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{route('home')}}">خانه</a>
                <span>
                    پست های آموزشی
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
            <a href="{{route('create-post')}}" class="btn btn-primary">افزودن پست جدید +</a>
            <table class="table table-striped mt-3 table-responsive-sm">
                <thead>
                <tr>
                    <th scope="col">شناسه</th>
                    <th scope="col">عکس</th>
                    <th scope="col">عنوان</th>
                    <th scope="col">محتوا</th>
                    <th scope="col">تعداد پسند</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr >
                        <td>{{$post->id}}</td>
                        <td>
                            <img src="{{asset('storage/' . $post->images()->first()->image)}}" style="height: 50px; width: 50px; object-fit: cover">
                        </td>
                        <td><a href="{{route('post-details', $post->id)}}">{{$post->title}}</a></td>
                        <td>{{Str::limit($post->description)}}</td>
                        <td>{{$post->likes_count}}</td>
                        <td>
                            <span onclick="deleteItem('{{route('delete-post', $post->id)}}')" class = 'fa fa-trash' style="cursor: pointer"></span>
                            <a href="{{route('edit-post', $post->id)}}"><i class="fa fa-fw fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

