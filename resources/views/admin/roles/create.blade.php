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
                        <h3 class="box-title">ایجاد نقش</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('roles.store')}}" method="POST">
                        @csrf
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="role">نام نقش</label>
                                <input type="text" class="form-control" name="name" id="role" placeholder="نام نقش را وارد کنید" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="permission">مجوز ها</label>
                                <select class="form-control chosen-select" multiple style="width: 100%;" name="permissions[]" id="permission" data-placeholder="مجوز های را انتخاب کنید">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}"> {{$permission->label}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" id="btn-map">ثبت</button>
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
@endsection
@section('css')
    <link rel="stylesheet" href="{{asset('css/chosen.css')}}">
@endsection