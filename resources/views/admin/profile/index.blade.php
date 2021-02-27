@extends('admin.master')

@section('main-content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            پروفایل کاربری
        </h1>
        <ol class="breadcrumb" dir="ltr">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
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
                        <img class="profile-user-img img-responsive img-circle" src="/user/dist/img/user2-160x160.jpg" alt="User profile picture">

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{ $user->username }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>آدرس</b> <a class="pull-left">مشهد، عبادی</a>
                            </li>
                            <li class="list-group-item">
                                <b>شماره تلفن</b> <a class="pull-left">09123456789</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">درباره من</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i> تحصیلات</strong>

                        <p class="text-muted">
                            لیسانس نرم افزار کامپیوتر
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> موقعیت</strong>

                        <p class="text-muted">ایران، تهران</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> توانایی ها</strong>

                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">laravel</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> یادداشت</strong>

                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#" data-toggle="tab">تنظیمات</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="">
                            <form role="form" class="form-horizontal" action="{{ route('admin.profile.update' , ['user' => $user->id]) }}" method="post">
                                @csrf
                                @method('PATCH')
                                @include('admin.section.errors')

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
                                    <label for="password" class="col-sm-2 control-label">رمز عبور :</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="اگه قصد تغییر رمز عبور را ندارید نیاز به وارد کردن این فیلد نیست">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation" class="col-sm-2 control-label">تکرار رمز عبور :</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="اگه قصد تغییر رمز عبور را ندارید نیاز به وارد کردن این فیلد نیست">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .swal-text{
            text-align: right;
        }
    </style>
@endsection()