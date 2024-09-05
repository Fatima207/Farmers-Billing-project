<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row my-3">
                    <div class="col-sm-6">
                        <h1>Add Daybook</h1>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center align-items-center bg-light mt-3">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">

                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="<?= base_url('index.php/Home/ReptDaybook') ?>" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Expenses by</label>
                                        <input type="name" class="form-control" id="exampleInputName1" placeholder="" name="expenses_by">
                                    </div>


                                    <div class="form-group">
                                        <label for="Amount" class="">Amount</label><br>
                                        <input type="number" name="amount" id="amount" required="" placeholder="Enter Qty" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Expense Date</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="expense_date">
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label>Companies</label>
                                        <select name="companies" id="companies" class="form-control" >
                                            <option value="" default hidden>Companies</option>
                                            <?php foreach ($ReptDaybooklist as $reg) {

                                            ?>
                                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>

                                    <!-- select -->
                                    <div class="form-group">
                                        <label>Categories</label>
                                        <select name="categories" id="categories" class="form-control">
                                            <option value="" default hidden>Categories</option>
                                            <?php foreach ($ExpCategorieslist as $reg) {

                                            ?>
                                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                                            <?php } ?>
                                        </select>

                                    </div>



                                    <!-- button add -->
                                    <button type="submit" class="btn btn-dark" href="#" style="float:right;">Add</button>
                                </div>


                                <!-- /.card-body -->


                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </section>

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