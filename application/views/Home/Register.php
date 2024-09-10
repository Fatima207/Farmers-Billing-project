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
    <div class="login-box" style="margin-left:580px; margin-top:100px;">
        <div class="login-logo">
            <a href="<?php echo base_url() ?>index.php/Home/Document"><img src="<?= base_url() ?>assets/dist/img/laravel3.png" alt="Laravel"></a>

        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body">

            <form action="<?php echo base_url("index.php/Home/Register")?>" method="post">
                <div class="form-group  ">
                    <label for="first_name" class="" name="first_name">First Name</label>
                    <input type="text" name="first_name" placeholder="Name" class="form-control">
                    <span class="fas fa-user " style="  float: right;
        margin-right: 6px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        color: black;"></span> <small><?php echo form_error('first_name')?></small>


                </div>
                <div class="form-group  ">
                    <label for="last_name" class="" name="last_name">Last Name</label>
                    <input type="text" name="last_name" placeholder="last Name" class="form-control ">
                    <small><?php echo form_error('last_name')?></small>

                </div>
                <div class="form-group">
                    <label for="email" class="">Email</label><br>
                    <input type="email" name="email" placeholder="Email" class="form-control">
                    <span class="fas fa-envelope " style="  float: right;
        margin-right: 6px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        color: black;"></span>
         <small><?php echo form_error('email')?></small>

                </div>

                <div class="form-group">
                    <label>Role</label>
                    <select class="form-control"  name="role">
                        <option value="admin">Admin</option>
                        <option value="super admin">Super Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="password" class="">Password</label><br>
                    <input type="password" name="password" placeholder="Password" class="form-control">
                     <span class="fas fa-lock " style="  float: right;
        margin-right: 6px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        color: black;"></span>
         <small><?php echo form_error('password')?></small>

                </div>

                <div class="form-group">
                    <label for="password" class="" >Confirm Password</label><br>
                    <input type="password" name="cinfirm_password" placeholder="Confirm Password" class="form-control">
                     <span class="fas fa-lock " style="  float: right;
        margin-right: 6px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        color: black;"></span>
          <small><?php echo form_error('cinfirm_password')?></small>

                </div>
                <div class="col-4 "  style="float:right;">
              <button type="submit" class="btn btn-dark btn-block">Register</button>
            </div>

</form>
<p class="mb-1 text-center mt-4 ml-5">
          <a href="<?php echo base_url() ?>index.php/Home/Login"   style="color:black;" ><u>Already Registered ?</u></a>
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