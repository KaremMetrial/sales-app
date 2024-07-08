<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href={{ asset("admin-assets/css/bootstrap_rtl-v4.2.1/bootstrap.min.css") }}>
    <link rel="stylesheet" href={{ asset("admin-assets/css/bootstrap_rtl-v4.2.1/custom_rtl.css") }}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset("admin-assets/plugins/fontawesome-free/css/all.min.css") }}>
    <!-- Ionicons -->
    <link rel="stylesheet" href={{ asset("admin-assets/fonts/ionicons/2.0.1/css/ionicons.min.css") }}>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href={{ asset("admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset("admin-assets/dist/css/adminlte.min.css") }}>
    <!-- Google Font: Source Sans Pro -->
    <link href={{ asset("admin-assets/fonts/SansPro/SansPro.min.css") }} rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b></a>
    </div>


    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">تسجيل الدخول</p>
            <form action="{{ route('adminlogin') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" id="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="كلمة المرور">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                @error('username')
                <div class="text-danger row">{{ $message }}</div>
                @enderror
                @error('password')
                <div class="text-danger row">{{ $message }}</div>
                @enderror
            </form>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src={{ asset("admin-assets/plugins/jquery/jquery.min.js") }}></script>
<!-- Bootstrap 4 -->
<script src={{ asset("admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}></script>

</body>
</html>
