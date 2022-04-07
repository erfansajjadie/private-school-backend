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
                            <h3>حوزه کاری
                                <small>لیست حوزه های کاری</small>
                                {{$categories->count()}}
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
                                        <div class="row">
                                            <div class="col-sm-6">

                                            </div>
                                            <div class="col-sm-6">
                                                <div id="datatable-checkbox_filter" class="dataTables_filter">
                                                    <a href="{{route('category.create')}}" type="button" class="btn btn-round btn-primary">ایجاد حوزه کاری +</a>
                                                </div>
                                            </div>
                                        </div>
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
                                                            style="width: 280px;">نام حوزه کاری
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="تاریخ شروع: activate to sort column ascending"
                                                            style="width: 80px;">عملیات
                                                        </th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>

                                                        @foreach($categories as $category)
                                                            <tr role="row" class="odd">
                                                                <td>{{$category->id}}</td>
                                                                <td>{{$category->name}}</td>
                                                                <td>
                                                                    <div class = 'row text-center'>
                                                                        <span onclick="removeCategory({{$category->id}})" class = 'fa fa-trash operation-icon'></span>
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
                                                    {{ $categories->links('vendor.pagination.default') }}
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
        function removeCategory(id, approve = 1) {
            Swal.fire({
                title: 'آیا از انجام این عملیات اطمینان دارید؟',
                showCancelButton: true,
                confirmButtonText: 'بله',
                cancelButtonText: 'خیر',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                    return fetch('{{url('admin/category')}}/' + id, {
                            method: 'DELETE',
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
