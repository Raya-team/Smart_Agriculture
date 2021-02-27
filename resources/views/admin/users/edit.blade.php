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
                    <form role="form" action="{{ route('users.update' , ['user' => $user->id]) }}" method="post">
                        @csrf
                        @method('PATCH')
                        @include('admin.section.errors')

                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">نام و نام خانوادگی</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام و نام خانوادگی" value="{{ old('name' , $user->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">نام کاربری</label>
                                <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="نام کاربری" value="{{ old('username' , $user->username) }}">
                            </div>
                            <div class="form-group">
                                <label for="level">سطح دسترسی</label>
                                <select class="form-control chosen-select" name="level" style="width: 100%;" id="level">
                                    <option value="0" @if($user->level == '0') selected="selected" @endif>کاربران</option>
                                    <option value="1" @if($user->level == '1') selected="selected" @endif>مدیریت</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">رمز عبور</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="رمز عبور">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">تکرار رمز عبور</label>
                                <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="تکرار رمز عبور">
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