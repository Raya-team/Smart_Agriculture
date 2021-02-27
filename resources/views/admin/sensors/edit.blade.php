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
                        <h3 class="box-title">ایجاد کاربر</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('sensors.update' , ['sensor' => $sensor->id]) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام زمین</label>
                                <input type="text" class="form-control" name="serial" id="name" placeholder="نام و نام خانوادگی" value="{{ $sensor->serial }}">
                            </div>
                            <div class="form-group">
                                <label>نام کاربر</label>
                                <select class="form-control chosen-select" style="width: 100%;" name="land_id" id="land_id">
                                    @foreach($lands as $land)
                                        <option value="{{ $land->id }}" {{ in_array($land->id , $sensor->land()->pluck('id')->toArray()) ? 'selected' : '' }} data-points="{{ $land->points }}" >{{$land->name}}</option>
                                    @endforeach
                                        <input type="hidden" value="{{ $sensor->land->points }}" id="points">
                                </select>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="mapid">نقشه</label>
                                <div id="mapid"></div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">بروزرسانی</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{ asset('js/chosen.js') }}"></script>
    <script src="{{ asset('js/leaflet/sensor-edit.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('css/map.css') }}">
@endsection