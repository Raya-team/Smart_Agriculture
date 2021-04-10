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
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label for="mapid">نقشه</label>
                            <div id="mapid"></div>
                        </div>
                        <input type="hidden" id="eventoutput" name="points" value="{{ $land->points }}">
                            <input type="hidden" id="details" name="details" value="{{ $details }}">
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    {{--<script src="{{ asset('js/leaflet/test.js') }}"></script>--}}
    <script src="{{ asset('js/leaflet/land-heat.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/map.css')}}">
@endsection