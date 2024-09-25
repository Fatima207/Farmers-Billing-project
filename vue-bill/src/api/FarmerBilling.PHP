<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laravel</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- daterange picker -->
	<link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Bootstrap Color Picker -->
	<link rel="stylesheet" href="/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<!-- Select2 -->
	<link rel="stylesheet" href="/assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Bootstrap4 Duallistbox -->
	<link rel="stylesheet" href="/assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
	<script>
		function ddlselect() {
			var d = document.getElementById('ddselect');
			var displaytext = d.options[d.selectedIndex].text;
			document.getElementById('txtvalue').value = displaytext;
		}
	</script>
	<style>
		.container {
			height: 100%;
		}

		.dropdown-menu li {
			position: relative;
		}

		.dropdown-menu .dropdown-submenu {
			display: none;
			position: absolute;
			left: 100%;
			top: -7px;
		}

		.dropdown-menu .dropdown-submenu-left {
			right: 100%;
			left: auto;
		}

		.dropdown-menu>li:hover>.dropdown-submenu {
			display: block;
		}
	</style>
</head>


<body class="hold-transition sidebar-mini">

	<div class="wrapper">


		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="http://localhost/dairy/index.php/Home/SuperAdminDashboard" class="nav-link">Home</a>
				</li>

			</ul>


		</nav>

		<aside class="main-sidebar sidebar-dark-primary elevation-4">


			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<a href="http://localhost/dairy/index.php/Home/Document">
						<div class="image">
							<img
								src="/assets/dist/img/laravel3.png"
								class="img-circle elevation-2"
								alt="User Image" />
						</div>
					</a>
					<div class="info">
						<a href="#" class="d-block">
							Dashboard
						</a>
					</div>

				</div>
				<!-- Sidebar Menu -->

				<nav class="mt-2">
					<ul
						class="nav nav-pills nav-sidebar flex-column"
						data-widget="treeview"
						role="menu"
						data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

						<li class="nav-item">
							<div class="user-panel mt-3 pb-3 mb-3 d-flex">
								<a href="http://localhost/dairy/index.php/Home/Document">
									<div class="image">
										<img
											src="/assets/dist/img/avatar5.png"
											class="img-circle elevation-2"
											alt="User Image" />
									</div>
								</a>
								<a href="#" class="nav-link">
									<p>

										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
							</div>
							<ul class="nav nav-treeview" style="display: none;">
								<li class="nav-item">
									<a href="http://localhost/dairy/index.php/Home/Document" class="nav-link">
										<p>profile</p>
									</a>
								</li>
								<li class="nav-item ">
									<a href="http://localhost/dairy/index.php/Home/login" class="nav-link ">
										<p>Log Out</p>
									</a>
								</li>

							</ul>

						</li>


						<!--registrations-->

						<li class="nav-item">
							<a href="#" class="nav-link active">
								<i class="far fa-circle nav-icon"></i>
								<p>Registration <i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview">

								<!--farmers -->
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-circle"></i>
										<p>
											farmers
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="http://localhost/dairy/index.php/Home/AddFarmer" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Register Farmer</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="http://localhost/dairy/index.php/Home/FarmerList" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>View All</p>
											</a>
										</li>

									</ul>
								</li>


								<!--Agents -->
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-circle"></i>
										<p>
											Agents
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="http://localhost/dairy/index.php/Home/AddAgent" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Register Agent</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url('index.php/Home/AgentList') ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>View All</p>
											</a>
										</li>

									</ul>
								</li>

								<!--Retailers -->
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-circle"></i>
										<p>
											Retailers
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?= base_url('index.php/Home/AddRetailer') ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Register Retailer</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url('index.php/Home/RetailerList') ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>View All</p>
											</a>
										</li>

									</ul>
								</li>


								<!--companies -->
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-circle"></i>
										<p>
											Companies
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?= base_url('index.php/Home/AddCompany') ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>Register Company</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?= base_url('index.php/Home/CompanyList') ?>" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>View All</p>
											</a>
										</li>

									</ul>
								</li>

							</ul>
						</li>


						<!--Products -->
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link active">
								<i class="far fa-circle nav-icon"></i>
								<p>
									Products
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url() ?>index.php/Home/AddProduct" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Add Product</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() ?>index.php/Home/ProductList" class="nav-link ">
										<i class="far fa-circle nav-icon"></i>
										<p>View All</p>
									</a>
								</li>
							</ul>
						</li>

						<!-- billing -->
						<li class="nav-item">
							<a href="#" class="nav-link active">
								<i class="far fa-circle nav-icon"></i>
								<p>Billing <i class="right fas fa-angle-left"></i></p>
							</a>
							<!-- for farmers -->
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-circle"></i>
										<p>
											farmers
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo base_url() ?>index.php/Home/NewFarmersBilling" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>New Billing</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url() ?>index.php/Home/FarmersBillingList" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>View All</p>
											</a>
										</li>

									</ul>
								</li>
								<!-- for agents -->

								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="nav-icon fas fa-circle"></i>
										<p>
											Agents
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href="<?php echo base_url() ?>index.php/Home/NewAgentsBilling" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>New Billing</p>
											</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo base_url() ?>index.php/Home/AgentsBillingList" class="nav-link">
												<i class="far fa-circle nav-icon"></i>
												<p>View All</p>
											</a>
										</li>

									</ul>
								</li>
						</li>
						<!-- fro retailers -->
						<li class="nav-item">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-circle"></i>
								<p>
									Retailers
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url() ?>index.php/Home/RetBilling" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>New Billing</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() ?>index.php/Home/RetList" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>View All</p>
									</a>
								</li>

							</ul>
						</li>
						</li>
						</li>

					</ul>
					</li>

					<!-- expenses`   -->

					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="far fa-circle nav-icon"></i>
							<p>Expenses <i class="right fas fa-angle-left"></i></p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-circle"></i>
									<p>
										Categories
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?php echo base_url() ?>index.php/Home/ExpCategories" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Create Category</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url() ?>index.php/Home/ExpCatgList" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>View All</p>
										</a>
									</li>

								</ul>
							</li>
					</li>

					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-circle"></i>
							<p>
								Daybook
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url() ?>index.php/Home/ExpDaybook" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>New Daybook</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url() ?>index.php/Home/ExpDaybookList" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>View All</p>
								</a>
							</li>

						</ul>
					</li>
					</li>

					</li>
					</li>

					</ul>
					</li>

					<!-- Reports -->

					<li class="nav-item">
						<a href="#" class="nav-link active">
							<i class="far fa-circle nav-icon"></i>
							<p>Reports <i class="right fas fa-angle-left"></i></p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url() ?>index.php/Home/ProfitLoss" class="nav-link">
									<i class="nav-icon fas fa-circle"></i>
									<p>
										Profit/Loss Account

									</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-circle"></i>
									<p>
										Ledgers
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?php echo base_url() ?>index.php/Home/FarmerLedger" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Farmer Ledger</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url() ?>index.php/Home/AgentLedger" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Agent Ledger</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url() ?>index.php/Home/RetailerLedger" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>Retailer Ledger</p>
										</a>
									</li>

								</ul>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo base_url() ?>index.php/Home/PaymentData" class="nav-link">
									<i class="nav-icon fas fa-circle"></i>
									<p>Payment Data
									</p>
								</a>
							</li>
						</ul>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="nav-icon fas fa-circle"></i>
									<p>
										Daybook
										<i class="right fas fa-angle-left"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?php echo base_url() ?>index.php/Home/ReptDaybook" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>New Daybook</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo base_url() ?>index.php/Home/ReptDaybooklist" class="nav-link">
											<i class="far fa-circle nav-icon"></i>
											<p>View All</p>
										</a>
									</li>

								</ul>
							</li>
						</ul>
					</li>
					</li>

					</ul>
					</li>


					</li>

					</ul>


				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>New Farmer Billing</h1>
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
							<label>Select Farmers</label>

							<select name="" class="form-control">
								<option value="" default hidden>Farmers</option>
								<?php foreach ($RegFarmerList as $reg) { ?>
									<option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
								<?php } ?>


							</select>
						</div>
						<div class="col-md-2">
							<!-- select -->
							<label>Select Companies</label>
							<select name="" class="form-control">
								<option value="" default hidden>Companies</option>
								<?php foreach ($RegCompaniesList as $reg) { ?>
									<option value="<?php echo $reg->id ?>"><?php echo $reg->name ?></option>
								<?php } ?>

							</select>
						</div>

					</div>

				</div>

			</div>

			<!-- // for farmer table -->


			<div class="row" style="padding-left:10px;">
				<div class="col-12">
					<div class="card" style="display:flex;flex-direction:row;">
						<!-- /.card-header -->
						<div class="card-body table-responsive p-0" style="height: 100px; border:1px solid black;margin-right: 7px;">
							<table class="table table-head-fixed text-nowrap" id="recordListing">
								<thead>
									<tr>
										<th>Farmer Name</th>
										<th>Farmer code</th>
										<th>Address</th>
										<th>Contact Number</th>

									</tr>
								</thead>
								<tbody>

									<tr>
										<!-- find the name and id of farmers from the list that got matched with farmers options
                                     and then show that full row in the table...-->


										<td id="name"></td>
										<td id="code"></td>
										<td id="address"></td>
										<td id="contact_number"></td>

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

						<select multiple class="form-control" id="ddselect">

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
						<label for="" id="txtvalue">katla</label>
						<a class="btn btn-success mr-5" href="#" id="add">+</a>
						<label class="mx-5">Total Amount: Rs </label>
						<label class="ml-5">Total Quantity: </label>

						<div class="flex flex-row " style="column-gap:40px; " id="table_field">
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



			<!-- /.content -->
		</div>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

	<!-- <script>
$(document).ready(function() {
    $("#add").click(function() {
    	var lastField = $("#buildyourform div:last");
        var intId = (lastField && lastField.length && lastField.data("idx") + 1) || 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        fieldWrapper.data("idx", intId);
        var fName = $("<input type=\"text\" class=\"fieldname\" />");
        var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">kg</option><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option></select>");
        
        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
    $("#preview").click(function() {
        $("#yourform").remove();
        var fieldSet = $("<fieldset id=\"yourform\"><legend>Your Form</legend></fieldset>");
        $("#buildyourform div").each(function() {
            var id = "input" + $(this).attr("id").replace("field","");
            var label = $("<label for=\"" + id + "\">" + $(this).find("input.fieldname").first().val() + "</label>");
            var input;
            switch ($(this).find("select.fieldtype").first().val()) {
                case "checkbox":
                    input = $("<input type=\"checkbox\" id=\"" + id + "\" name=\"" + id + "\" />");
                    break;
                case "textbox":
                    input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" />");
                    break;
                case "textarea":
                    input = $("<textarea id=\"" + id + "\" name=\"" + id + "\" ></textarea>");
                    break;    
            }
            fieldSet.append(label);
            fieldSet.append(input);
        });
        $("body").append(fieldSet);
    });
});
</script> -->

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

</html>