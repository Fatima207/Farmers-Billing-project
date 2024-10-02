<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {

        var html = '<div class="flex flex-row "  id="table_field" style="column-gap:40px; "><label for="qty" class="">Qty</label><input type="number" name="qty" id="1" required="" placeholder="Enter Qty" style="width: 100px;"><label for="unit" class="">Unit</label><select name="unit" id="2" class=" "><option value="kg">kg</option> <option value="g">g</option><option value="pound">pound</option></select><label for="price" class="">Price</label><input type="number" name="price" id="2" required="" placeholder="Enter Price" style="width: 100px;"><label class="ml-2">Amount: Rs 0</label><a class=" btn btn-danger" href="#" id="remove" style="margin-left: 200px;" >-</a></div>'


        var max = 5;
        var x = 1;
        $('#add').click(function() {
            if (x <= max) {
                $("#table_field").append(html);
                x++;
            }

        });
        $("#table_field").on('click', '#remove', function() {
            $(this).closest('div').remove();
            x--;
        });

    });
</script>

<script src="http://localhost:8080/#/BillingFarmer"></script>

<script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script src="<?= base_url('js/app.js') ?>"></script>
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

<script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable1').DataTable();
    });
</script>
<script>
    document.getElementById("print-button").addEventListener("click", function() {
        window.print();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#employee").change(function() {
            var id = $(this).find(":selected").val();
            var dataString = 'empid=' + id;
            $.ajax({
                url: '<?= base_url('index.php/Home/NewFarmersBilling') ?>',
                dataType: 'json',
                data: dataString,
                cache: false,
                success: function(empData) {
                    if (empData) {
                        $("#errormassage").addclass('hidden').text("");
                        $("#recordListing").removeClass('hidden');
                        $("#id").text('empData.id');
                        $("#name").text('empData.name');
                        $("#code").text('empData.code');
                        $("#address").text('empData.address');
                        $("#contact_number").text('empData.contact_number');

                    } else {
                        $('#recordListing').addClass('hidden');
                        $("#errorMassage").removeClass('hidden').text("No record found!");
                    }
                }
            })
        });
    })
</script>
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
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

//     $('#daterange-btn').daterangepicker(
//   {
//     ranges   : {
//       'Today'       : [moment(), moment()],
//       'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
//       'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
//       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
//       'This Month'  : [moment().startOf('month'), moment().endOf('month')],
//       'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
//     },
//     startDate: moment().subtract(29, 'days'),
//     endDate  : moment(),
//     locale: {
//       format: 'DD/MM/YYYY'  // ensure you are using the correct format
//     }
//   },
//   function (start, end) {
//     // Debug to see if start and end dates are correct
//     console.log("Start Date:", start.format('DD/MM/YYYY'));
//     console.log("End Date:", end.format('DD/MM/YYYY'));

//     $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
//   }
// );


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

</html>