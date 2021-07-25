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
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$total_area}}</h3>
                        <p style="font-size:18px"><b>مساحت کل</b></p>
                    </div>
                    <div class="icon" style="padding-top: 12px">
                        <i class="fa fa-fw fa-area-chart"></i>
                    </div>
                    <span class="small-box-footer" style="background-color: #f39c12 ; color: #f39c12; height: 30px"></span>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$lands_count}}</h3>
                        <p style="font-size:18px"><b>زمین ها</b></p>
                    </div>
                    <div class="icon" style="padding-top: 12px">
                        <i class="fa fa-fw fa-globe" style="margin-left: -15px"></i>
                    </div>
                    <span class="small-box-footer" style="background-color: #00c0ef; color: #00c0ef; height: 30px"></span>
                </div>
            </div>
            <div class="col-lg-4 col-xs-4">
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
                        <div id="world-map" style="height: 520px; width: 100%;"></div>
                    </div>
                </div>
            </section>
            <section class="col-lg-6 connectedSortable">
                <div class="box box-solid bg-teal-gradient" style="background: -webkit-gradient(linear, right bottom, right top, color-stop(0, #39cccc), color-stop(1, #3F51B5)) !important;">
                    <div class="box-header">
                        <i class="fa fa-th"></i>
                        <h3 class="box-title">وضعیت آب و هوا</h3>
                        <div class="box-tools pull-left">
                            <button type="button" class="btn bg-teal btn-sm" data-widget="collapse" style="background-color: #3e53b5 !important"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body border-radius-none">
                        <div id="weather_wrapper">
                            <div class="weatherCard">
                                <div class="currentTemp">
                                    <span class="temp"><span id="temp"></span>&deg;</span>
                                    <span class="location"><span id="name"></span></span>
                                </div>
                                <div class="currentWeather">
                                    <span class="conditions"><span id="iconUrl"></span></span>
                                    <div class="info" style="height: 85px">
                                        <span id="humidity" class="humidity"></span>
                                        <span class="wind"><span id="windSpeed"></span></span>
                                    </div>
                                    <div class="info" style="height: 150px">
                                        <span class="pressure"><span id="pressure"></span></span>
                                        <span class="windDeg"><span id="windDeg"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chart" id="line-chart" style="height: 320px;">
                            {{--<div>دمای محسوس : <span id="feelsLike"></span></div>--}}
                            {{--<div>وضعیت : <span id="description"></span></div>--}}
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
        var ApiKey = '72bc22de4339f28f95a619c28a70b30a';
        var City = 'Mashhad';
        var Lang = 'fa';
        var Units = 'metric';
        var Cnt = 4;

        // const url = `https://api.openweathermap.org/data/2.5/weather?q=Mashhad&lang=fa&units=metric&appid=72bc22de4339f28f95a619c28a70b30a`;
        const url = `https://api.openweathermap.org/data/2.5/weather?q=${City}&lang=${Lang}&units=${Units}&appid=${ApiKey}`;

        // var url2 = "https://api.openweathermap.org/data/2.5/onecall?lat=36.28504860143217&lon=59.62537555138496&appid=72bc22de4339f28f95a619c28a70b30a&units=metric&lang=fa"
        // const url3 = `api.openweathermap.org/data/2.5/forecast/daily?q=${City}&cnt=${Cnt}&lang=${Lang}&units=${Units}&appid=${ApiKey}`;
        // $.getJSON(url3,function (data) {
        //     console.log(data);
        // });
        var temp,feelsLike,pressure,humidity,windSpeed,windDeg,name,description,icon,iconUrl
        $.getJSON(url, function (data) {
            temp = `${Math.round(data.main.temp)}`;
            feelsLike = `${Math.round(data.main.feels_like)} درجه `;
            pressure = `${data.main.pressure} bar`;
            humidity = `${data.main.humidity} درصد `;
            windSpeed = `${data.wind.speed} MPH`;
            windDeg = data.wind.deg;
            switch (true) {
                case (windDeg == 0 || windDeg == 360): $('.windDeg').append('<style>.windDeg:before{transform:rotate(0deg);}</style>');break;
                case (0<windDeg && windDeg<90): $('.windDeg').append('<style>.windDeg:before{transform:rotate(45deg);}</style>');break;
                case (windDeg == 90): $('.windDeg').append('<style>.windDeg:before{transform:rotate(90deg);}</style>');break;
                case (90<windDeg && windDeg<180): $('.windDeg').append('<style>.windDeg:before{transform:rotate(135deg);}</style>');break;
                case (windDeg == 180): $('.windDeg').append('<style>.windDeg:before{transform:rotate(180deg);}</style>');break;
                case (180<windDeg && windDeg<270): $('.windDeg').append('<style>.windDeg:before{transform:rotate(225deg);}</style>');break;
                case (windDeg == 270): $('.windDeg').append('<style>.windDeg:before{transform:rotate(270deg);}</style>');break;
                case (270<windDeg && windDeg<360): $('.windDeg').append('<style>.windDeg:before{transform:rotate(313deg);}</style>');break;
            }
            switch (true) {
                case (windDeg == 0 || windDeg == 360): windDeg = 'شمال';break;
                case (0<windDeg && windDeg<90): windDeg = 'شمال شرقی';break;
                case (windDeg == 90): windDeg = 'شرق';break;
                case (90<windDeg && windDeg<180): windDeg = 'جنوب شرقی';break;
                case (windDeg == 180): windDeg = 'جنوب';break;
                case (180<windDeg && windDeg<270): windDeg = 'جنوب غربی';break;
                case (windDeg == 270): windDeg = 'غرب';break;
                case (270<windDeg && windDeg<360): windDeg = 'شمال غربی';break;
            }

            name = data.name;
            description = data.weather[0].description;
            icon = data.weather[0].icon;
            iconUrl = `<img src="http://openweathermap.org/img/wn/${icon}@2x.png">`;

            document.getElementById('temp').innerHTML = temp;
            // document.getElementById('feelsLike').innerHTML = feelsLike;
            document.getElementById('pressure').innerHTML = pressure;
            document.getElementById('humidity').innerHTML = humidity;
            document.getElementById('windSpeed').innerHTML = windSpeed;
            document.getElementById('windDeg').innerHTML = windDeg;
            document.getElementById('name').innerHTML = name;
            // document.getElementById('description').innerHTML = description;
            document.getElementById('iconUrl').innerHTML = iconUrl;
        });
    </script>
@endsection
@section('css')
    {{--<link rel="stylesheet" href="{{asset('css/weather.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/map.css')}}">

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.6/animate.min.css" />
@endsection
<style>
    @import url(https://lib.arvancloud.com/ar/weather-icons/2.0.9/css/weather-icons-wind.min.css);
    @import url(https://lib.arvancloud.com/ar/weather-icons/2.0.9/css/weather-icons.min.css);
    @import url(https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.12/css/weather-icons.min.css);
    #mapid {
        height: 900px;
    }
    #weather_wrapper{
        width: 400px;
        margin: auto;
    }
    .weatherCard{
        width: 400px;
        height: 200px;
        position: relative;
    }
    .currentTemp{
        width: 220px;
        height: 200px;
        position: absolute;
        top: 0;
        left: 0;
    }
    .currentWeather{
        width: 180px;
        height: 270px;
        margin: 0;
        position: absolute;
        top: 0;
        right: 0;
    }
    .temp{
        font-size: 80px;
        text-align: center;
        display: block;
        font-weight: 300;
        color: rgb(255, 255, 255);
        padding: 20px 0 0;
    }
    .location{
        color: rgb(255, 255, 255);
        text-align: center;
        text-transform: uppercase;
        font-weight: 700;
        font-size: 30px;
        display: block;
    }
    .conditions{
        font-family: weathericons;
        font-size: 80px;
        display: block;
        padding: 20px 0 0;
        text-align: center;
    }
    .info{
        width: 180px;
        height: 50px;
        position: absolute;
        bottom: 0;
        right: 0;
        font-weight: 700;
        color: rgb(255, 255, 255);
        text-align: center;
    }
    .wind {
        width: 50%;
        right: -10px;
        position: absolute;
        word-spacing: 60px;
        top: 3px;
    }
    .wind::before{
        display: block;
        content: '\f050';
        font-family: weathericons;
        font-size: 25px;
        left: -10px;
        position: absolute;
    }
    .humidity {
        width: 50%;
        position: absolute;
        left: 10px;
        word-spacing: 60px;
        top: 3px;
    }
    .humidity::before{
        display: block;
        content: '\f07a';
        font-family: weathericons;
        font-size: 25px;
        left: 6px;
        position: absolute;
    }
    .pressure {
        width: 50%;
        position: absolute;
        left: 10px;
        word-spacing: 60px;
        top: 3px;
    }
    .pressure::before{
        display: block;
        content: '\f079';
        font-family: weathericons;
        font-size: 25px;
        left: 6px;
        position: absolute;
    }
    .windDeg {
        width: 50%;
        right: -10px;
        position: absolute;
        word-spacing: 60px;
        top: 3px;
    }
    .windDeg::before{
        display: block;
        content: '\f0b1';
        font-family: weathericons;
        font-size: 32px;
        left: -10px;
        position: absolute;
    }
</style>
