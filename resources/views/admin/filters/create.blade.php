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
                                <label for="nickname">معادل فارسی</label>
                                <input type="text" class="form-control" name="nickname" id="nickname" placeholder="معادل فارسی" value="{{ old('nickname') }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="min">حداقل بازه</label>
                                        <input type="text" class="form-control" name="min" id="min" placeholder="حداقل بازه" value="{{ old('min') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="max">حداکثر بازه</label>
                                        <input type="text" class="form-control" name="max" id="max" placeholder="حداکثر بازه" value="{{ old('max') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="color">رنگ ها :</label>
                                        <select id="color-select" >
                                            <option value="blue" style="background-color: #3b5dff; color: #fff;" data-color="blue">آبی</option>
                                            <option value="purple" style="background-color: #80045a;color: #fff" data-color="purple">بنفش</option>
                                            <option value="green" style="background-color: #069207;color: #fff" data-color="green">سبز</option>
                                            <option value="red" style="background-color: #ff091f;color: #fff" data-color="red">قرمز</option>
                                            <option value="orange" style="background-color: #ff8a09;color: #fff" data-color="orange">نارنجی</option>
                                        </select>
                                        <input type="button" id="btnAdd" class="btn"  value="اضافه کردن">
                                        <input type="button" id="btnremove" class="btn del"  value="انتخاب مجدد">
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
    <script src="../../../js/filter/create.js"></script>
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
@endsection