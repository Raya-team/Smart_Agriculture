@extends('user.master')
@section('title','زمین ها')
@section('main-content')
    <!-- Content Header (Page header) -->
    @include('sweet::alert')
    <section class="content-header">
        <h1>
            لیست زمین ها
        </h1>
        <ol class="breadcrumb" dir="ltr">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{ route('user.lands') }}">زمین ها</a></li>
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
                                <th>ایستگاها</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lands as $land)
                                <tr>
                                    <td>{{ $land->name }}</td>
                                    <td>{{ round($land->area/10000, 2) }}</td>
                                    <td>
                                        @if(count($land->sensors))
                                            @foreach($land->sensors as $sensor)
                                                <span class="label" style="background-color: #00bcd4; color: #fff" >{{ $sensor->serial }}</span>
                                            @endforeach
                                        @else
                                            <span class="label" style="background-color: #d42929; color: #fff" >بدون ایستگاه فعال</span>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-xs">
{{--                                            <a href="{{ route('user.land.show', ['land' => $land->id]) }}" class="btn btn-success" data-tooltip="tooltip" data-placement="bottom" title="نمایش"><i class="fa fa-fw fa-eye"></i></a>--}}
                                            <a href="{{ route('user.land.heat', ['land' => $land->id]) }}" class="btn btn-success" data-tooltip="tooltip" data-placement="bottom" title="نمایش"><i class="fa fa-fw fa-eye"></i></a>
                                        </div>
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
@endsection

@section('script')
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