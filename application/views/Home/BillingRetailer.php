<div class="wrapper">

    <?php $this->load->view('partials/left_sidebar') ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>New Retailers Billing</h1>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- for first -->
        <div class="card-body" style='justify-content: space-between;'>
            <!-- Date -->
            <div class="form-group">
                <div class="row" style='justify-content: space-between;'>
                    <div class="col-md-2">
                        <label>Invoice Date:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <!-- select -->
                        <label>Select Retailer</label>
                        <select name="" class="form-control">
                            <option value="" default hidden>Retailers</option>
                            <?php foreach ($RegRetailersList as $reg) {

                            ?>
                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="col-md-2">
                        <!-- select -->
                        <label>Select Companies</label>
                        <select name="" class="form-control">
                            <option value="" default hidden>Companies</option>
                            <?php foreach ($RegCompaniesList as $reg) {

                            ?>
                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                            <?php } ?>

                        </select>
                    </div>
                </div>

            </div>

        </div>

        <!-- // for Retailers table -->


        <div class="row" style="padding-left:10px;">
            <div class="col-12">
                <div class="card" style="display:flex;flex-direction:row;">
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 100px; border:1px solid black;margin-right: 7px;">
                        <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Retailer Name</th>
                                    <th>Retailer code</th>
                                    <th>Address</th>
                                    <th>Contact Number</th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td>657489322</td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                    <!-- /.card-body -->
                    <!-- previous -->
                    <div class="card-body  table-responsive p-0" style="flex-shrink:2;border:1px solid black;">
                        <label style='padding-right:100px;'>Previous Dues Amount</label>
                        <span>Rs</span>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- column -->
        </div>


        <!-- options -->

        <div class="row" style="padding-left:15px">
            <!-- first section  -->
            <div class="col-sm-1.5">
                <!-- Select multiple-->
                <div class="form-group">
                    <label>Select Products</label>
                    <select multiple class="form-control">
                             <?php foreach ($ProductList as $reg) {

                            ?>
                                <option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
                            <?php } ?>

                        </select>
                </div>
            </div>
            <!-- second section -->
            <div class="card card-row card-primary mx-2 text-sm font-small" style="height:550px; width:725px; border:1px solid black;border-radius:8px;">

                <div class="card-body ">
                    <label for="">katla</label>
                    <a class="btn btn-success mr-5" href="#">+</a>
                    <label class="mx-5">Total Amount: Rs </label>
                    <label class="ml-5">Total Quantity: </label>

                    <div class="flex flex-row " style="column-gap:40px; ">
                        <label for="qty" class="">Qty</label>
                        <input type="number" name="qty" id="1" required="" placeholder="Enter Qty" style="width: 100px;">
                        <label for="unit" class="">Unit</label>
                        <select name="unit" id="2" class=" ">
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                            <option value="pound">pound</option>
                        </select>
                        <label for="price" class="">Price</label>
                        <input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;">
                        <label class="ml-2">Amount: Rs 0</label>



                        <a class=" btn btn-danger" style="margin-left: 200px;" href="#">-</a>

                    </div>
                    <hr>
                </div>
                <hr>
            </div>



            <!-- third section -->
            <div class="card card-row card-primary font-small text-sm" style="border:1px solid black;border-radius:8px;">

                <div class="card-body">

                    <p class="text-center">Final total: Rs 0</p>
                    <label for="qty" class="">Comission in %</label>
                    <input type="number" name="qty" id="1" required="" class="w-25"><br>
                    <label class="font-small">Commission amount: Rs 0</label>
                    <p class="text-center mr-5">Charges</p>
                    <div class="text-center">
                        <span>
                            <label for="qty" class="">Arhat coolie :</label>
                            <label for="qty" class="pl-5">Britty</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25 mx-3">
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25"><br>
                        </span>
                        <span>
                            <label for="qty" class="">dan :</label>
                            <label for="qty" class="pl-5">Jeep fair :</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25 mx-3">
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25"><br>
                        </span>
                        <span>
                            <label for="qty" class="">rail coolie :</label>
                            <label for="qty" class="pl-5">Ice leaf</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25 mx-3">
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25"><br>
                        </span>
                        <span>
                            <label for="qty" class="">Union :</label>
                            <label for="qty" class="pl-5">misc EXp.</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25 mx-3">
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25"><br>

                        </span>
                        <span>
                            <label for="qty" class="">Market exp.</label><br>
                            <input type="number" name="qty" id="1" required="" placeholder="0" class="w-25">
                        </span>
                    </div>

                    <label for="qty" class="" style="font-size:20px;">Total charged amount : Rs 0</label><br>

                    <div class="text-center">

                        <button>
                            <label for="qty" class="">Grand Total: Rs 0</label><br>
                            <label for="qty" class="">Rounded off amount: Rs 0.00</label><br>
                        </button>
                    </div>
                </div>
            </div>



        </div>

        <!-- for main div section -->




        <label for="qty" class="font-small text-sm  ml-5 px-5">Total Quantity:0</label>
        <label for="qty" class="font-small text-sm px-3">Total Products: 1</label>



        <div class="flex flex-row ">
            <label for="qty" class="">Payment status</label>
            <label for="qty" class="pl-5">Payment mode</label><br>
            <select name="unit" id="2" class=" " style="width: 150px; height:40px;">
                <option value=" kg">completed</option>
                <option value="g">pending</option>

            </select>

            <label for="qty" class="">cash</label>
            <input type="number" name="qty" id="1" required="" placeholder="Enter Qty" style="width: 100px;">
            <label for="unit" class="">Cheque</label>
            <input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;">
            <label for="price" class="">Online</label>
            <input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;">

            <label for="qty" class="font-small text-sm  mx-5 px-5">Total Dues Rs0
            </label>
            <button type="button" class="btn btn-primary btn-sm ml-5" style="width: 100px;">Print & Save</button>
            <button type="button" class="btn btn-dark btn-sm ml-3" style="width: 60px;">Save</button>


        </div>




        <!-- 

        <div class="flex flex-row " style="column-gap:40px;">

           
            <div class="w-25">
                <label>Payment Status</label>
                <select class="">
                    <option>completed</option>
                    <option>pending</option>
                </select>
                 <label>Payment mode</label>
                <label for="qty" class="">cash</label>
                <input type="number" name="qty" id="1" required="" placeholder="Enter Qty" class="w-25">
                <label for="price" class="">Price</label>
                <input type="number" name="price" id="2" required="" placeholder="Enter Price" class="w-25" value="">
                <label class="">Amount: Rs 0</label>
            </div>




            <a class="btn btn-danger" href="#">-</a>
        </div>
 -->






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