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
                        <h3 class="box-title">ویرایش نقش</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('roles.update' , ['role' => $role->id]) }}" method="post">
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('admin.section.errors')
                        <div class="box-body">
                            <div class="form-group">
                                <label for="role">نام نقش</label>
                                <input type="text" class="form-control" name="name" id="role" placeholder="نام نقش" value="{{ old('name' , $role->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="permissions">مجوز ها</label>
                                <select class="form-control chosen-select" multiple name="permissions[]" id="permissions" style="width: 100%;" data-placeholder="مجوز ها را انتخاب کنید">
                                    @foreach($permissions as $permission)
                                        <option value="{{ $permission->id }}" {{ in_array($permission->id , $role->permissions()->pluck('id')->toArray()) ? 'selected' : '' }}>{{$permission->label}}</option>
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