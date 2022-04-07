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
                                <h3>فایها
                                    <small>لیست تمام فایلهای ارسالی</small>
                                    {{$topics->count()}}
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
                                                                style="width: 40px;">شناسه
                                                            </th>
                                                            <th class="sorting_asc" tabindex="0"
                                                                aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                                aria-sort="ascending"
                                                                aria-label="نام: activate to sort column descending"
                                                                style="width: 80px;">نام ارسال کننده
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                                aria-label="جایگاه: activate to sort column ascending"
                                                                style="width: 65px;"> لینک فایل
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                                aria-label="جایگاه: activate to sort column ascending"
                                                                style="width: 65px;"> وضعیت
                                                            </th>
                                                            <th class="sorting" tabindex="0"
                                                                aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                                aria-label="تاریخ شروع: activate to sort column ascending"
                                                                style="width: 80px;">عملیات
                                                            </th>
                                                        </tr>
                                                        </thead>


                                                        <tbody>

                                                            @foreach($topics as $topic)
                                                                <tr role="row" class="odd">
                                                                    <td>{{$topic->id}}</td>
                                                                    <td>{{$topic->course->user->fullname}}</td>
                                                                    <td>
                                                                        <a class="btn btn-default"
                                                                        target="_blank"
                                                                        href="{{asset('storage/'. $topic->file)}}">نمایش فایل</a>
                                                                    </td>
                                                                    <td>
                                                                        @if($topic->approved === 1)
                                                                            <span class="badge" style="background: green">تایید شده</span>
                                                                        @elseif($topic->approved === 0)
                                                                            <span class="badge badge-secondary">در انتظار تایید</span>
                                                                        @else
                                                                            <span class="badge badge-danger" style="background: red">رد شده</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <div class = 'row text-center'>
                                                                            @if($topic->approved === 0 || $topic->approved === 1)
                                                                                <span onclick="approve({{$topic->id}}, 0)" class = 'fa fa-close operation-icon'></span>
                                                                            @endif
                                                                            @if($topic->approved === 0 || $topic->approved === 3)
                                                                                <span onclick="approve({{$topic->id}})" class = 'fa fa-check operation-icon'></span>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-7">
                                                        {{ $topics->links('vendor.pagination.default') }}
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
            function approve(id, approve = 1) {
                Swal.fire({
                    title: 'آیا از انجام این عملیات اطمینان دارید؟',
                    showCancelButton: true,
                    confirmButtonText: 'بله',
                    cancelButtonText: 'خیر',
                    showLoaderOnConfirm: true,
                    preConfirm: (login) => {
                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                        return fetch('{{url('admin/approve/file')}}/' + id, {
                                method: 'POST',
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                    "X-Requested-With": "XMLHttpRequest",
                                    "X-CSRF-Token": $('input[name="_token"]').val()
                                },
                                body: JSON.stringify({approve : approve})
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
