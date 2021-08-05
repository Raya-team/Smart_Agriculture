<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>داده ها</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/admin/dist/css/bootstrap-theme.css">
    <!-- Bootstrap rtl -->
    <link rel="stylesheet" href="/admin/dist/css/rtl.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/admin/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/admin/dist/css/skins/_all-skins.min.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">


    <!-- Full Width Column -->
    <div class="content-wrapper">

                <table class="table table-sm table-dark" style="background-color: rgba(31,31,31,0.05); color: #2c2c2c">
                    <thead>
                    <tr>
                        <th scope="col">شناسه</th>
                        <th scope="col">داده</th>
                        <th scope="col">زمان</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datum as $data)
                        <tr>
                            <th scope="row">{{ $data->id }}</th>
                            <td>{{ substr($data->data,38) }}</td>
                            <td>{{ \Morilog\Jalali\Jalalian::forge($data->created_at)->format('تاریخ: Y/m/d | ساعت: H:i') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        <!-- /.container -->
    </div>
    <div class="d-flex justify-content-center" style="text-align: center">
        {!! $datum->links() !!}
    </div>
    <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<style>
    .text-sm {
        font-size: 25px;
        /*color: white;*/
    }
</style>


<!-- jQuery 3 -->
<script src="/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admin/dist/js/demo.js"></script>

</body>
</html>
