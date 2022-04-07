@push('css')
    <link href="{{asset('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
@endpush
@extends('admin.layouts.main')
@section('content')
    <div class="main_container">



        <!-- page content -->
        <div class="right_col" role="main" style="min-height: 3718px;">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>ایجاد حوزه کاری</h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_content">
                                <br>
                                <form method="post" action="{{ route('category.store') }}" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="">
                                    @csrf

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نام دسته بندی
                                            <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input name="name" id="name" type="text" required="required" class="form-control col-md-7 col-xs-12" data-parsley-id="5" aria-describedby="parsley-id-5">
                                        </div>
                                        <!-- Error -->
                                        @if ($errors->has('name'))
                                            <div class="error">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <a href="{{route('category.index')}}" class="btn btn-primary">برگشت</a>
                                            <button type="submit" name="send" value="Submit" class="btn btn-success">ایجاد محصول</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- /page content -->
    </div>
@endsection

@push('scripts')
    <!-- bootstrap-wysiwyg -->
    <script src="{{asset('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('vendors/google-code-prettify/src/prettify.js')}}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{asset('vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{asset('vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <script src="{{asset('vendors/parsleyjs/dist/i18n/fa.js')}}"></script>
    <!-- Autosize -->
    <script src="{{asset('vendors/autosize/dist/autosize.min.js')}}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{asset('vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <!-- starrr -->
    <script src="{{asset('vendors/starrr/dist/starrr.js')}}"></script>

@endpush
