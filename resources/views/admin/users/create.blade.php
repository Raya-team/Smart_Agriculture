@extends('admin.master')
@section('title', 'ایجاد کاربر')
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
                    <form role="form" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام و نام خانوادگی" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="username">نام کاربری</label>
                                <input type="text" class="form-control" name="username" id="username" placeholder="نام کاربری" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">شماره همراه</label>
                                <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control" name="phone_number" id="phone_number" placeholder="09" value="{{ old('phone_number') }}">
                            </div>
                            <div class="form-group">
                                <label for="image">تصویر پروفایل</label>
                                <input type="file" accept="image/png, image/jpg, image/jpeg" class="form-control" name="image" id="image" placeholder="تصویر پروفایل">
                            </div>
                            <div class="form-group">
                                <label>دسترسی به پنل</label>
                                <select class="form-control chosen-select" name="level" style="width: 100%;">
                                    <option value="0">کاربران</option>
                                    <option value="1">مدیریت</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">رمز عبور</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="رمز عبور">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">تکرار رمز عبور</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="تکرار رمز عبور">
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
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" integrity="sha512-yVvxUQV0QESBt1SyZbNJMAwyKvFTLMyXSyBHDO4BG5t7k/Lw34tyqlSDlKIrIENIzCl+RVUNjmCPG+V/GMesRw==" crossorigin="anonymous" />--}}
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
@endsection()