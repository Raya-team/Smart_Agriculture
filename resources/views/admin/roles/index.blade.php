@extends('admin.master')
@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست نقش ها
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{route('roles.index')}}">نقش ها</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">نقش ها</h1>
                        <div class="box-tools pull-right">
                            <a href="{{ route('roles.create') }}" class="btn btn-app" style="background-color: #89ffae">
                                <i class="fa fa-plus"></i> ایجاد نقش
                            </a>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>نقش </th>
                                <th>مجوز</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <span class="label" style="background-color: #00bcd4; color: #fff" >{{ $permission->label }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <form action="{{ route('roles.destroy' , ['role'=> $role->id]) }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="btn-group btn-group-xs">
                                                <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
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
@endsection

@section('css')
    <script src="{{ asset('js/app.js') }}"></script>
@endsection