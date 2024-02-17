<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>xxx後台管理系統</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/css/fontawesome/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/admin"><b>Admin可以放Logo</b>login</a>
  </div>
  <!-- /.login-logo -->
  <div class="card"><!-- boots card 會像卡片一樣 -->
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="/admin/doLogin" method="post">
        {{ csrf_field() }}
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="managerId" autofocus value="{{ old('managerId') }}" required>
          <!-- {{ old('managerId') }} 若送出後錯誤,無法登入,可以保存原本輸入錯誤的資料給使用者更改 -->
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @if ($errors->has("account"))
            <div class="text-danger">{{ $errors->first("account") }}</div>
        @endif
        <div class="input-group mb-3">
          <input type="password" class="form-control"  name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if ($errors->has("password"))
            <div class="text-danger">{{ $errors->first("password") }}</div>
        @endif
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.min.js"></script>
</body>
</html>