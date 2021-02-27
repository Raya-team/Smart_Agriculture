<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ثبت نام | کنترل پنل</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../admin/dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="../../admin/dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../admin/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../../admin/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="../../admin/index2.html"><b>ثبت نام در سایت</b></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">ثبت نام کاربر جدید</p>

        <form action="{{ route('user.register') }}" method="post">
            @csrf
            @if(count($errors)>0)

                <ul style="color: red">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            @endif
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="نام و نام خانوادگی" name="name" value="{{ old('name') }}" required>
                <span class="fa fa-vcard-o form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="نام کاربری" name="username" value="{{ old('username') }}" required>
                <span class="fa fa-user-circle form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="رمز عبور" name="password" required>
                <span class="fa fa-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="تکرار رمز عبور" required>
                <span class="fa fa-key form-control-feedback"></span>
            </div>
            <!-- /.col -->
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">ثبت نام</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{route('login')}}" class="btn btn-danger btn-block btn-flat" style="margin-top: 5px">{{ __('من قبلا ثبت نام کرده ام') }}</a>
                </div>
            </div>

            <!-- /.col -->
        </form>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="../../admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../admin/plugins/iCheck/icheck.min.js"></script>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
</body>
</html>
