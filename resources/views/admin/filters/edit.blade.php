@extends('admin.master')
@section('title', 'ویرایش پارامتر')
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
                        <h3 class="box-title">ویرایش پارامتر</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{route('filters.update', ['filter' => $filter->id])}}" method="post" >
                        @csrf
                        {{ method_field('PATCH') }}
                        @include('admin.section.errors')
                        @if(Session::has('colors'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ Session::get('colors') }}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">نام پارامتر</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="نام پارامتر" value="{{ old('name', $filter->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="nickname">نام مستعار</label>
                                <input type="text" class="form-control" name="nickname" id="nickname" placeholder="نام مستعار" value="{{ old('nickname', $filter->nickname) }}">
                            </div>
                            <div class="form-group">
                                <label for="nickname">شاخص</label>
                                <input type="text" class="form-control" name="index" id="index" placeholder="شاخص اندازه گیری" value="{{ old('nickname', $filter->index) }}">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="min">حداقل بازه</label>
                                        <input type="text" class="form-control" name="min" id="min" placeholder="حداقل بازه" oninput="this.value = this.value.replace(/[^-0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{ old('min',$filter->min) }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="max">حداکثر بازه</label>
                                        <input type="text" class="form-control" name="max" id="max" placeholder="حداکثر بازه" oninput="this.value = this.value.replace(/[^-0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" value="{{ old('max',$filter->max) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="color-select">رنگ ها :</label>
                                        <input type="color" id="color-select" value="#ff0000">
                                        <a class="btn" id="btnAdd" data-tooltip="tooltip" data-placement="bottom" title="اضافه کردن">
                                            <i class="fa fa-fw fa-plus-circle"></i>
                                        </a>
                                        <a class="btn del" id="btnremove" data-tooltip="tooltip" data-placement="bottom" title="انتخاب مجدد">
                                            <i class="fa fa-fw fa-refresh"></i>
                                        </a>
                                        <input type="hidden" value="{{ $filter->colors }}" name="colors" id="colors">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="color-error" style="display: none;">
                                <div class="alert alert-warning" role="alert" style="background-color: rgba(243,156,18,0.51) !important; color: red !important;">
                                    رنگ انتخابی شما تکراری است
                                </div>
                            </div>
                            <div class="form-group" id="color-error-count" style="display: none;">
                                <div class="alert alert-warning" role="alert" style="background-color: rgba(243,156,18,0.51) !important; color: red !important;">
                                    نمی‌توانید بیشتر از 5 رنگ انتخاب کنید
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <table id="persons" align="center" style="width: 100%;">
                                            <tr style="text-align: center">
                                                <td><b>رنگ های انتخابی</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="canvas-interactive-wrapper">
                                                        <canvas id="granim-canvas"></canvas>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">ویرایش</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script src="{{asset('js/filter/edit.js')}}"></script>
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

        .canvas-interactive-wrapper {
            position: relative;
            height: 50px;
            width: 100%;
            text-align: center;
        }

        .canvas-interactive-wrapper canvas {
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
@endsection