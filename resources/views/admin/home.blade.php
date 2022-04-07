@extends('admin.layouts.main')
@section('content')
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> تعداد کاربران</span>
                <div class="count">{{$users_count}}</div>
                <span class="count_bottom">تعداد کل کاربران</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> فروش کل</span>
                <div class="count">{{$total_payments}}</div>
                <span class="count_bottom">مجموع فروش کل اپ</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> مجموع کل دوره ها</span>
                <div class="count green">{{$courses_count}}</div>
                <span class="count_bottom">مجموع کل دوره های ایجاد شده</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> مجموع پست ها</span>
                <div class="count">{{$posts_count}}</div>
                <span class="count_bottom">مجموع فروش کل پست های ارسالی</span>

            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>تعداد دانلود اپلیکیشن</span>
                <div class="count">{{$downloads_count}}</div>
                <span class="count_bottom">تعداد دانلود های اپلیکیشن</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i>تعداد بازدید اپلیکیشن</span>
                <div class="count">{{$visits_count}}</div>
                <span class="count_bottom">تعداد بازدید های اپلیکیشن</span>
            </div>

        </div>
        <!-- /top tiles -->



        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="dashboard_graph">

                    <div class="row x_title">
                        <div class="col-md-6">
                            <h3>دانلود های اخیر نرم افزار
                                <small>دانلود ها</small>
                            </h3>
                        </div>
                        <div class="col-md-6">
                            <div id="reportrange" class="pull-left"
                                 style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>اسفند 29, 1394 - فروردین 28, 1395</span> <b class="caret"></b>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">

                                <div class="x_content">

                                    <div id="datatable-checkbox_wrapper"
                                         class="dataTables_wrapper form-inline dt-bootstrap no-footer">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <table id="datatable-checkbox"
                                                       class="table table-striped table-bordered bulk_action dataTable no-footer"
                                                       role="grid" aria-describedby="datatable-checkbox_info">
                                                    <thead>
                                                    <tr role="row">
                                                        @foreach($download_labels as $label)
                                                            <th class="sorting_asc" tabindex="0"
                                                                aria-controls="datatable-checkbox" rowspan="2" colspan="1"
                                                                aria-sort="ascending"
                                                                aria-label="نام: activate to sort column descending"
                                                                style="width: 50px;">{{$label}}
                                                            </th>
                                                        @endforeach
                                                    </tr>
                                                    </thead>


                                                    <tbody>

                                                    @foreach($downloads as $download)
                                                        <tr role="row" class="odd">
                                                            <td>{{$download->version}}</td>
                                                            <td>{{$download->os}}</td>
                                                            <td>{{$download->device_id}}</td>
                                                            <td>{{$download->device_brand}}</td>
                                                            <td>{{$download->device_name }}</td>
                                                            <td>{{$download->count }}</td>
                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <div class="dataTables_info" id="datatable-checkbox_info" role="status"
                                                     aria-live="polite">20 دانلود اخیر اپلیکیشن
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="clearfix"></div>
                </div>
            </div>

        </div>

    </div>
@endsection
