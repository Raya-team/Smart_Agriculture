@extends('admin.master')
@section('title', 'لیست ایستگاه ها')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست ایستگاه ها
        </h1>
        <ol class="breadcrumb" dir="ltr">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{route('sensors.index')}}">ایستگاه ها</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">ایستگاه ها</h1>
                        @if (Gate::allows('create-sensor') || Auth::user()->level == 2)
                            <div class="box-tools pull-right">
                                <a href="{{ route('sensors.create') }}" class="btn btn-app" style="background-color: #89ffae">
                                    <i class="fa fa-plus"></i> ایجاد ایستگاه
                                </a>
                            </div>
                        @endif
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>شناسه</th>
                                <th>زمین</th>
                                @if (Gate::allows('edit-sensor') || Auth::user()->level == 2)
                                    <th>عملیات</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sensors as $sensor)
                                <tr>
                                    <td>{{ $sensor->serial }}</td>
                                    <td>{{ $sensor->land->name }}</td>
                                    @if (Gate::allows('edit-sensor') || Auth::user()->level == 2)
                                        <td>
                                            <form action="{{ route('sensors.destroy' , ['sensor'=> $sensor->id]) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}

                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('sensors.edit', ['sensor' => $sensor->id]) }}" class="btn btn-primary" data-tooltip="tooltip" data-placement="right" title="ویرایش"><i class="fa fa-fw fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger" data-tooltip="tooltip" data-placement="left" title="حذف"><i class="fa fa-fw fa-trash-o"></i></button>
                                                </div>

                                            </form>
                                        </td>
                                    @endif
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
    <style>
        .swal-button {
            padding: 7px 19px;
            border-radius: 2px;
            background-color: #4962B3;
            font-size: 12px;
            border: 1px solid #3e549a;
            text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
        }
        .swal-button:not([disabled]):hover {
            background-color: rgba(73, 98, 179, 0.9);
        }
    </style>
@endsection