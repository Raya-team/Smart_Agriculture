@extends('user.master')
@section('title', 'پروفایل')
@section('main-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            پروفایل کاربری
        </h1>
        <ol class="breadcrumb" dir="ltr">
            <li><a href="{{ route('user.dashboard') }}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li class="active"> پروفایل</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        @if(!file_exists(public_path() . Auth::user()->image))
                            <img class="profile-user-img img-responsive img-circle" src="/upload/images/default-profile.png" alt="User profile picture" style="height: 100px;">
                        @else
                            <img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->image }}" alt="User profile picture" style="height: 100px;">
                        @endif

                        <h3 class="profile-username text-center">{{ $user->username }}</h3>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>نام و نام خانوادگی</b> <a class="pull-left">{{ $user->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>شماره تلفن</b> <a class="pull-left">{{ $user->phone_number }}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#" data-toggle="tab">تنظیمات</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="">
                            <form role="form" class="form-horizontal" action="{{ route('user.profile.update' , ['user' => $user->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @include('admin.section.errors')
                                @if(Session::has('current_password'))
                                    <div class="alert alert-danger">
                                        <ul>
                                            <li>{{ Session::get('current_password') }}</li>
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">نام و نام خانوادگی :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="name" name="name" placeholder="نام و نام خانوادگی" value="{{ old('name' , $user->name) }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="username" class="col-sm-2 control-label">نام کاربری :</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="username" name="username" placeholder="نام کاربری" value="{{ old('username' , $user->username) }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">تصویر پروفایل :</label>
                                    <div class="col-sm-10">
                                        <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control" id="image" name="image">
                                    </div>
                                </div>

                                <h6 style="text-align: center;color: rgba(255,0,22,0.5);">اگر قصد تغییر رمز عبور خود ندارید میتوانید فیلد های زیر را خالی بگذارید</h6>

                                <div class="form-group">
                                    <label for="current_password" class="col-sm-2 control-label">رمز عبور فعلی :</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="رمز عبور فعلی را وارد فرمایید">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label">رمز عبور :</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="رمز عبور جدید را وارد فرمایید">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" class="col-sm-2 control-label">تکرار رمز عبور :</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="رمز عبور را مجددا وارد فرمایید">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">ویرایش</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweet::alert')
@endsection

@section('css')
    <style>
        .swal-text{
            text-align: right;
        }
    </style>
@endsection()