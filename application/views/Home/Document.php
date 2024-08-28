<div class="wrapper">

  <?php $this->load->view('partials/left_sidebar') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper ">
    <br>
    <br>

    <!-- login and register options  -->
    <div style="float:right;margin-right:8px;">
      <a href="<?= base_url() ?>index.php/Home/LogoutPage" class="mx-3"  style="color:black;">Log in</a>
      <a href="<?= base_url() ?>index.php/Home/Register" style="color:black;">Register</a>
    </div>
    <div class="login-logo">
      <a href=""><img src="<?= base_url() ?>assets/dist/img/laravel3.png" alt="Laravel"></a>

    </div>

    <br>
    <br>
    <br>

    <!-- Main content -->
    <section class="content px-5">
      <div class="container-fluid">
        <div class="row">
          <!-- FIRST COLUMN          -->
          <div class="col-md-6">
            <!-- Laravel Documentation -->
             <a href="https://laravel.com/docs">
            <div class="card " style="border-radius:15px; min-height: 300px; height: 300px;padding:10px; max-height: 250px; max-width: 100%;">

              <div class="card-body">
                <div class="flex mb-5 " style="height:50px;width:50px;background-color:#ffcad2;border-radius:50%;">
                  <i class="fa fa-book ml-3 mt-3" style="font-size:20px; color:red;" aria-hidden="true"></i>
                </div>
                <div class="d-flex justify-content-between">
                  <h3 class="mt-6" style="color:black;">Documentation</h3>
                  <i class="fa fa-arrow-right" style="color:red;" aria-hidden="true"></i>

                </div>
                <p style="font-size:15px;color:black;">
                  Laravel has wonderful documentation covering every aspect of the framework.
                  Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.</p>
              </div>

              <!-- /.card-body -->
            </div>
</a>


            <!-- Laravel news -->
             <a href="https://laravel-news.com">
            <div class="card" style="border-radius:15px;min-height:300px;padding:10px; height: 300px; max-height: 250px; max-width: 100%;">

              <div class="card-body">
                <div class="flex mb-5 " style="height:50px;width:50px;background-color:#ffcad2;border-radius:50%;">
                <i class="fa-regular fa-newspaper" style="font-size:20px; color:red;" aria-hidden="true"></i>
                </div>
                <div class="d-flex justify-content-between">

                  <h3 class="mt-6" style="color:black;">Laravel News</h3>
                  <i class="fa fa-arrow-right" style="color:red;" aria-hidden="true"></i>

                </div>

                <p style="font-size:15px; color:black;">
                  Laravel News is a community driven portal and newsletter aggregating all of the latest
                  and most important news in the Laravel ecosystem, including new package releases and tutorials.</p>
              </div>
            </div>
</a>
          </div>
          <!-- SECOND COLUMN -->

          <div class="col-md-6">
            <!-- Laracasts -->
             <a href="https://laracasts.com">
            <div class="card" style="border-radius:15px;min-height: 300px; height: 300px;padding:10px; max-height: 250px; max-width: 100%;">
              <div class="card-body">
                <div class="flex mb-5 " style="height:50px;width:50px;background-color:#ffcad2;border-radius:50%;">
                  <i class="fa fa-video-camera l-3 mt-3" style="font-size:20px; color:red;" aria-hidden="true"></i>
                </div>
                <div class="d-flex justify-content-between">
                  <h3 class="mt-6" style="color:black;">Laracasts</h3>
                  <i class="fa fa-arrow-right" style="color:red;" aria-hidden="true"></i>
                </div>
                <p style="font-size:15px;color:black;">
                  Laravel has wonderful documentation covering every aspect of the framework.
                  Whether you are a newcomer or have prior experience with Laravel, we recommend reading our documentation from beginning to end.</p>
                </p>


              </div>
            </div>
</a>
            <!-- vibrant ecosystem -->
            <div class="card" style="border-radius:15px;min-height: 300px; height: 300px;padding:10px; max-height: 250px; max-width: 100%;">

              <div class="card-body">
                <div class="flex mb-5 " style="height:50px;width:50px;background-color:#ffcad2;border-radius:50%;">
                  <i class="fa fa-ban ml-3 mt-3" style="font-size:20px; color:red;" aria-hidden="true"></i>
                </div>
                <div class="d-flex justify-content-between">
                  <h3>vibrant Ecosystem</h3>
                  <i class="fa fa-arrow-right" style="color:red;" aria-hidden="true"></i>
                </div>
                <p style="font-size:15px; color:black;">
                  Laravel's robust library of first-party tools and libraries, such as
                  <a href="https://forge.laravel.com">Forge</a>,
                  <a href="https://vapor.laravel.com">Vapor</a>,
                  <a href="https://nova.laravel.com" >Nova</a>, and
                  <a href="https://envoyer.io">Envoyer</a>
                  help you take your projects to the next level. Pair them with powerful open source libraries like
                  <a href="https://laravel.com/docs/billing">Cashier</a>,
                  <a href="https://laravel.com/docs/dusk">Dusk</a>,
                  <a href="https://laravel.com/docs/broadcasting">Echo</a>,
                  <a href="https://laravel.com/docs/horizon">Horizon</a>,
                  <a href="https://laravel.com/docs/sanctum">Sanctum</a>,
                  <a href="https://laravel.com/docs/telescope">Telescope</a>, and more.
                </p>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>



        <!-- /.col (RIGHT) -->
      </div>



      <div class="d-flex justify-content-between " style="color:grey;">
  <p>🤍Sponsor</p>
<p>Laravel v10.12.0 (PHP v8.2.18)</p>
</div>



      <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<!-- Page script -->
<script>
  $(function() {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Initialize Select2 Elements
    $(".select2bs4").select2({
      theme: "bootstrap4",
    });

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {
      placeholder: "dd/mm/yyyy"
    });
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {
      placeholder: "mm/dd/yyyy"
    });
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $("#reservation").daterangepicker();
    //Date range picker with time picker
    $("#reservationtime").daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: "MM/DD/YYYY hh:mm A",
      },
    });
    //Date range as a button
    $("#daterange-btn").daterangepicker({
        ranges: {
          Today: [moment(), moment()],
          Yesterday: [
            moment().subtract(1, "days"),
            moment().subtract(1, "days"),
          ],
          "Last 7 Days": [moment().subtract(6, "days"), moment()],
          "Last 30 Days": [moment().subtract(29, "days"), moment()],
          "This Month": [moment().startOf("month"), moment().endOf("month")],
          "Last Month": [
            moment().subtract(1, "month").startOf("month"),
            moment().subtract(1, "month").endOf("month"),
          ],
        },
        startDate: moment().subtract(29, "days"),
        endDate: moment(),
      },
      function(start, end) {
        $("#reportrange span").html(
          start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY")
        );
      }
    );

    //Timepicker
    $("#timepicker").datetimepicker({
      format: "LT",
    });

    //Bootstrap Duallistbox
    $(".duallistbox").bootstrapDualListbox();

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    $(".my-colorpicker2").on("colorpickerChange", function(event) {
      $(".my-colorpicker2 .fa-square").css("color", event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch("state", $(this).prop("checked"));
    });
  });
</script>
</body>