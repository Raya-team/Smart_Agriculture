@extends('admin.master')
@section('title', 'لیست زمین ها')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست زمین ها
        </h1>
        <ol class="breadcrumb" dir="ltr">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{route('lands.index')}}">زمین ها</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">زمین ها</h1>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th> نام زمین</th>
                                <th>مساحت (هکتار)</th>
                                <th>نام کاربر</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lands as $land)
                                <tr>
                                    <td>{{ $land->name }}</td>
                                    <td>{{ round($land->area/10000, 2) }}</td>
                                    <td>{{ $land->user->name }}</td>
                                    <td>
                                        <form action="{{ route('lands.destroy' , ['land'=> $land->id]) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}

                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('lands.edit', ['land' => $land->id]) }}" class="btn btn-primary" data-tooltip="tooltip" data-placement="bottom" title="ویرایش"><i class="fa fa-fw fa-edit"></i></a>
{{--                                                <a href="{{ route('lands.show', ['land' => $land->id]) }}" class="btn btn-success" data-tooltip="tooltip" data-placement="bottom" title="نمایش"><i class="fa fa-fw fa-eye"></i></a>--}}
                                                <a href="{{ route('lands.heat', ['land' => $land->id]) }}" class="btn btn-success" data-tooltip="tooltip" data-placement="bottom" title="نمایش زمین"><i class="fa fa-fw fa-eye"></i></a>
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o" data-tooltip="tooltip" data-placement="bottom" title="حذف"></i></button>
                                            </div>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    @include('sweet::alert')
@endsection

@section('script')
    <!-- DataTables -->
    <script src="/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                deferRender:    true,
                scrollY:        450,
                scrollCollapse: true,
                scroller:       true,
                "language": {
                    "lengthMenu": "تعداد سطرها  _MENU_",
                    "zeroRecords": "نتیجه ای یافت نشد",
                    "info": "نمایش صفحه _PAGE_ از _PAGES_",
                    "infoEmpty": "موردی وجود ندارد",
                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "جست و جو : ",
                    paginate: {
                        first:    '«',
                        previous: '‹',
                        next:     '›',
                        last:     '»',
                    },
                    aria: {
                        paginate: {
                            first:    'صفحه نخست',
                            previous: 'قبلی',
                            next:     'بعدی',
                            last:     'صفحه آخر',
                        }
                    }

                }
            });
        });
    </script>
    <script>
        $(function () {
            $('[data-tooltip="tooltip"]').tooltip()
        })
    </script>
@endsection

@section('css')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection