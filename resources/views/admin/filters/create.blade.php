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
                        <h3 class="box-title">ایجاد فیلتر</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('filters.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">نام فیلتر</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام فیلتر" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="username">معادل فارسی</label>
                                <input type="text" class="form-control" name="nickname" id="nickname" placeholder="معادل فارسی" value="{{ old('nickname') }}">
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">ثبت</button>
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
@endsection()
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
@endsection()