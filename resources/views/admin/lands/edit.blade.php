@extends('admin.master')
@section('title', 'ویرایش زمین')
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
                        <h3 class="box-title">ویرایش زمین</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('lands.update' , ['land' => $land->id]) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام زمین</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام و نام خانوادگی" value="{{ old('name' , $land->name) }}">
                            </div>
                            <div class="form-group">
                                <label>نام کاربر</label>
                                <select class="form-control chosen-select" style="width: 100%;" name="user_id">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="mapid">نقشه</label>
                                    <div id="mapid"></div>
                                </div>
                                <input type="hidden" id="eventoutput" name="points" value="{{ $land->points }}">
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">ویرایش</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/@turf/turf@5/turf.min.js"></script>
    <script>
        var polygon = turf.polygon([[[36.28504860143217, 59.62537555138496], [36.31191605745354, 59.56823193283226], [36.344858258590826, 59.634035973556], [36.31219271031355, 59.653835911312086]]]);
        var area = turf.area(polygon);

    </script>
    <script src="{{ asset('js/chosen.js') }}"></script>
    <script src="{{ asset('js/leaflet/land-edit.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/map.css')}}">
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
@endsection