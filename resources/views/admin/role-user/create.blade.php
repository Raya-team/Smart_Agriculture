@extends('admin.master')
@section('title', 'ایجاد مقام')
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
                        <h3 class="box-title">ایجاد نقش برای کاربر</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('users-role.store')}}" method="POST">
                        @csrf
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="user_id">کاربر :</label>
                                <select class="form-control chosen-select" style="width: 100%;" name="user_id" id="user_id">
                                    @foreach($users as $user)
                                        @if($user_login->id != $user->id)
                                            <option value="{{ $user->id }}">{{$user->username}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="role_id">نقش ها:</label>
                                <select class="form-control chosen-select" style="width: 100%;" multiple name="role_id[]" id="role_id" data-placeholder="نقش های مورد نظر را انتخاب کنید">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{$role->name}}</option>
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