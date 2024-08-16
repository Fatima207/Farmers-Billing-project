<div class="wrapper">
		
		<?php $this->load->view('partials/left_sidebar') ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Register Agent</h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Advanced Form</li>
							</ol>
						</div>
					</div>
				</div>
				<!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- SELECT2 EXAMPLE--->
					 <div class="card card-default">
						<div class="card-header">
							<!-- <h3 class="card-title">Select2 (Default Theme)</h3> -->

							<div class="card-tools"> 
								<button
									type="button"
									class="btn btn-tool"
									data-card-widget="collapse"
								>
									<i class="fas fa-minus"></i>
								</button>
								<button
									type="button"
									class="btn btn-tool"
									data-card-widget="remove"
								>
									<i class="fas fa-remove"></i>
								</button>
							</div>
						</div>
						<!-- /.card-header -->
						<form action="<?= base_url('index.php/Home/AddAgent') ?>" method="post">

						<div class="card-body">
							<div class="row">
								<div class="col-md-6">
								<label>Name</label>
								<div class="form-group">
									<input type="text" class="form-control" name="name">
								</div>
								</div>
								<!-- /.col -->
								<div class="col-md-6">
								<label>Email</label>
								<div class="form-group">
									<input type="text" class="form-control" name="Email">
								</div>
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-md-6">
								<label>Code</label>
								<div class="form-group">
									<input type="text" class="form-control" name="code">
								</div>
									<!-- /.form-group -->
								</div>

								<div class="col-md-6">
								<label>Contact Number</label>
								<div class="form-group">
									<input type="text" class="form-control" name="Contact Number">
								</div>
									<!-- /.form-group -->
								</div>

								<div class="col-md-6">
								<label>Whatsapp Number</label>
								<div class="form-group">
									<input type="text" class="form-control" name="Whatsapp Number">
								</div>
									<!-- /.form-group -->
								</div>

								<div class="col-md-6">
								<label>Address</label>
								<div class="form-group">
									<input type="text" class="form-control" name="Address">
								</div>
									<!-- /.form-group -->
								</div>
								<button type="button" class="btn btn-block btn-primary btn-sm">Register</button>
							</div>
							<!-- /.row -->

							
							<div class="row">
								<div class="col-12 col-sm-6">
									
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
								<div class="col-12 col-sm-6">
									<div class="form-group">
										<label></label>
										
									<!-- /.form-group -->
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
</form>
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
	<script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="<?=base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
	<!-- Bootstrap4 Duallistbox -->
	<script src="<?=base_url()?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
	<!-- InputMask -->
	<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
	<!-- date-range-picker -->
	<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap color picker -->
	<script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Bootstrap Switch -->
	<script src="<?=base_url()?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
	<!-- Page script -->
	<script>
		$(function () {
			//Initialize Select2 Elements
			$(".select2").select2();

			//Initialize Select2 Elements
			$(".select2bs4").select2({
				theme: "bootstrap4",
			});

			//Datemask dd/mm/yyyy
			$("#datemask").inputmask("dd/mm/yyyy", { placeholder: "dd/mm/yyyy" });
			//Datemask2 mm/dd/yyyy
			$("#datemask2").inputmask("mm/dd/yyyy", { placeholder: "mm/dd/yyyy" });
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
			$("#daterange-btn").daterangepicker(
				{
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
				function (start, end) {
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

			$(".my-colorpicker2").on("colorpickerChange", function (event) {
				$(".my-colorpicker2 .fa-square").css("color", event.color.toString());
			});

			$("input[data-bootstrap-switch]").each(function () {
				$(this).bootstrapSwitch("state", $(this).prop("checked"));
			});
		});
	</script>
</body>
