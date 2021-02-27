@extends('admin.master')

@section('main-content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            لیست کاربران
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> داشبورد</a></li>
            <li><a href="{{route('users.index')}}">کاربران</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h1 class="box-title">کاربران</h1>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example" class="table table-bordered table-striped display">
                            <thead>
                            <tr>
                                <th>نام کاربری</th>
                                <th>نام و نام خانوادگی</th>
                                <th>ویرایش</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                @if($user->status == 1)
                                    <tr>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                            <span class="spanFormat">
                                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i></a>
                                            </span>
                                                <span class="spanFormat">
                                                <form action="{{ route('users.verified' , ['user'=> $user->id]) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('put') }}
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-check"></i></button>
                                                </form>
                                            </span>
                                                <span class="spanFormat">
                                                    <button class="btn btn-danger" data-userid={{$user->id}} data-toggle="modal" data-target="#delete"><i class="fa fa-fw fa-trash-o"></i></button>
                                            </span>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title text-center" id="myModalLabel">تایید حذف</h4>
                                                        </div>
                                                        <form action="{{route('users.destroy',['user' => $user->id])}}" method="post">
                                                            {{method_field('delete')}}
                                                            {{csrf_field()}}
                                                            <div class="modal-body">
                                                                <p class="text-center">
                                                                    آیا از حذف این کاربر اطمینان دارین؟
                                                                </p>
                                                                <input type="hidden" name="user_id" id="user_id" value="">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">خیر، منصرف شدم</button>
                                                                <button type="submit" class="btn btn-danger">بله، حذف شود</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- /.modal -->
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

    <script type="text/javascript">
        $('#delete').on('show.bs.modal', function (event) {
            console.log(event);
            var button = $(event.relatedTarget);
            var user_id = button.data('userid');
            var modal = $(this);
            modal.find('.modal-body #user_id').val(user_id);
        })
    </script>
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
    <style>
        .spanFormat
        {
            text-align: left;
            display: table-cell;
            min-width: 10px;
        }
    </style>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection()