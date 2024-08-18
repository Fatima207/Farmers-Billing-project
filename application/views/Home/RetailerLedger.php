<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                       
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE--->
                <div class="card card-default pt-4 mt-5">
                
                    <!-- /.card-header -->
                    <form action="<?= base_url('index.php/Home/AddAgent') ?>" method="post">

                        <div class="card-body">
                            <div class="row">
                                <!-- first field  -->
                                <div class="col-md-6">
                                    <label>companies</label>
                                    <div class="form-group ">
                                        <select class="form-control">

                                            <option>random </option>
                                            <option>random </option>
                                            <option>random </option>
                                            <option>random </option>
                                        </select>

                                    </div>
                                </div>
                                <!-- second field -->
                                <div class="col-md-6">
                                    <label>Retailer</label>
                                    <div class="form-group">
                                        <select class="form-control">

                                            <option>random </option>
                                            <option>random </option>
                                            <option>random </option>
                                            <option>random </option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Date and time range -->
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend" style="height:55px;">
                                                <span class="input-group-text"><i class="far fa-clock"></i></span>
                                            </div>
                                            <input type="text" class="form-control" style="height:55px;" id="reservationtime" required>
                                        </div>

                                    </div>


                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="text-center">
                                <button type="button" class="btn  px-4 py-2 btn-primary btn-sm">Search</button>
                            </div>
                        </div>
                        <!-- /.row -->



                        <div class="row mb-2 my-3 ">
                            <div class="col-sm-6 ml-2">
                                <h3>Retailers Ledgers Data</h3>
                            </div>
                            <div style="margin-left:510px; margin-right:35px; ">
                                <a class="btn btn-success " href="#">Export</a>
                            </div>
                            <div class="form-group mt-2" style="margin-left:980px;margin-right:15px;">
                                <div class="input-group input-group-lg">
                                    <input type="search" class="form-control form-control-lg " style="width:180px; height:40px" placeholder="search for anything" value="">
                                    <div class="input-group-append" style=" height:40px">
                                        <button type="submit" class="btn btn-lg btn-default" >
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h6>There are no records to display</h6>
                        </div>
                        <table style="margin-left:800px; font-weight:bold"> 
                            <tr>
                                <td style="padding:8px;">Total</td>
                                <td style="padding:8px">Rs</td>
                                <td style="padding:8px">Rs</td>
                                <td style="padding:8px"></td>
                            </tr>
                            <tr>
                                <td style="padding:8px;">Credit Balance</td>
                                <td style="padding:8px;"></td>
                                <td style="padding:8px;"></td>
                                <td style="padding:8px;">RsNaN</td>
                            </tr>
                            <tr>
                                <td style="padding:8px;">Grand Total</td>
                                <td style="padding:8px;">Rs</td>
                                <td style="padding:8px;">Rs NaN</td>
                                <td style="padding:8px;"></td>
                            </tr>
                        </table>
                    </form>
                    <br>
                    <br>
                    <br>
                </div>

                <!-- /.card-body -->
                <!-- <div class="card-footer">
							Visit
							<a href="https://select2.github.io/">Select2 documentation</a> for
							more examples and information about the plugin.
						</div> -->
            </div>

    </div>
    <!-- /.container-fluid -->
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