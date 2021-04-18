@extends('admin.master')
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
            <div class="col-lg-4 col-xs-4" style="height:180px">
                <!-- small box -->
                <div class="small-box bg-yellow"  >
                    <div class="inner">
                        <h3>{{ $users_count }}
                            <span style="font-size: 15px; color: #8a0000;" class="animated infinite fadeIn">
                                @if($unapproved_users)
                                    ({{$unapproved_users}} کاربر در انتظار تایید)
                                @endif
                            </span></h3>
                        <p>کاربران تایید شده</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('users.index')}}" class="small-box-footer">اطلاعات بیشتر <i
                                class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$lands_count}}</h3>
                        <p>زمین ها</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{route('lands.index')}}" class="small-box-footer">اطلاعات بیشتر <i
                                class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{{$sensors_count}}</h3>
                        <p>سنسور ها</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-radio-button-on"></i>
                    </div>
                    <a href="{{route('sensors.index')}}" class="small-box-footer">
                        اطلاعات بیشتر
                        <i class="fa fa-arrow-circle-left"></i></a>
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
                            نقشه
                        </h3>
                    </div>
                    <div class="box-body">
                        <div id="world-map" style="height: 320px; width: 100%;"></div>
                    </div>
                </div>
            </section>
            <section class="col-lg-6 connectedSortable">
                <div class="box box-solid bg-teal-gradient">
                    <div class="box-header">
                        <i class="fa fa-th"></i>

                        <h3 class="box-title">نمودار</h3>

                        <div class="box-tools pull-left">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart" id="line-chart" style="height: 320px;"></div>
                    </div>
                </div>
            </section>
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