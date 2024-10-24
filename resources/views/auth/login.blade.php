<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{ url('/assets/images/logo.jpg') }}">
  <title>E Service - Visa | {{ $data['page_title'] }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('/assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/assets/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__shake" src="{{ url('/assets/images/logo.jpg') }}" alt="logo" height="60" width="60">
</div>
<style>
  .float-right {
    float: right !important;
  }
  .invalid-feedback {
    display: block !important;
  }
</style>
<div class="login-box">
  <div class="login-logo">
    <img src="{{ url('/assets/images/logo.jpg') }}" width="120" class="rounded-circle">
  </div>
  <div class="login-logo">
    <a href="#">E Service - Visa</a>
  </div>
  <div class="error-message"></div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('attempt.login') }}" id="login-form">
        <div class="input-group mb-3">
          <input type="text" name="login" id="login" class="form-control" placeholder="Username or Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary float-right" id="btn-sign-in">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('/assets/dist/js/adminlte.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ url('/assets/js/custom.js') }}"></script>
<!-- Page Scripts -->
<script src="{{ url('/assets/js/auth.js') }}"></script>
</body>
</html>
