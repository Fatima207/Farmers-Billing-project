<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Retailers Billing List</h1>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Billing Number</th>
                    <th>Retailers</th>
                    <th>Company</th>
                    <th>Commission</th>
                    <th>Grand Total</th>
                    <th>Final Total</th>
                    <th>Total Dues</th>
                    <th>Payment Status</th>
                    <th>Action</th>



                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        Yaa
                    </td>

                    <td>
                        ya@gmail.com
                    </td>

                    <td>
                        20
                    </td>

                    <td>
                        fsgg
                    </td>

                    <td>
                        2043561265
                    </td>

                    <td>
                        sf
                    </td>

                    <td>
                        er
                    </td>

                    <td>
                        completed
                    </td>

                    <td>
                        <a class="btn btn-success" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </td>

                </tr>

                <tr>
                    <td>
                        sdf
                    </td>

                    <td>
                        sd@gmail.com
                    </td>

                    <td>
                        30
                    </td>

                    <td>
                        fwfg
                    </td>

                    <td>
                        3032456787
                    </td>

                    <td>
                        sh
                    </td>

                    <td>
                        dssh
                    </td>

                    <td>
                        completed
                    </td>


                    <td>
                        <a class="btn btn-success" href="#">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </td>

                </tr>

            </tbody>
        </table>






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