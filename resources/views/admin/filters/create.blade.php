@extends('admin.master')
@section('title', 'ایجاد فیلتر')
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
                                <label for="name">نام</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام فیلتر" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="nickname">نام مستعار</label>
                                <input type="text" class="form-control" name="nickname" id="nickname" placeholder="نام مستعار" value="{{ old('nickname') }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="min">حداقل بازه</label>
                                        <input type="text" class="form-control" name="min" id="min" placeholder="حداقل بازه" oninput="this.value = this.value.replace(/[^-0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{ old('min') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="max">حداکثر بازه</label>
                                        <input type="text" class="form-control" name="max" id="max" placeholder="حداکثر بازه" oninput="this.value = this.value.replace(/[^-0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{ old('max') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="color-select">رنگ ها :</label>
                                        <select id="color-select">
                                            <option value="blue" style="background-color: #3b5dff; color: #fff;" data-color="blue">آبی</option>
                                            <option value="purple" style="background-color: #80045a;color: #fff" data-color="purple">بنفش</option>
                                            <option value="green" style="background-color: #069207;color: #fff" data-color="green">سبز</option>
                                            <option value="red" style="background-color: #ff091f;color: #fff" data-color="red">قرمز</option>
                                            <option value="orange" style="background-color: #ff8a09;color: #fff" data-color="orange">نارنجی</option>
                                        </select>
                                        <a class="btn" id="btnAdd" data-tooltip="tooltip" data-placement="bottom" title="اضافه کردن">
                                            <i class="fa fa-fw fa-plus-circle"></i>
                                        </a>
                                        <a class="btn del" id="btnremove" data-tooltip="tooltip" data-placement="bottom" title="انتخاب مجدد">
                                            <i class="fa fa-fw fa-refresh"></i>
                                        </a>
                                        <input type="hidden" value="" name="colors" id="colors">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <table id="persons" align="center">
                                    <tr>
                                        <td><b>رنگ های انتخابی</b></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>--}}

    <script src="{{ asset('js/filter/create.js') }}"></script>
    <script>
        $(function () {
            $('[data-tooltip="tooltip"]').tooltip()
        })
    </script>
@endsection()
@section('css')
    <style>
        #btnAdd{
            color: white;
            background-color: #0b97c4;
        }
        #btnAdd:hover{
            background-color: rgba(11, 151, 196, 0.8);
        }
        #btnremove{
            color: white;
            background-color:#b4031a ;
        }
        #btnremove:hover{
            background-color: rgba(180, 3, 26, 0.8);
        }
    </style>

{{--    <link rel="stylesheet" href="{{ asset('css/jquery-confirm.css') }}">--}}
@endsection