<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | {{ $site_name }} </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page text-sm">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img height="100" class="my-1" src="{{ asset($logo) }}" alt="{{ __('Logo') }}">
      <a class="h1 d-block mt-2 mb-0">{{ $site_name }}</a>
    </div>
    <div class="card-body">
      <x-widgets.flash-message />
      <p class="login-box-msg">{{ __('LOGIN PORTAL') }}</p>
      <form action="{{ route('login') }}" method="POST">
        @csrf
          <div class="input-group mb-3">
            <input
              @class(['form-control', 'is-invalid' => session()->has('error')])
              type="text"
              name="username"
              placeholder="Username"
              value="{{ old('username') }}"
              required
          >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @if(session('error')) <div class="invalid-feedback">{{ session('error') }}</div> @endif
        </div>
        <div class="input-group mb-3">
          <input
            @class(['form-control', 'is-invalid' => session()->has('error')])
            type="password"
            name="password"
            placeholder="Password"
            required
          >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" @checked(old('remember') == 'on' ? true : false)>
              <label for="remember">{{ __('Tetap Masuk') }}</label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Login') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="text-sm">
        <p class="m-0 mt-4 text-center"><x-copyright /></p>
      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>

<!-- App -->
<script src="{{ asset('assets/admin/js/on-submit.js') }}"></script>

</body>
</html>
