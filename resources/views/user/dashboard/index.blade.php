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
            <section class="col-lg-6 connectedSortable">
                <div class="box box-solid bg-teal-gradient">
                    <div class="box-header">
                        <i class="fa fa-th"></i>

                        <h3 class="box-title">وضعیت آب و هوا</h3>

                        <div class="box-tools pull-left">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div class="chart" id="line-chart" style="height: 320px;">
                            <div>دمای هوا : <span id="temp"></span></div>
                            <div>دمای محسوس : <span id="feelsLike"></span></div>
                            <div>فشار : <span id="pressure"></span></div>
                            <div>رطوبت : <span id="humidity"></span></div>
                            <div>سرعت باد : <span id="windSpeed"></span></div>
                            <div>زاویه باد : <span id="windDeg"></span></div>
                            <div>مکان : <span id="name"></span></div>
                            <div>وضعیت : <span id="description"></span></div>
                            <div>آیکون : <span id="iconUrl"></span></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <input type="hidden" value="{{ $details }}" id="details">
        {{--<input type="hidden" value="{{ $response }}" id="response">--}}
    </section>

@endsection
@section('script')

    <script src="{{ asset('js/dashboard/map.js')}}"></script>
    <script>
        const url = "https://api.openweathermap.org/data/2.5/weather?q=Mashhad&lang=fa&units=metric&appid=72bc22de4339f28f95a619c28a70b30a"
        var temp,feelsLike,pressure,humidity,windSpeed,windDeg,name,description,icon,iconUrl
        $.getJSON(url, function (data) {
            // console.log(data.weather[0].icon);
            temp = `°${Math.round(data.main.temp)}`;
            feelsLike = `°${Math.round(data.main.feels_like)}`;
            pressure = data.main.pressure;
            humidity = `${data.main.humidity}%`;
            windSpeed = data.wind.speed;
            windDeg = data.wind.deg;
            name = data.name;
            description = data.weather[0].description;
            icon = data.weather[0].icon;
            iconUrl = `<img src="http://openweathermap.org/img/wn/${icon}@2x.png">`;

            document.getElementById('temp').innerHTML = temp;
            document.getElementById('feelsLike').innerHTML = feelsLike;
            document.getElementById('pressure').innerHTML = pressure;
            document.getElementById('humidity').innerHTML = humidity;
            document.getElementById('windSpeed').innerHTML = windSpeed;
            document.getElementById('windDeg').innerHTML = windDeg;
            document.getElementById('name').innerHTML = name;
            document.getElementById('description').innerHTML = description;
            document.getElementById('iconUrl').innerHTML = iconUrl;
        });
    </script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/map.css')}}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.6/animate.min.css" />
@endsection