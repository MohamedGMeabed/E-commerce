<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminL | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/plugins/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/plugins/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/css/plugins/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page " style="background-size: cover;background-image: url({{asset('assets/admin/images/background2.jpg')}})">
  <div class="login-logo">
      Admin
  </div>
  <!-- /.login-logo -->
  <div class="card" style="width: 600px">
    <div class="card-body login-card-body" style="background-size: cover;background-image: url({{asset('assets/admin/images/background.jpg')}})">
      <p class="login-box-msg">Sign in </p>

      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
      <form action="{{route('admin.login')}}" method="post">
        @csrf
        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">Mail Address</label>
          <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>
      <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
          <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>
      <div class="form-group row">
          <div class="col-md-6 offset-md-4">
              <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember_me" id="remember_me" {{ old('remember_me') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember_me">
                      Remember Me
                  </label>
              </div>
          </div>
      </div>
          <div class="col-4 m-auto">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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
<script src="{{asset('assets/admin/js/jquery-3.3.1.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/admin/js/adminlte.min.js')}}"></script>
</body>
</html>