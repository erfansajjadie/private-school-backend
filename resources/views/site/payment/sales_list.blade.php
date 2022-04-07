@extends('layouts.app', ['body_class' => 'inner-page'])
@section('title', 'لیست فروش های کاربر')
@section('content')
    <div class="header-page">
        <div class="container">
            <nav class="breadcrumbs">
                <a href="{{route('home')}}">خانه</a>
                <span>
                    فروش های شما
                </span>
            </nav>

        </div>
    </div>
    <section>
        <div class="container">
            <table class="table table-striped mt-3 table-responsive-sm">
                <thead>
                <tr>
                    <th scope="col">شناسه تراکنش</th>
                    <th scope="col">دوره</th>
                    <th scope="col">نام خریدار</th>
                    <th scope="col">قیمت</th>
                    <th scope="col">تخفیف</th>
                    <th scope="col">وضعیت</th>
                </tr>
                </thead>
                <tbody>
                @foreach($payments as $payment)
                    <tr >
                        <td>{{$payment->transaction_id}}</td>
                        <td>{{$payment->course->name}}</td>
                        <td>{{$payment->user->user_name}}</td>
                        <td class = 'format-number'>{{$payment->price}}</td>
                        <td class = 'format-number'>{{$payment->discount}}</td>
                        <td>
                            @if($payment->status === 1)
                                <span class="badge badge-success">{{$payment->status()}}</span>
                            @elseif($payment->status === 0)
                                <span class="badge badge-secondary">{{$payment->status()}}</span>
                            @else
                                <span class="badge badge-danger">{{$payment->status()}}</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection

