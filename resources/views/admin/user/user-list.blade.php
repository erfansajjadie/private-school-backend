@extends('admin.layouts.main')
@section('content')
    <body class="nav-md">
    <div class="container body">
        <div class="main_container">


            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>کاربران
                                <small>لیست تمام کاربران</small>
                                {{$users->count()}}
                            </h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="جست و جو برای...">
                                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">برو!</button>
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">

                                <div class="x_content">

                                    <div id="datatable-checkbox_wrapper"
                                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        {{--<div class="row">
                                            <div class="col-sm-6">
                                                <div class="dataTables_length" id="datatable-checkbox_length"><label>نمایش
                                                        <select name="datatable-checkbox_length"
                                                                aria-controls="datatable-checkbox"
                                                                class="form-control input-sm">
                                                            <option value="10">10</option>
                                                            <option value="25">25</option>
                                                            <option value="50">50</option>
                                                            <option value="100">100</option>
                                                        </select> آیتم</label></div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div id="datatable-checkbox_filter" class="dataTables_filter">
--}}{{--                                                    <a href="{{route('product.create')}}" type="button" class="btn btn-round btn-primary">ایجاد محصول جدید +</a>--}}{{--
                                                </div>
                                            </div>
                                        </div>--}}
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatable-checkbox"
                                                       class="table table-striped table-bordered bulk_action dataTable no-footer"
                                                       role="grid" aria-describedby="datatable-checkbox_info">
                                                    <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="نام: activate to sort column descending"
                                                            style="width: 50px;">شناسه
                                                        </th>
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="نام: activate to sort column descending"
                                                            style="width: 50px;">عکس
                                                        </th>
                                                        <th class="sorting_asc" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-sort="ascending"
                                                            aria-label="نام: activate to sort column descending"
                                                            style="width: 70px;">نام کاربری
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="جایگاه: activate to sort column ascending"
                                                            style="width: 65px;"> نام و نام خانوادگی
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="اداره: activate to sort column ascending"
                                                            style="width: 65px;">شماره موبایل
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="سن: activate to sort column ascending"
                                                            style="width: 265px;">شماره شبا
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="تاریخ شروع: activate to sort column ascending"
                                                            style="width: 30px;">نوع صفحه
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="تاریخ شروع: activate to sort column ascending"
                                                            style="width: 120px;">عملیات
                                                        </th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>

                                                        @foreach($users as $user)
                                                            <tr role="row" class="odd">
                                                                <td>{{$user->id}}</td>
                                                                <td>
                                                                    <a href="{{asset('storage/'. $user->profile_image)}}" target="_blank">
                                                                        <img class = 'img-rounded' src="{{asset('storage/'. $user->profile_image)}}" alt="No" height="70" />
                                                                    </a>
                                                                </td>
                                                                <td>{{$user->user_name}}</td>
                                                                <td>{{$user->fullname}}</td>
                                                                <td>{{$user->phone}}</td>
                                                                <td>{{$user->sheba}}</td>
                                                                <td><span class="badge badge-secondary">{{$user->is_private ? "شخصی" : "عمومی"}}</span></td>
                                                                <td>
                                                                    <button onclick="ban({{$user->id}})" class="btn btn-default">
                                                                        @if($user->is_banned === 1)
                                                                            <span>رفع مسدودی</span>
                                                                        @else
                                                                            <span>مسدود کردن</span>
                                                                        @endif
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                {{ $users->links('vendor.pagination.default') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>
    </body>
@endsection
@push('scripts')

    <script type="text/javascript">
        function ban(id, approve = 1) {
            Swal.fire({
                title: 'آیا از انجام این عملیات اطمینان دارید؟',
                showCancelButton: true,
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    return fetch('{{url('admin/ban')}}/' + id, {
                            method: 'POST',
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-Token": $('input[name="_token"]').val()
                            },
                        }
                    )
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText)
                            }
                            return response.json()
                        })
                        .catch(error => {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                Swal.fire({
                    icon: 'success',
                    title: result.value.message,
                })
                location.reload();

            })
        }

    </script>
@endpush
