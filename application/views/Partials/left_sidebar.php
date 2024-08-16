<aside class="main-sidebar sidebar-dark-primary elevation-4">

	<!-- Brand Logo -->
	<!-- <a href="<?= base_url() ?>assets/index3.html" class="brand-link">
				<img
					src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png"
					alt="AdminLTE Logo"
					class="brand-image img-circle elevation-3"
					style="opacity: 0.8"
				/>
				<span class="brand-text font-weight-light">Admin Dashboard</span>
			</a> 

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img
					src="<?= base_url() ?>assets/dist/img/laravel3.png"
					class="img-circle elevation-2"
					alt="User Image" />
			</div>
			<div class="info">
				<a href="#" class="d-block">Admin Dashboard
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


				<!--registrations-->

				<li class="nav-item">
					<a href="#" class="nav-link active">
						<i class="far fa-circle nav-icon"></i>
						<p>Registration <i class="right fas fa-angle-left"></i></p>
					</a>
					<ul class="nav nav-treeview">

						<!--farners -->

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
									<a href="<?= base_url('index.php/Home/AddFarmer') ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Register Farmer</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url('index.php/Home/FarmerList') ?>" class="nav-link">
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
									<a href="<?= base_url('index.php/Home/AddAgent') ?>" class="nav-link">
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

				<!-- for billing -->
				<li class="nav-item">
					<a href="#" class="nav-link active">
						<i class="far fa-circle nav-icon"></i>
						<p>Billing <i class="right fas fa-angle-left"></i></p>
					</a>
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
								<a href="#" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Create Category</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
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
						<a href="#" class="nav-link">
							<i class="far fa-circle nav-icon"></i>
							<p>New Daybook</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
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
						<a href="#" class="nav-link">
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
								<a href="#" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Farmer Ledger</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Agent Ledger</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Retailer Ledger</p>
								</a>
							</li>

						</ul>
					</li>
				</ul>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="#" class="nav-link">
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
								<a href="#" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>New Daybook</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">
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