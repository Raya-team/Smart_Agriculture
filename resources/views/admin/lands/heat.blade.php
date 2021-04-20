@extends('admin.master')
@section('title', 'اسموتینگ')
@section('main-content')
    <section class="content">
        <div class="container">
        </div>
        <div class="row">
            <!-- left column -->
            <div class="col-md-8 col-md-offset-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">نمایش زمین</h3>
                    </div>
                    <div class="box-body">
                        <label>فیلتر</label>
                        <select class="form-control chosen-select" style="width: 100%;" name="filter_id" id="filter_id" data-placeholder="فیلتر خود را انتخاب کنید">
                            <option value=""></option>
                            @foreach($filters as $filter)
                                <option value="{{ $filter->id }}" data-max="{{ $filter->max }}" data-min="{{ $filter->min }}" >{{$filter->nickname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="box-body">
                        <label for="mapid">نقشه</label>
                        <div id="mapid"></div>
                    </div>
                    <input type="hidden" id="eventoutput" name="points" value="{{ $land->points }}">
                    <input type="hidden" id="details" name="details" value="{{ $details }}">
                    <input type="hidden" id="filters" name="filters" value="{{ $filters }}">
                </div>
            </div>
            <!-- /.box -->
        </div>
        </div>
    </section>
@endsection
@section('script')
    <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-geodesy/v0.1.0/leaflet-geodesy.js'></script>
    <script src="{{ asset('js/leaflet/test.js') }}"></script>
    <script src="{{ asset('js/chosen.js') }}"></script>
    <script src="{{ asset('js/leaflet/land-heat.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
    <link rel="stylesheet" href="{{asset('css/map.css')}}">
@endsection