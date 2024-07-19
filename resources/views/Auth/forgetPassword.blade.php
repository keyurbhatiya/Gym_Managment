<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Forget Password')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Dark mode style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte-dark.min.css') }}">
</head>

<body class="hold-transition login-page dark-mode">
    <div class="login-box">
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a href="#" class="h1"><b>GYM</b>Management</a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
          <form action="{{ route('forget.password.post') }}" method="post">
            @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" placeholder="Email" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            @if ($errors->has('email'))
              <div class="alert alert-danger" role="alert">
                {{ $errors->first('email') }}
              </div>
            @endif
            @if (Session::has('message'))
              <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
              </div>
            @endif
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
          <p class="mt-3 mb-1">
            <a href="{{ route('login') }}">Login</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
