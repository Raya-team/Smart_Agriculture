@extends('user.master')
@section('title', 'داشبورد')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            کشاورزی هوشمند
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$lands_count}}</h3>
                        <p style="font-size:18px"><b>زمین ها</b></p>
                    </div>
                    <div class="icon" style="padding-top: 12px">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <span class="small-box-footer" style="background-color: #00c0ef; color: #00c0ef; height: 30px"></span>
                </div>
            </div>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$sensors_count}}</h3>
                        <p style="font-size:18px"><b>ایستگاه ها</b></p>
                    </div>
                    <div class="icon" style="padding-top: 12px">
                        <i class="ion ion-android-radio-button-on"></i>
                    </div>
                    <span class="small-box-footer" style="background-color: #dd4b39; color: #dd4b39; height: 30px">
                        <i class="fa fa-arrow-circle-left"></i>
                    </span>
                </div>
            </div>
        </div>
        <!-- Main row -->
        <div class="row">
            <section class="col-lg-6 connectedSortable">
                <div class="box box-solid bg-light-blue-gradient">
                    <div class="box-header">
                        <!-- tools box -->
                        <div class="pull-left box-tools">
                            <button type="button" class="btn btn-primary btn-sm pull-left" data-widget="collapse"
                                    data-toggle="tooltip" title="Collapse" style="margin-left: 5px;">
                                <i class="fa fa-minus"></i></button>
                        </div>
                        <!-- /. tools -->

                        <i class="fa fa-map-marker"></i>

                        <h3 class="box-title">
                            ایستگاه های فعال
                        </h3>
                    </div>
                    <div class="box-body">
                        <div id="world-map" style="height: 320px; width: 100%;"></div>
                    </div>
                </div>
            </section>
            {{--<section class="col-lg-6 connectedSortable">--}}
                {{--<div class="box box-solid bg-teal-gradient">--}}
                    {{--<div class="box-header">--}}
                        {{--<i class="fa fa-th"></i>--}}

                        {{--<h3 class="box-title">نمودار</h3>--}}

                        {{--<div class="box-tools pull-left">--}}
                            {{--<button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>--}}
                            {{--</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="box-body border-radius-none">--}}
                        {{--<div class="chart" id="line-chart" style="height: 320px;"></div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</section>--}}
        </div>
        <input type="hidden" value="{{ $details }}" id="details">
    </section>

@endsection
@section('script')
    <script src="{{ asset('js/dashboard/map.js')}}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/map.css')}}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.6/animate.min.css" />
@endsection