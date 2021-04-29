@extends('admin.master')
@section('title', 'نمودار')
@section('main-content')
    <section class="content-header">
        <h1>
            نمودار بررسی
        </h1>
        <ol class="breadcrumb" dir="ltr">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="#">نمودارها</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <input type="hidden" value="{{ $details }}" id="details">
        <input type="hidden" value="{{ $filters }}" id="filters">
        <div class="row">
            <div class="col-xs-12">
                <!-- interactive chart -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <i class="fa fa-bar-chart-o"></i>

                        <h3 class="box-title">نمودار</h3>
                        <hr style=" border: 1px solid rgba(0,0,0,0.31);">
                        <div class="box-body">
                            <label>پارامتر</label>
                            <select class="form-control chosen-select" style="width: 100%;" name="filter_id" id="filter_id" data-placeholder="جهت نمایش نمودار پارامتر مورد نظر خود را انتخاب کنید">
                                <option value=""></option>
                                @foreach($filters as $filter)
                                    <option value="{{ $filter->id }}" data-nickname="{{ $filter->nickname }}" data-index="{{ $filter->index }}">{{ $filter->nickname }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div id="highcharts" style="height: 500px;"></div>
                    </div>
                    <!-- /.box-body-->
                </div>
                <!-- /.box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('script')
    {{--<script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
    <script src="{{ asset('js/highcharts.js') }}"></script>
    <script src="{{ asset('js/chosen.js') }}"></script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
@endsection