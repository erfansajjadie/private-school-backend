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
                            <h3>محصولات
                                <small>لیست تمام محصولات</small>
                                {{$products->count( )}}
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

                                    <p>با افزودن کلاس <code dir="ltr">bulk_action</code> برای جدول، جدول دارای اعمال
                                        همگانی می‌شود.</p>


                                    <div id="datatable-checkbox_wrapper"
                                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                        <div class="row">
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
                                                    <a href="{{route('product.create')}}" type="button" class="btn btn-round btn-primary">ایجاد محصول جدید +</a>
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
                                                        <th class="sorting_disabled" rowspan="1" colspan="1"
                                                            aria-label="" style="width: 20px;"><input type="checkbox"
                                                                                                      id="check-all"
                                                                                                      class="flat"></th>
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
                                                            style="width: 270px;">نام محصول
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="جایگاه: activate to sort column ascending"
                                                            style="width: 65px;"> شناسه
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="اداره: activate to sort column ascending"
                                                            style="width: 65px;">قیمت
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="سن: activate to sort column ascending"
                                                            style="width: 65px;">قیمت با تخفیف
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="تاریخ شروع: activate to sort column ascending"
                                                            style="width: 30px;">موجودی
                                                        </th>
                                                        <th class="sorting" tabindex="0"
                                                            aria-controls="datatable-checkbox" rowspan="1" colspan="1"
                                                            aria-label="تاریخ شروع: activate to sort column ascending"
                                                            style="width: 120px;">عملیات
                                                        </th>
                                                    </tr>
                                                    </thead>


                                                    <tbody>

                                                        @foreach($products as $product)
                                                            <tr role="row" class="odd">
                                                                <td>
                                                                    <div class="icheckbox_flat-green"
                                                                         style="position: relative;"><input type="checkbox"
                                                                                                            class="flat"
                                                                                                            name="table_records"
                                                                                                            style="position: absolute; opacity: 0;">
                                                                        <ins class="iCheck-helper"
                                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <a href="{{$product->image}}" target="_blank">
                                                                        <img class = 'img-rounded' src="{{$product->image}}" alt="No" height="70" />
                                                                    </a>
                                                                </td>
                                                                <td>{{$product->name}}</td>
                                                                <td>{{$product->sku}}</td>
                                                                <td>{{$product->price}}</td>
                                                                <td>{{$product->special_price}}</td>
                                                                <td>{{$product->quantity}}</td>
                                                                <td>
                                                                    <div class = 'row text-center'>
                                                                        <span class = 'fa fa-trash operation-icon'></span>
                                                                        <span class = 'fa fa-edit operation-icon'></span>
                                                                        <span class = 'fa fa-list operation-icon'></span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="dataTables_info" id="datatable-checkbox_info" role="status"
                                                     aria-live="polite">Showing 1 to 10 of 57 entries
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="dataTables_paginate paging_simple_numbers"
                                                     id="datatable-checkbox_paginate">
                                                    <ul class="pagination">
                                                        <li class="paginate_button previous disabled"
                                                            id="datatable-checkbox_previous"><a href="#"
                                                                                                aria-controls="datatable-checkbox"
                                                                                                data-dt-idx="0"
                                                                                                tabindex="0">Previous</a>
                                                        </li>
                                                        <li class="paginate_button active"><a href="#"
                                                                                              aria-controls="datatable-checkbox"
                                                                                              data-dt-idx="1"
                                                                                              tabindex="0">1</a></li>
                                                        <li class="paginate_button "><a href="#"
                                                                                        aria-controls="datatable-checkbox"
                                                                                        data-dt-idx="2"
                                                                                        tabindex="0">2</a></li>
                                                        <li class="paginate_button "><a href="#"
                                                                                        aria-controls="datatable-checkbox"
                                                                                        data-dt-idx="3"
                                                                                        tabindex="0">3</a></li>
                                                        <li class="paginate_button "><a href="#"
                                                                                        aria-controls="datatable-checkbox"
                                                                                        data-dt-idx="4"
                                                                                        tabindex="0">4</a></li>
                                                        <li class="paginate_button "><a href="#"
                                                                                        aria-controls="datatable-checkbox"
                                                                                        data-dt-idx="5"
                                                                                        tabindex="0">5</a></li>
                                                        <li class="paginate_button "><a href="#"
                                                                                        aria-controls="datatable-checkbox"
                                                                                        data-dt-idx="6"
                                                                                        tabindex="0">6</a></li>
                                                        <li class="paginate_button next" id="datatable-checkbox_next"><a
                                                                href="#" aria-controls="datatable-checkbox"
                                                                data-dt-idx="7" tabindex="0">Next</a></li>
                                                    </ul>
                                                </div>
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
