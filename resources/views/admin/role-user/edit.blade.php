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
                        <h3 class="box-title">ویرایش نقش کاربر : {{ $user->username }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('users-role.update' , ['user' => $user->id]) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <input type="hidden" value="{{ $user->id }}">
                            </div>
                            <div class="form-group">
                                <label>نقش ها</label>
                                <select class="form-control chosen-select" multiple style="width: 100%;" name="role_id[]" data-placeholder="نقش های مورد نظر را انتخاب کنید">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ in_array($role->id , $user->roles()->pluck('id')->toArray()) ? 'selected' : '' }}>{{$role->name}}</option>
                                    @endforeach
                                </select>
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
@endsection()
@section('css')
    <link rel="stylesheet" href="{{ asset('css/chosen.css') }}">
@endsection