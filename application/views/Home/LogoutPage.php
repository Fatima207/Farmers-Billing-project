<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page" style="background-color:#fffafa ;">
  <div class="login-box" style="margin-left:580px; margin-top:150px;">
    <div class="login-logo">
      <a href="<?php echo base_url("index.php/Home/LogoutPage") ?>index.php/Home/Document"><img src="<?= base_url() ?>assets/dist/img/laravel3.png" alt="Laravel"></a>

    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">

        <form action="#" method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary mt-3">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4 ">
              <button type="submit" value="Login" class="btn btn-dark btn-block">Log In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <p class="mb-1 text-center mt-3">
          <a href="forgot-password.html" style="color: black;"><u> forgot password ?</u></a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->

  <!-- original path of admin lte  -->
  <!-- <script src="../../plugins/jquery/jquery.min.js"></script> -->

  <!-- our projects path  -->
  <script src="../../../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../../assets/dist/js/adminlte.min.js"></script>
</body>

</html>