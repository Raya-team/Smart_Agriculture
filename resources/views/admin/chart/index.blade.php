@extends('admin.master')
@section('title', 'نمودار')
@section('main-content')
    <section class="content-header">
        <h1>
            نمودار
        </h1>
        <ol class="breadcrumb" dir="ltr">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="#">نمودارها</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="col-md-3">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">فیلتر داده ها</h3>
                            <hr style=" border: 1px solid rgba(0,0,0,0.31);">
                            <div class="box-body">
                                <form action="{{route('chart.show' , ['sensor' => $sensor])}}" method="get">
                                    @include('admin.section.errors')
                                    <div class="form-group">
                                        <label>پارامتر:</label>
                                        <select class="form-control chosen-select" style="width: 100%;" name="filter" id="filter_id">
                                            @foreach($filters as $filter)
                                                <option value="{{ $filter->id }}" data-nickname="{{ $filter->nickname }}" data-index="{{ $filter->index }}">{{ $filter->nickname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                    <label for="from">از تاریخ :</label>
                                        <input name="from" id="from" class="datepicker-demo observer-from pwt-datepicker-input-element" placeholder="از تاریخ" >
                                    </div>
                                    <div class="form-group">
                                    <label for="to">تا تاریخ :</label>
                                    <input name="to" id="to" class="datepicker-demo observer-to pwt-datepicker-input-element" placeholder="تا تاریخ" >
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>بازه:</label>
                                        <select class="form-control chosen-select" style="width: 100%;" name="period" id="period" data-placeholder="جهت نمایش نمودار پارامتر مورد نظر خود را انتخاب کنید">
                                            <option value="h">ساعتی</option>
                                            <option value="d">روزانه</option>
                                            <option value="w">هفتگی</option>
                                            <option value="m">ماهانه</option>
                                            <option value="y">سالانه</option>
                                        </select>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary">نمایش</button>
                                </form>
                            </div>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <input type="hidden" value="{{ $details }}" id="details">
            <input type="hidden" value="{{ $filters }}" id="filters">
            <div class="row">
                <div class="col-xs-12">
                    <!-- interactive chart -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="fa fa-bar-chart-o"></i>
                            <h3 class="box-title">نمودار</h3>
                            <hr style=" border: 1px solid rgba(0,0,0,0.31);">
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
        </div>
    </section>
@endsection
@section('script')
    <script src="https://unpkg.com/persian-date@1.1.0/dist/persian-date.min.js"></script>
    <script src="https://unpkg.com/persian-datepicker@1.2.0/dist/js/persian-datepicker.min.js"></script>
    <script src="{{ asset('js/highcharts.js') }}"></script>
    <script src="{{ asset('js/chosen.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="https://unpkg.com/persian-datepicker@1.2.0/dist/css/persian-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('css/highcharts.css') }}">--}}
@endsection