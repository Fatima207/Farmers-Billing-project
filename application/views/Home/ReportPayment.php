<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-sm-6">
                        <h2>Search Payments</h2>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>



        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center bg-light ">
                    <!-- left column -->
                    <div class="col-lg-12">
                        <!-- general form elements -->
                        <div class="card card-primary px-5 py-5">

                            <!-- /.card-header -->
                            <!-- form start -->

                            <form>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName1" class="col-sm-3 pl-5 text-small">Search Contact Number of Farmer/Agent/Retailer </label>
                                        <input type="name" class="col-md-6 mr-4" id="exampleInputName1" placeholder="" STYLE="height:45px; BORDER-RADIUS:4PX;">
                                        <a class="btn btn-dark pt-2" href="#" style="width:120px;height:45px;letter-spacing:3px;BORDER-RADIUS:4PX;">SEARCH</a>


                                    </div>

                                </div>
                            </form>


                            <table class=" ml-[12%] w-[80%] border-separate border-spacing-4 text-lg border border-slate-400 ...">
                                <thead>
                                    <tr class="text-center">
                                        <th class="border border-slate-300 ">Name</th>
                                        <th class="border border-slate-300">Code</th>
                                        <th class="border border-slate-300">Contact Number</th>
                                        <th class="border border-slate-300">Type</th>
                                    </tr>
                                </thead>
                                <!-- <tbody>
                                    <tr class="text-2xl">
                                        <td class="px-2 text-xl"></td>
                                        <td class="px-2 text-xl"></td>
                                        <td class="px-2 text-xl"></td>
                                        <td class="px-2 text-xl"></td>
                                    </tr>
                                </tbody> -->
                            </table>



                            <div class="d-flex justify-content-between mt-3 col-md-6  " style="margin-left:250px;">
                                <h2 class="text-success">Total payments <br> 0</h2>
                                <span class="text-primary" style="font-size:xx-large;">|</span>
                                <h2 class="text-danger">Total Dues <br> 0 </h2>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn  px-5 py-2 btn-primary btn-lg">Add New Payment</button>
                            </div>



                        </div>

                    </div>

                </div>
            </div>


    </section>




    <!-- 
        <div class="min-h-screen  lg:justify-center items-center sm:pt-0 bg-gray-100">
            <div class="w-md mt-6 px-12 py-12 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="relative">
                    <table class=" ml-[12%] w-[80%] border-separate border-spacing-2 text-lg border border-slate-400 ...">
                        <thead>
                            <tr class="text-center">
                                <th class="border border-slate-300 ">Name</th>
                                <th class="border border-slate-300 ...">Code</th>
                                <th class="border border-slate-300 ...">Contact Number</th>
                                <th class="border border-slate-300 ...">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-2xl">
                                <td class="px-2 text-xl"></td>
                                <td class="px-2 text-xl"></td>
                                <td class="px-2 text-xl"></td>
                                <td class="px-2 text-xl"></td>
                            </tr>
                        </tbody>
                    </table>
                   </div>
            </div>
        </div>

 -->















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