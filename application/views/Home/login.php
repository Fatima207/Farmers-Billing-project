<body class="hold-transition login-page" style="background-color:#fffafa ;">
  <div class="login-box container d-flex-row align-items-center justify-content-center" >
  
<div class="login-logo">
      <a href="#"><img src="<?= base_url() ?>assets/dist/img/laravel3.png" alt="Laravel"></a>

    </div>
    <div class="card">   
    <?php if ($this->session->flashdata('status')) { ?>
                    <div class="alert alert-success">
                    <?= $this->session->flashdata('status');?>
                     <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    </div>
                <?php } ?> 
      <div class="card-body">
        <form action="<?php echo base_url('index.php/Home/login')?>" method="post">
            <label for="email">Email</label><br>
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <small><?php echo form_error('email')?></small>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <label for="email">Password</label><br>
          <div class="input-group mb-3">            
            <input type="password" name="password" class="form-control" placeholder="Password">
            <small><?php echo form_error('password')?></small>

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
              <button type="submit" class="btn btn-success">Log Now</button>
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