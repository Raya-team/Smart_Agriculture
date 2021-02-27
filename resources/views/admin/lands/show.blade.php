@extends('admin.master')
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
                        </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/chosen.js') }}"></script>
    <script src="{{ asset('js/leaflet/land-show.js') }}"></script>

@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
    <link rel="stylesheet" href="{{asset('css/map.css')}}">
@endsection