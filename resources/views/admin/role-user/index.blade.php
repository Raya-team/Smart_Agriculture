@extends('admin.master')

@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            نقش کاربران
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{route('users.index')}}">مقام ها</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">نقش کاربران</h1>
                        <div class="box-tools pull-right">
                            <a href="{{ route('users-role.create') }}" class="btn btn-app" style="background-color: #89ffae">
                                <i class="fa fa-plus"></i> ایجاد مقام
                            </a>
                        </div>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>کاربر</th>
                                <th>نقش ها</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if($user_login->id != $user->id)
                                    <tr>
                                        <td> {{ $user->username }} </td>
                                        <td>
                                            @if(count($user->roles))
                                                @foreach($user->roles as $role)
                                                    <span class="label" style="background-color: #00bcd4; color: #ffffff;">{{ $role->name }}</span>
                                                @endforeach
                                            @endif
                                            @if(!count($user->roles))
                                                <span class="label" style="background-color: #d42c2c; color: #ffffff;">بدون نقش</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('users-role.destroy' , ['user'=> $user->id]) }}" method="post">
                                                {{ method_field('delete') }}
                                                {{ csrf_field() }}
                                                <div class="btn-group btn-group-xs">
                                                    <a href="{{ route('users-role.edit', ['user' => $user->id]) }}" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
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