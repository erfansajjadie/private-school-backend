<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="stylesheet" type="text/css" href="../../public/css/app.css"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>تکمیل فرآیند خرید</title>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet" type="text/css" >
</head>
<body>
<div class="column-section">
    <div class="main-section flex items-center">
        @if($payment['status'] == 1)
            <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#89B834" class="bi bi-check" viewBox="0 0 16 16">
                <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
            </svg>
            <div style="height: 20px"></div>
            <div class="button-success">پرداخت با موفقیت انجام شد</div>
        @elseif($payment['status'] == 2)
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="red" class="bi bi-exclamation" viewBox="0 0 16 16">
                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.553.553 0 0 1-1.1 0L7.1 4.995z"/>
            </svg>
            <div style="height: 20px"></div>
            <div class="button-error">پرداخت انجام نشد</div>
        @endif
    </div>
    <div style="height: 60px"></div>
    <table dir = "rtl"  style="width:50%">
        <tr>
            <th>شماره سریال: </th>
            <td>{{$payment->serial}}</td>
        </tr>
        <tr>
            <th>مبلغ: </th>
            <td>{{$payment->price}}  تومان</td>
        </tr>
    </table>
    <div style="height: 50px"></div>
    @if($payment->platform === 'web')
        <a class="link" href="{{ route('user-payments') }}" >رفتن به پنل کاربری</a>
    @else
        <a class="link" href="{{ "private-school://private-school.ir?Authority=" . $payment["id"] . "&Status=success" }}" >برگشت به اپلیکیشن</a>
    @endif
    <div style="height: 60px"></div>
    <img  src="{{ asset('img/logo.png') }}"  alt="">
</div>
</body>
</html>
