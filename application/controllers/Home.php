<?php

use SebastianBergmann\Environment\Console;

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');

		$this->load->library('session');
		$this->load->library('form_validation');
		$this->db->db_debug = TRUE;
	}
	// $any = "" 
	public function index()
	{

		$data = [];
		$this->load->view('/vue_initialize', $data);
		$this->load->view('Partials/header');
		// $this->load->view('Home/login');
		$this->load->view('Partials/footer');

		$RegCompList = $this->Home_model->save_company();
		$this->load->view('Home/RegCompList', ['reg_companies' => $RegCompList]);

		$RegAgentList = $this->Home_model->save_agent();
		$this->load->view('Home/RegAgentList', ['reg_agents' => $RegAgentList]);

		$RegFarmerList = $this->Home_model->save_farmer();
		$this->load->view('Home/RegFarmerList', ['reg_farmers' => $RegFarmerList]);

		$RegRetailers = $this->Home_model->save_Retailer();
		$this->load->view('Home/RegRetailerList', ['reg_retailers' => $RegRetailers]);

		$AddProduct = $this->Home_model->save_product();
		$this->load->view('Home/AddProductList', ['add_products' => $AddProduct]);

		// $AddCategories = $this->Home_model->save_categories();
		// $this->load->view('Home/ExpCatgList', ['add_categories' => $AddCategories]);

		$ExpDaybook = $this->Home_model->save_daybook();
		$this->load->view('Home/ExpDaybookList', ['expense_daybook' => $ExpDaybook]);

		$ProfitLoss = $this->Home_model->save_profitloss();
		$this->load->view('Home/ProfitLossList', ['profit/loss' => $ProfitLoss]);
	}

	public function Test()
	{
		$this->load->view('Home/test');
	}
	public function login()
	{
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Passsword', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
		} else {
			$data = [
				'email' => $this->input->post("email"),
				'password' => $this->input->post("password"),
			];


			$user = new Home_model;
			$result = $user->loginUser($data);
			var_dump($result->role);
			if ($result != FALSE) {
				$_SESSION['first_name']	= $result->first_name;
				$_SESSION['last_name']	= $result->last_name;
				$_SESSION['email']	= $result->email;
				$_SESSION['role']	= $result->role;

				echo
				$auth_userdetails = array(
					'first_name' => $result->first_name,
					'last_name' => $result->last_name,
					'email' => $result->email,
					'role' => $result->role,
				);
				$this->session->set_userdata('role', $result->role);  // Optional: use CodeIgniter's session

				$this->session->set_userdata('authenticated', '1');
				$this->session->set_userdata('auth_user', $auth_userdetails);
				$this->session->set_flashdata('status', 'You are Loggedin successfully');
				// redirect(base_url("index.php/Home/AdminDashboard"));
				if ($result->role == "admin") {
					redirect(base_url("index.php/Home/AdminDashboard"));
				} else if ($result->role == "super admin") {
					redirect(base_url("index.php/Home/SuperAdminDashboard"));
				}
			} else {
				$this->session->set_flashdata('status', 'Invalid Email Id or Password');
				redirect(base_url('index.php/Home/login'));
			}
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/login.php');
		$this->load->view('Partials/footer');
	}

	// Registration 
	public function Register()
	{
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('cinfirm_password', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
		} else {

			$data = [
				'first_name' => $this->input->post("first_name"),
				'last_name' => $this->input->post("last_name"),
				'email' => $this->input->post("email"),
				'role' => $this->input->post("role"),
				'password' => $this->input->post("password"),
			];
			// $data = $userData = array(); 

			$userModel = new Home_model;

			$r = $userModel->registerUser($data);

			var_dump($r->role);

			if ($r != FALSE) {

				$_SESSION['first_name']	= $r->first_name;
				$_SESSION['last_name']	= $r->last_name;
				$_SESSION['email']	= $r->email;
				$_SESSION['role']	= $r->role;

				$sess_data = array(
					'first_name' => $this->input->post("first_name"),
					'last_name' => $this->input->post("last_name"),
					'email' => $this->input->post("email"),
					'role' => $this->input->post("role"),
					'password' => $this->input->post("password"),
					// 'loggedin'=>'loggedin'
				);
				$this->session->set_userdata($sess_data);

				// if ($r->role == "admin") {
				// 	redirect(base_url("index.php/Home/AdminDashboard"));
				// } else if ($r->role == "super admin") {
				// 	redirect(base_url("index.php/Home/SuperAdminDashboard"));
				// }
				redirect(base_url("index.php/Home/SuperAdminDashboard"));
			} else {
				echo "User registered deny";
			}
		}

		$this->load->view('Partials/header');
		$this->load->view('Home/Register.php');
		$this->load->view('Partials/footer');
	}
	// Farmer section
	public function AddFarmer()
	{

		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name"),
				'email' => $this->input->post("email"),
				'code' => $this->input->post("code"),
				'contact_number' => $this->input->post("contact_number"),
				'whatsapp_number' => $this->input->post("whatsapp_number"),
				'address' => $this->input->post("address"),
				// 'added_by' => $this->input->post("added_by"),
				'added_at' => date('Y-m-d h:i:s'),
				//  'updated_by' => $this->input->post("updated_by"),
				'updated_at' => date('Y-m-d h:i:s'),
			);
			$resp = $this->Home_model->save_farmer($data);

			// $farmers = $this->FarmerModel->getFarmersList();
			// echo json_encode($resp);
			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Registration made successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/FarmerList'));



			exit;
		}

		$this->load->view('Partials/header');
		$this->load->view('Home/RegFarmer');
		$this->load->view('Partials/footer');
	}


	public function FarmerList()
	{

		$data['query'] = $this->Home_model->get_farmers();
		$this->load->view('Partials/header');
		$this->load->view('Home/RegFarmerList', $data);
		$this->load->view('Partials/footer');
	}

	public function get_farmers()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$data = $this->Home_model->get_farmers();
		echo json_encode($data);
	}
	public function get_companies()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$data = $this->Home_model->get_companies();
		echo json_encode($data);
	}
	public function get_agents()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$data = $this->Home_model->get_agents();
		echo json_encode($data);
	}
	public function get_retailers()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$data = $this->Home_model->get_retailers();
		echo json_encode($data);
	}
	public function get_products()
	{
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, OPTIONS");
		$data = $this->Home_model->get_products();
		echo json_encode($data);
	}


	public function edit_RegisterFarmer($id)
	{
		$this->load->view('Partials/header');

		$this->load->model('Home_model');
		$data['reg_farmers'] = $this->Home_model->edit_RegisterFarmer($id);

		$this->load->view('Home/editRegisterFarmer', $data);
		$this->load->view('Partials/footer');
	}

	public function update_RegisterFarmer($id)
	{

		$data = [
			'name' => $this->input->post("name"),
			'email' => $this->input->post("email"),
			'code' => $this->input->post("code"),
			'contact_number' => $this->input->post("contact_number"),
			'whatsapp_number' => $this->input->post("whatsapp_number"),
			'address' => $this->input->post("address"),

		];
		$resp = $this->Home_model->update_RegisterFarmer($data, $id);


		if ($resp) {
			$this->session->set_flashdata('msg', array('show_msg' => 'Field Updated successfully !', 'type' => 'success'));
		} else {
			$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
		}
		$this->load->model('Home_model');
		redirect(site_url('index.php/Home/FarmerList'));
	}
	public function delete_RegisterFarmer($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_RegisterFarmer($id);
		redirect(site_url('index.php/Home/FarmerList'));
	}

	// Agents

	public function AddAgent()
	{
		if ($this->input->post()) {

			$data = array(
				'name' => $this->input->post("name"),
				'email' => $this->input->post("email"),
				'code' => $this->input->post("code"),
				'contact_number' => $this->input->post("contact_number"),
				'whatsapp_number' => $this->input->post("whatsapp_number"),
				'address' => $this->input->post("address"),
				// 'added_by' => $this->input->post("added_by"),
				'added_at' => date('Y-m-d h:i:s'),
				//  'updated_by' => $this->input->post("updated_by"),
				'updated_at' => date('Y-m-d h:i:s'),
			);
			$resp = $this->Home_model->save_agent($data);

			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Registration made successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/AgentList'));
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/RegAgent');
		$this->load->view('Partials/footer');
	}
	public function AgentList()
	{
		//have post
		// echo 11;
		// exit;
		$this->load->view('Partials/header');
		$this->load->view('Home/RegAgentList');
		$this->load->view('Partials/footer');
	}
	public function RegAgentList()
	{

		$this->load->view('Partials/header');
		$this->load->view('Home/RegAgentList');
		$this->load->view('Partials/footer');
	}
	public function edit_RegisterAgent($id)
	{
		$this->load->view('Partials/header');

		$this->load->model('Home_model');
		$data['reg_agents'] = $this->Home_model->edit_RegisterAgent($id);

		$this->load->view('Home/editRegisterAgent', $data);
		$this->load->view('Partials/footer');
	}
	public function update_RegisterAgent($id)
	{

		$data = [
			'name' => $this->input->post("name"),
			'email' => $this->input->post("email"),
			'code' => $this->input->post("code"),
			'contact_number' => $this->input->post("contact_number"),
			'whatsapp_number' => $this->input->post("whatsapp_number"),
			'address' => $this->input->post("address"),

		];
		$resp = $this->Home_model->update_RegisterAgent($data, $id);


		if ($resp) {
			$this->session->set_flashdata('msg', array('show_msg' => 'Field Updated successfully !', 'type' => 'success'));
		} else {
			$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
		}
		$this->load->model('Home_model');
		// redirect(base_url('reg_farmers'));
		redirect(site_url('index.php/Home/AgentList'));
	}
	public function delete_RegisterAgent($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_RegisterAgent($id);
		redirect(site_url('index.php/Home/AgentList'));
	}

	// Retailers
	public function AddRetailer()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name"),
				'email' => $this->input->post("email"),
				'code' => $this->input->post("code"),
				'contact_number' => $this->input->post("contact_number"),
				'whatsapp_number' => $this->input->post("whatsapp_number"),
				'address' => $this->input->post("address"),
				// 'added_by' => $this->input->post("added_by"),
				'added_at' => date('Y-m-d h:i:s'),
				//  'updated_by' => $this->input->post("updated_by"),
				'updated_at' => date('Y-m-d h:i:s'),
			);
			$resp = $this->Home_model->save_retailer($data);

			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Registration made successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/RetailerList'));



			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/RegRetailer');
		$this->load->view('Partials/footer');
	}
	public function RetailerList()
	{
		$this->load->view('Partials/header');
		$this->load->view('Home/RegRetailerList');
		$this->load->view('Partials/footer');
	}

	public function edit_RegisterRetailer($id)
	{
		$this->load->view('Partials/header');

		$this->load->model('Home_model');
		$data['reg_retailers'] = $this->Home_model->edit_RegisterRetailer($id);

		$this->load->view('Home/editRegisterRetailer', $data);
		$this->load->view('Partials/footer');
	}
	public function update_RegisterRetailer($id)
	{

		$data = [
			'name' => $this->input->post("name"),
			'email' => $this->input->post("email"),
			'code' => $this->input->post("code"),
			'contact_number' => $this->input->post("contact_number"),
			'whatsapp_number' => $this->input->post("whatsapp_number"),
			'address' => $this->input->post("address"),

		];
		$resp = $this->Home_model->update_RegisterRetailer($data, $id);


		if ($resp) {
			$this->session->set_flashdata('msg', array('show_msg' => 'Field Updated successfully !', 'type' => 'success'));
		} else {
			$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
		}
		$this->load->model('Home_model');
		// redirect(base_url('reg_farmers'));
		redirect(site_url('index.php/Home/RetailerList'));
	}
	public function delete_RegisterRetailer($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_RegisterRetailer($id);
		redirect(site_url('index.php/Home/RetailerList'));
	}


	// Companies
	public function AddCompany()
	{

		if ($this->input->post()) {
			//have post
			//echo 11;
			//exit;
			$data = array(
				'name' => $this->input->post("name"),
				'email' => $this->input->post("email"),
				'code' => $this->input->post("code"),
				'contact_number' => $this->input->post("contact_number"),
				'whatsapp_number' => $this->input->post("whatsapp_number"),
				'manager_name' =>  $this->input->post("manager_name"),
				'choose_file' =>  $this->input->post("choose_file"),
				'address' => $this->input->post("address"),
				// 'added_by' => $this->input->post("added_by"),
				'added_at' => date('Y-m-d h:i:s'),
				//  'updated_by' => $this->input->post("updated_by"),
				'updated_at' => date('Y-m-d h:i:s'),
			);

			$resp = $this->Home_model->save_company($data);
			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Registration made successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/CompanyList'));
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/RegComp');
		$this->load->view('Partials/footer');
	}


	public function CompanyList()
	{
		$data['query'] = $this->Home_model->get_companies();
		$this->load->view('Partials/header');
		$this->load->view('Home/RegCompList', $data);
		$this->load->view('Partials/footer');
	}
	public function RegCompList()
	{

		$this->load->view('Partials/header');
		$this->load->view('Home/RegCompList');
		$this->load->view('Partials/footer');
	}

	public function edit_RegisterCompany($id)
	{
		$this->load->view('Partials/header');

		$this->load->model('Home_model');
		$data['reg_companies'] = $this->Home_model->edit_RegisterCompany($id);

		$this->load->view('Home/editRegisterCompany', $data);
		$this->load->view('Partials/footer');
	}
	public function update_RegisterCompany($id)
	{

		$data = [
			'name' => $this->input->post("name"),
			'email' => $this->input->post("email"),
			'code' => $this->input->post("code"),
			'contact_number' => $this->input->post("contact_number"),
			'whatsapp_number' => $this->input->post("whatsapp_number"),
			'address' => $this->input->post("address"),

		];
		$resp = $this->Home_model->update_RegisterCompany($data, $id);


		if ($resp) {
			$this->session->set_flashdata('msg', array('show_msg' => 'Field Updated successfully !', 'type' => 'success'));
		} else {
			$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
		}
		$this->load->model('Home_model');
		// redirect(base_url('reg_farmers'));
		redirect(site_url('index.php/Home/CompanyList'));
	}
	public function delete_RegisterCompany($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_RegisterCompany($id);
		redirect(site_url('index.php/Home/CompanyList'));
	}


	// Product
	public function AddProduct()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name")
				//'name' =>'description')
			);
			//echo $this->input->post("name");
			$resp = $this->Home_model->save_product($data);
			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Product added successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/ProductList'));
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/AddProduct');
		$this->load->view('Partials/footer');
	}
	public function ProductList()
	{


		$this->load->view('Partials/header');
		$this->load->view('Home/AddProductList');
		$this->load->view('Partials/footer');
	}

	public function edit_Product($id)
	{
		$this->load->view('Partials/header');

		$this->load->model('Home_model');
		$data['add_products'] = $this->Home_model->edit_Product($id);

		$this->load->view('Home/editProduct', $data);
		$this->load->view('Partials/footer');
	}

	public function update_Product($id)
	{

		$data = [
			'name' => $this->input->post("name"),

		];
		$resp = $this->Home_model->update_Product($data, $id);


		if ($resp) {
			$this->session->set_flashdata('msg', array('show_msg' => 'Field Updated successfully !', 'type' => 'success'));
		} else {
			$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
		}
		$this->load->model('Home_model');
		redirect(site_url('index.php/Home/ProductList'));
	}
	public function delete_Product($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_Product($id);
		redirect(site_url('index.php/Home/ProductList'));
	}


	// Billing section

	// Farmer
	private function farmer_BillingNumGenerate()
	{
		// Get the latest record from the billing table
		$last_billing = $this->Home_model->get_last_billing_farmers();

		if ($last_billing) {
			// Increment the billing number
			$last_number = (int) $last_billing->farmer_billing_num;
			return sprintf('%04d', $last_number + 1); // Generates 0001, 0002, etc.
		} else {
			// Start with 0001 if no record exists
			return '0001';
		}
	}

	public function NewFarmersBilling()
	{
		header('Access-Control-Allow-Origin: http://localhost:8080'); // Allow frontend
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow methods
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization'); // Allow headers
		header('Access-Control-Allow-Credentials: true'); // Allow credentials

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0); // Handle preflight request
		}

		if (!$this->input->post('farmer')) {
			log_message('error', 'farmer is missing.');
			echo json_encode(['status' => 'error', 'message' => 'Agent is required.']);
			return;
		}
		$paymentStatus = $this->input->post('payment_status');
		if ($paymentStatus !== 'Completed') {
			echo json_encode([
				'status' => 'success',
				'redirect_url' => 'http://localhost/dairy/index.php/Home/FarmersBillingList', // Redirection URL
			]);
			exit;
		}
		$billing_number = $this->farmer_BillingNumGenerate();


		$postData = [
			'farmer_billing_num' => $billing_number,
			'farmer'          => $this->input->post('farmer'),
			'company'        => $this->input->post('company'),
			'commission' => $this->input->post('commission'),
			'grand_total' => $this->input->post('grand_total'),
			'final_total' =>  $this->input->post('final_total'),
			'total_dues' =>  $this->input->post('total_dues'),
			'arhat_coolie'   => $this->input->post('arhat_coolie'),
			'britty'         => $this->input->post('britty'),
			'dan'            => $this->input->post('dan'),
			'jeep_fair'      => $this->input->post('jeep_fair'),
			'rail_coolie'    => $this->input->post('rail_coolie'),
			'ice_leaf'       => $this->input->post('ice_leaf'),
			'unio_n'         => $this->input->post('unio_n'),
			'misc_exp'       => $this->input->post('misc_exp'),
			'market_exp'     => $this->input->post('market_exp'),
			'grand_total'    => $this->input->post('grand_total'),
			'final_total'    => $this->input->post('final_total'),
			'cheque'		 => $this->input->post('cheque'),
			'cash'			 => $this->input->post('cash'),
			'online'		 => $this->input->post('online'),
			'payment_status' => $paymentStatus,
			'created_at'		 => $this->input->post('created_at'),
			'updated_at'		 => $this->input->post('updated_at'),
		];

		try {
			// Save billing record and get the billing ID

			$billing_id = $this->Home_model->get_farmersBilling($postData);
			if ($billing_id) {
				echo json_encode([
					'status' => 'success',
					'message' => 'Billing record created successfully.',
					'billing_id' => $billing_id,
				]);
			} else {
				// Failure response
				echo json_encode(['status' => 'error', 'message' => 'Failed to save billing record.']);
			}
		} catch (Exception $e) {
			log_message('error', 'Exception: ' . $e->getMessage());
			echo json_encode(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
		}

		return;

		$data['RegFarmerList'] = $this->Home_model->get_farmers();
		$data['RegCompaniesList'] = $this->Home_model->get_companies();
		$data['ProductList'] = $this->Home_model->get_products();

		$this->load->view('Partials/header');
		$this->load->view('vue-bill/src/components/BillingFarmer.vue', $data);
		$this->load->view('Partials/footer');
	}
	public function FarmersBillingList()
	{
		$data['billing_list'] = $this->db->select('bfr.*, f.name AS farmer, c.name AS company')
			->from('billing_farmer_records AS bfr')
			->join('reg_farmers AS f', 'bfr.farmer = f.id', 'left')
			->join('reg_companies AS c', 'bfr.company = c.id', 'left')
			->get()
			->result();
		$this->load->view('Partials/header');
		$this->load->view('Home/BillingFarmerList', $data);
		$this->load->view('Partials/footer');
	}
	public function get_FarmerDetails($id)
	{
		// Fetch agent details by ID
		$this->load->model('Home_model');
		$agent = $this->Home_model->getFarmerById($id); // Fetch agent data by ID
		if ($agent) {
			echo json_encode($agent); // Return agent details
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Agent not found.']);
		}
	}
	public function edit_BillingFarmer($id)
	{
		header('Access-Control-Allow-Origin: http://localhost:8080');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization');
		header('Access-Control-Allow-Credentials: true');

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0);
		}

		$this->load->model('Home_model');

		$billingRecord = $this->Home_model->edit_BillingFarmer($id);

		if ($billingRecord) {
			$groupedData = [];
			foreach ($billingRecord as $record) {
				if (!isset($groupedData[$record['product_name']])) {
					$groupedData[$record['product_name']] = [
						'name' => $record['product_name'],
						'fields' => [],
					];
				}
				$groupedData[$record['product_name']]['fields'][] = [
					'qty' => $record['qty'],
					'unit' => $record['unit'],
					'price' => $record['price'],
				];
			}
			$extraFields = [
				'billing_id' => $billingRecord[0]['billing_id'], // Assuming billing ID is consistent
				'farmer'          => $billingRecord[0]['farmer'],
				'company'        => $billingRecord[0]['company'],
				'commission'     => $billingRecord[0]['commission'],
				'grand_total'    => $billingRecord[0]['grand_total'],
				'final_total'    => $billingRecord[0]['final_total'],
				'total_dues'     => $billingRecord[0]['total_dues'],

				'arhat_coolie'   => $billingRecord[0]['arhat_coolie'],
				'britty'         => $billingRecord[0]['britty'],
				'dan'            => $billingRecord[0]['dan'],
				'jeep_fair'      => $billingRecord[0]['jeep_fair'],
				'rail_coolie'    => $billingRecord[0]['rail_coolie'],
				'ice_leaf'       => $billingRecord[0]['ice_leaf'],
				'unio_n'         => $billingRecord[0]['unio_n'],
				'misc_exp'       => $billingRecord[0]['misc_exp'],
				'market_exp'     => $billingRecord[0]['market_exp'],
				'grand_total'    => $billingRecord[0]['grand_total'],
				'final_total'    => $billingRecord[0]['final_total'],
				'cheque'		 => $billingRecord[0]['cheque'],
				'cash'			 => $billingRecord[0]['cash'],
				'online'		 => $billingRecord[0]['online'],
				'payment_status' => $billingRecord[0]['payment_status'],
				'created_at'		 => $billingRecord[0]['created_at'],
				'temp' => $billingRecord[0]["temp"],
				'code' => $billingRecord[0]["code"],
				'contact_number' => $billingRecord[0]["contact_number"],
				'address' => $billingRecord[0]["address"],
				'updated_at'		 => $billingRecord[0]['updated_at'],
			];


			echo json_encode([
				'status' => 'success',
				'data' => $groupedData,
				'extraFields' => $extraFields,
			]);
		} else {
			echo json_encode([
				'status' => 'error',
				'message' => 'No record found for the provided ID.',
			]);
		}
		return;
	}
	public function delete_FarmerBilling($id)
	{


		$this->load->model('Home_model');
		$this->Home_model->delete_BillingAgent($id);
		redirect(site_url('index.php/Home/FarmersBillingList'));
	}
	public function savefarmersProductDetails()
	{
		header('Access-Control-Allow-Origin: http://localhost:8080');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization');
		header('Access-Control-Allow-Credentials: true');

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0);
		}

		// Get input data
		$input = json_decode(file_get_contents('php://input'), true);

		if (!$input || !is_array($input)) {
			echo json_encode(['status' => 'error', 'message' => 'Invalid payload.']);
			return;
		}

		$batch_data = [];

		foreach ($input as $productData) {
			// Validate billing_id
			if (empty($productData['billing_id'])) {
				echo json_encode(['status' => 'error', 'message' => 'Missing billing_id.']);
				return;
			}

			if (empty($productData['product_id']) || !is_array($productData['fields'])) {
				echo json_encode(['status' => 'error', 'message' => 'Invalid product data.']);
				return;
			}

			foreach ($productData['fields'] as $field) {
				if (isset($field['qty'], $field['unit'], $field['price'])) {
					$batch_data[] = [
						'billing_id' => $productData['billing_id'], // Ensure billing_id is passed
						'product_id' => $productData['product_id'],
						'qty'        => $field['qty'],
						'unit'       => $field['unit'],
						'price'      => $field['price']
					];
				} else {
					echo json_encode(['status' => 'error', 'message' => 'Invalid field data.']);
					return;
				}
			}
		}

		// Log the received data for debugging
		log_message('info', 'Received product data: ' . print_r($batch_data, true));

		try {
			// Save the batch data using the model
			$saved = $this->Home_model->save_farmersBillingproductDetails($batch_data);

			if ($saved) {
				echo json_encode(['status' => 'success', 'message' => 'Product details saved successfully.']);
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Failed to save product details.']);
			}
		} catch (Exception $e) {
			log_message('error', 'Exception: ' . $e->getMessage());
			echo json_encode(['status' => 'error', 'message' => 'An internal error occurred.']);
		}
	}
	public function farmersBillingWithProducts($billing_id)
	{
		$result = $this->Home_model->get_farmersbilling_products($billing_id);

		if ($result) {
			echo json_encode(['status' => 'success', 'data' => $result]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No matching records found.']);
		}
	}
	public function delete_BillingFarmer($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_BillingFarmer($id);
		redirect(site_url('index.php/Home/FarmersBillingList'));
	}
	// Agents
	private function Agents_BillingNumGenerate()
	{
		// Get the latest record from the billing table
		$last_billing = $this->Home_model->get_last_billing_agents();

		if ($last_billing) {
			// Increment the billing number
			$last_number = (int) $last_billing->billing_number;
			return sprintf('%04d', $last_number + 1); // Generates 0001, 0002, etc.
		} else {
			// Start with 0001 if no record exists
			return '0001';
		}
	}
	public function NewAgentsBilling()
	{
		header('Access-Control-Allow-Origin: http://localhost:8080'); // Allow frontend
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow methods
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization'); // Allow headers
		header('Access-Control-Allow-Credentials: true'); // Allow credentials

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0); // Handle preflight request
		}

		if (!$this->input->post('agent')) {
			log_message('error', 'Agent is missing.');
			echo json_encode(['status' => 'error', 'message' => 'Agent is required.']);
			return;
		}

		$paymentStatus = $this->input->post('payment_status');
		if ($paymentStatus !== 'Completed') {
			echo json_encode([
				'status' => 'error',
				'message' => 'Payment status must be completed.',
			]);
			return;
		}

		$billing_number = $this->Agents_BillingNumGenerate();

		$postData = [
			'billing_number' => $billing_number,
			'agent'          => $this->input->post('agent'),
			'company'        => $this->input->post('company'),
			'commission'     => $this->input->post('commission'),
			'grand_total'    => $this->input->post('grand_total'),
			'final_total'    => $this->input->post('final_total'),
			'total_dues'     => $this->input->post('total_dues'),
			'arhat_coolie'   => $this->input->post('arhat_coolie'),
			'britty'         => $this->input->post('britty'),
			'dan'            => $this->input->post('dan'),
			'jeep_fair'      => $this->input->post('jeep_fair'),
			'rail_coolie'    => $this->input->post('rail_coolie'),
			'ice_leaf'       => $this->input->post('ice_leaf'),
			'unio_n'         => $this->input->post('unio_n'),
			'misc_exp'       => $this->input->post('misc_exp'),
			'market_exp'     => $this->input->post('market_exp'),
			'grand_total'    => $this->input->post('grand_total'),
			'final_total'    => $this->input->post('final_total'),
			'cheque'		 => $this->input->post('cheque'),
			'cash'			 => $this->input->post('cash'),
			'online'		 => $this->input->post('online'),
			'payment_status' => $paymentStatus,
			'created_at'		 => $this->input->post('created_at'),
			'updated_at'		 => $this->input->post('updated_at'),

		];

		try {
			// Save billing record and get the billing ID

			$billing_id = $this->Home_model->get_agentsBilling($postData);
			if ($billing_id) {
				echo json_encode([
					'status' => 'success',
					'message' => 'Billing record created successfully.',
					'billing_id' => $billing_id,
				]);
			} else {
				// Failure response
				echo json_encode(['status' => 'error', 'message' => 'Failed to save billing record.']);
			}
		} catch (Exception $e) {
			log_message('error', 'Exception: ' . $e->getMessage());
			echo json_encode(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
		}


		$data['RegAgentList'] = $this->Home_model->get_agents();
		$data['RegCompaniesList'] = $this->Home_model->get_companies();
		$data['ProductList'] = $this->Home_model->get_products();
	}
	public function AgentsBillingList()
	{

		$data['billing_list'] = $this->db->select('bfr.*, f.name AS agent, c.name AS company')
			->from('billing_agent_records AS bfr')
			->join('reg_agents AS f', 'bfr.agent = f.id', 'left')
			->join('reg_companies AS c', 'bfr.company = c.id', 'left')
			->get()
			->result();
		$this->load->view('Partials/header');
		$this->load->view('Home/BillingAgentList', $data);
		$this->load->view('Partials/footer');
	}
	public function updateBillingAgent()
	{
		header('Access-Control-Allow-Origin: http://localhost:8080'); // Allow frontend
		header('Access-Control-Allow-Methods: POST'); // Allow POST method
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization'); // Allow headers
		header('Access-Control-Allow-Credentials: true'); // Allow credentials

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0); // Handle preflight request
		}
		try {
			// Decode incoming JSON data
			$data = json_decode(file_get_contents("php://input"), true);

			// Validate incoming data
			if (empty($data['billing_id'])) {
				throw new Exception('Billing ID is required.');
			}

			if (empty($data['agent'])) {
				throw new Exception('Agent information is required.');
			}

			// Extract billing data
			$billing_id = $data['billing_id'];

			// Prepare the data for the main billing table
			$billingData = [
				'agent' => $data['agent'],
				'company' => $data['company'],
				'commission' => $data['commission'],
				'final_total' => $data['final_total'],
				'grand_total' => $data['grand_total'],
				'total_dues' => $data['total_dues'],
				'payment_status' => $data['payment_status'],
				'arhat_coolie'   => $data['arhat_coolie'],
				'britty'         => $data['britty'],
				'dan'            => $data['dan'],
				'jeep_fair'      => $data['jeep_fair'],
				'rail_coolie'    => $data['rail_coolie'],
				'ice_leaf'       => $data['ice_leaf'],
				'unio_n'         => $data['unio_n'],
				'misc_exp'       => $data['misc_exp'],
				'market_exp'     => $data['market_exp'],
				'grand_total'    => $data['grand_total'],
				'final_total'    => $data['final_total'],
				'cheque'		 => $data['cheque'],
				'cash'			 => $data['cash'],
				'online'		 => $data['online'],
				'created_at' => $data['created_at'],
				// 'temp' => $data['temp'],
				// 'code' => $data['code'],
				// 'address' => $data['address'],
				// 'contact_number' => $data['contact_number'],
			];

			// Start a database transaction
			$this->db->trans_start();

			// Update the main billing record
			$updateBilling = $this->Home_model->update_billingAgentRecord($billing_id, $billingData);
			if (!$updateBilling) {
				throw new Exception('Failed to update billing agent record.');
			}




			// Insert new product records
			if (!empty($data['product_details'])) {
				foreach ($data['product_details'] as $product) {
					$productData = [
						'billing_id' => $billing_id,
						'product_id' => $product['product_id'],
						'qty' => $product['qty'],
						'unit' => $product['unit'],
						'price' => $product['price'],
					];

					$insertProduct = $this->db->insert('billing_agent_product_records', $productData);
					if (!$insertProduct) {
						throw new Exception('Failed to insert product records.');
					}
				}
			}

			// Complete the transaction
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE) {
				throw new Exception('Database transaction failed.');
			}

			// Respond with success
			echo json_encode(['status' => 'success', 'message' => 'Billing agent record updated successfully.']);
		} catch (Exception $e) {
			// Rollback transaction if any error occurs
			$this->db->trans_rollback();

			// Log the error for debugging (optional)
			log_message('error', $e->getMessage());

			// Respond with error
			echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
		}
	}

	// 	public function updateBillingAgent()
	// {
	//     header('Access-Control-Allow-Origin: http://localhost:8080');
	//     header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
	//     header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization');
	//     header('Access-Control-Allow-Credentials: true');

	//     if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	//         exit(0);
	//     }

	//     $input = json_decode(file_get_contents('php://input'), true);

	//     if (empty($input['billing_id'])) {
	//         echo json_encode(['status' => 'error', 'message' => 'Billing ID is required.']);
	//         return;
	//     }

	//     $billing_id = $input['billing_id'];

	//     $billingData = [
	//         'agent'          => $input['agent'],
	//         'company'        => $input['company'],
	//         'commission'     => $input['commission'],
	//         'grand_total'    => $input['grand_total'],
	//         'final_total'    => $input['final_total'],
	//         'total_dues'     => $input['total_dues'],
	//         'arhat_coolie'   => $input['arhat_coolie'],
	//         'britty'         => $input['britty'],
	//         'dan'            => $input['dan'],
	//         'jeep_fair'      => $input['jeep_fair'],
	//         'rail_coolie'    => $input['rail_coolie'],
	//         'ice_leaf'       => $input['ice_leaf'],
	//         'unio_n'         => $input['unio_n'],
	//         'misc_exp'       => $input['misc_exp'],
	//         'market_exp'     => $input['market_exp'],
	//         'cheque'         => $input['cheque'],
	//         'cash'           => $input['cash'],
	//         'online'         => $input['online'],
	//         'payment_status' => $input['payment_status'],
	//         'updated_at'     => date('Y-m-d H:i:s'),
	//     ];

	//     $productDetails = $input['product_details']; // Array of products with qty, unit, price

	//     $this->load->model('Home_model');

	//     try {
	//         $updateStatus = $this->Home_model->update_billingAgentRecord($billing_id, $billingData);

	//         if (!$updateStatus) {
	//             echo json_encode(['status' => 'error', 'message' => 'Failed to update billing record.']);
	//             return;
	//         }

	//         $this->Home_model->delete_billingAgentProducts($billing_id); // Delete old product records
	//         $productData = [];
	//         foreach ($productDetails as $product) {
	//             $productData[] = [
	//                 'billing_id' => $billing_id,
	//                 'product_id' => $product['product_id'],
	//                 'qty'        => $product['qty'],
	//                 'unit'       => $product['unit'],
	//                 'price'      => $product['price'],
	//             ];
	//         }

	//         $this->Home_model->save_agentsBillingproductDetails($productData);

	//         echo json_encode(['status' => 'success', 'message' => 'Billing record updated successfully.']);
	//     } catch (Exception $e) {
	//         log_message('error', 'Exception: ' . $e->getMessage());
	//         echo json_encode(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
	//     }
	// }

	// public function update_BillingAgent()
	// {
	// 	header('Access-Control-Allow-Origin: http://localhost:8080'); // Allow frontend
	// 	header('Access-Control-Allow-Methods: POST'); // Allow POST method
	// 	header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization'); // Allow headers
	// 	header('Access-Control-Allow-Credentials: true'); // Allow credentials

	// 	if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	// 		exit(0); // Handle preflight request
	// 	}
	// 	if ($this->input->server('REQUEST_METHOD') !== 'POST') {
	// 		show_404();
	// 	}
	// 	log_message('debug', 'update_BillingAgent function was called.');

	// 	$id = $this->input->post('id'); // ID of the record to update
	// 	$postData = [
	// 		'billing_number' => $this->input->post('billing_number'),
	// 		'agent'          => $this->input->post('agent'),
	// 		'company'        => $this->input->post('company'),
	// 		'grand_total'    => $this->input->post('grand_total'),
	// 		'final_total'    => $this->input->post('final_total'),
	// 		'total_dues'     => $this->input->post('total_dues'),
	// 		'commission'     => $this->input->post('commission'),
	// 		'arhat_coolie'   => $this->input->post('arhat_coolie'),
	// 		'britty'         => $this->input->post('britty'),
	// 		'dan'            => $this->input->post('dan'),
	// 		'jeep_fair'      => $this->input->post('jeep_fair'),
	// 		'rail_coolie'    => $this->input->post('rail_coolie'),
	// 		'ice_leaf'       => $this->input->post('ice_leaf'),
	// 		'unio_n'         => $this->input->post('unio_n'),
	// 		'misc_exp'       => $this->input->post('misc_exp'),
	// 		'market_exp'     => $this->input->post('market_exp'),
	// 		'grand_total'    => $this->input->post('grand_total'),
	// 		'final_total'    => $this->input->post('final_total'),
	// 		'cheque'		 => $this->input->post('cheque'),
	// 		'cash'			 => $this->input->post('cash'),
	// 		'online'		 => $this->input->post('online'),
	// 		'created_at'		 => $this->input->post('created_at'),
	// 		'updated_at'		 => $this->input->post('updated_at'),
	// 		'payment_status' => $this->input->post('payment_status'),

	// 	];

	// 	$this->load->model('Home_model');
	// 	$result = $this->Home_model->update_BillingAgent($id, $postData);

	// 	if ($result) {
	// 		echo json_encode([
	// 			'status' => 'success',
	// 			'message' => 'Record updated successfully.',
	// 			'redirect_url' => 'http://localhost/dairy/index.php/Home/AgentsBillingList', // Redirection URL
	// 		]);
	// 	} else {
	// 		echo json_encode(['status' => 'error', 'message' => 'Failed to update record.']);
	// 	}
	// }

	public function saveAgentsProductDetails()
	{
		header('Access-Control-Allow-Origin: http://localhost:8080');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization');
		header('Access-Control-Allow-Credentials: true');

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0);
		}

		// Get input data
		$input = json_decode(file_get_contents('php://input'), true);

		if (!$input || !is_array($input)) {
			echo json_encode(['status' => 'error', 'message' => 'Invalid payload.']);
			return;
		}

		$batch_data = [];

		foreach ($input as $productData) {
			// Validate billing_id
			if (empty($productData['billing_id'])) {
				echo json_encode(['status' => 'error', 'message' => 'Missing billing_id.']);
				return;
			}

			if (empty($productData['product_id']) || !is_array($productData['fields'])) {
				echo json_encode(['status' => 'error', 'message' => 'Invalid product data.']);
				return;
			}

			foreach ($productData['fields'] as $field) {
				if (isset($field['qty'], $field['unit'], $field['price'])) {
					$batch_data[] = [
						'billing_id' => $productData['billing_id'], // Ensure billing_id is passed
						'product_id' => $productData['product_id'],
						'qty'        => $field['qty'],
						'unit'       => $field['unit'],
						'price'      => $field['price']
					];
				} else {
					echo json_encode(['status' => 'error', 'message' => 'Invalid field data.']);
					return;
				}
			}
		}

		// Log the received data for debugging
		log_message('info', 'Received product data: ' . print_r($batch_data, true));

		try {
			// Save the batch data using the model
			$saved = $this->Home_model->save_agentsBillingproductDetails($batch_data);

			if ($saved) {
				echo json_encode(['status' => 'success', 'message' => 'Product details saved successfully.']);
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Failed to save product details.']);
			}
		} catch (Exception $e) {
			log_message('error', 'Exception: ' . $e->getMessage());
			echo json_encode(['status' => 'error', 'message' => 'An internal error occurred.']);
		}
	}
	// public function updateAgentBillingWithProducts($id)
	// {
	// 	header('Access-Control-Allow-Origin: *');
	// 	header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	// 	header('Access-Control-Allow-Headers: Content-Type, Authorization');

	// 	// Collect data for updating
	// 	$data = [
	// 		// The billing agent data you want to update
	// 		'billing_number' => $this->input->post('billing_number'),
	// 		'agent'          => $this->input->post('agent'),
	// 		'company'        => $this->input->post('company'),
	// 		'grand_total'    => $this->input->post('grand_total'),
	// 		'final_total'    => $this->input->post('final_total'),
	// 		'total_dues'     => $this->input->post('total_dues'),
	// 		'commission'     => $this->input->post('commission'),
	// 		'arhat_coolie'   => $this->input->post('arhat_coolie'),
	// 		'britty'         => $this->input->post('britty'),
	// 		'dan'            => $this->input->post('dan'),
	// 		'jeep_fair'      => $this->input->post('jeep_fair'),
	// 		'rail_coolie'    => $this->input->post('rail_coolie'),
	// 		'ice_leaf'       => $this->input->post('ice_leaf'),
	// 		'unio_n'         => $this->input->post('unio_n'),
	// 		'misc_exp'       => $this->input->post('misc_exp'),
	// 		'market_exp'     => $this->input->post('market_exp'),
	// 		'grand_total'    => $this->input->post('grand_total'),
	// 		'final_total'    => $this->input->post('final_total'),
	// 		'cheque'		 => $this->input->post('cheque'),
	// 		'cash'			 => $this->input->post('cash'),
	// 		'online'		 => $this->input->post('online'),
	// 		'created_at'		 => $this->input->post('created_at'),
	// 		'updated_at'		 => $this->input->post('updated_at'),
	// 		'payment_status' => $this->input->post('payment_status'),
	// 		// Other fields to update
	// 	];



	// 	// Call the model function to update the billing agent with products
	// 	$result = $this->Home_model->update_BillingAgent($id, $data);

	// 	if ($result) {
	// 		echo json_encode([
	// 			'status' => 'success',
	// 			'message' => 'Record updated successfully.',
	// 			'redirect_url' => 'http://localhost/dairy/index.php/Home/AgentsBillingList', // Redirection URL
	// 		]);
	// 	} else {
	// 		echo json_encode(['status' => 'error', 'message' => 'Failed to update record.']);
	// 	}
	// 	// Redirect or load a view after the update is successful
	// }

	public function agentsBillingWithProducts($billing_id)
	{
		$result = $this->Home_model->get_agentsbilling_products($billing_id);

		if ($result) {
			echo json_encode(['status' => 'success', 'data' => $result]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No matching records found.']);
		}
	}
	public function get_AgentDetails($id)
	{
		header('Access-Control-Allow-Origin: http://localhost:8080'); // Allow frontend
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow methods
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization'); // Allow headers
		header('Access-Control-Allow-Credentials: true'); // Allow credentials

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0); // Handle preflight request
		}
		// Fetch agent details by ID
		$this->load->model('Home_model');
		$agent = $this->Home_model->getAgentById($id); // Fetch agent data by ID
		if ($agent) {
			echo json_encode($agent); // Return agent details
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Agent not found.']);
		}
	}

	public function edit_BillingAgent($id)
	{
		header('Access-Control-Allow-Origin: http://localhost:8080');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization');
		header('Access-Control-Allow-Credentials: true');

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0);
		}

		try {
			$this->load->model('Home_model');

			// Fetch the billing record by ID
			$billingRecord = $this->Home_model->edit_BillingAgent($id);

			// Check if a record is returned
			if (!$billingRecord || empty($billingRecord)) {
				throw new Exception('No record found for the provided ID.');
			}

			// Group product-related data
			$groupedData = [];
			foreach ($billingRecord as $record) {
				if (!isset($groupedData[$record['product_name']])) {
					$groupedData[$record['product_name']] = [
						'name' => $record['product_name'],
						'id' => $record['product_id'],
						'fields' => [],
					];
				}
				$groupedData[$record['product_name']]['fields'][] = [
					'qty' => $record['qty'],
					'unit' => $record['unit'],
					'price' => $record['price'],
				];
			}

			// Extra fields related to billing record
			$extraFields = [
				'billing_id' => $billingRecord[0]['billing_id'],
				'agent' => $billingRecord[0]['agent'],
				'company' => $billingRecord[0]['company'],
				'commission' => $billingRecord[0]['commission'],
				'grand_total' => $billingRecord[0]['grand_total'],
				'final_total' => $billingRecord[0]['final_total'],
				'total_dues' => $billingRecord[0]['total_dues'],
				'arhat_coolie' => $billingRecord[0]['arhat_coolie'],
				'britty' => $billingRecord[0]['britty'],
				'dan' => $billingRecord[0]['dan'],
				'jeep_fair' => $billingRecord[0]['jeep_fair'],
				'rail_coolie' => $billingRecord[0]['rail_coolie'],
				'ice_leaf' => $billingRecord[0]['ice_leaf'],
				'unio_n' => $billingRecord[0]['unio_n'],
				'misc_exp' => $billingRecord[0]['misc_exp'],
				'market_exp' => $billingRecord[0]['market_exp'],
				'cheque' => $billingRecord[0]['cheque'],
				'cash' => $billingRecord[0]['cash'],
				'online' => $billingRecord[0]['online'],
				'payment_status' => $billingRecord[0]['payment_status'],
				'created_at' => $billingRecord[0]['created_at'],
				'temp' => $billingRecord[0]['temp'],
				'code' => $billingRecord[0]['code'],
				'contact_number' => $billingRecord[0]['contact_number'],
				'address' => $billingRecord[0]['address'],
				'updated_at' => $billingRecord[0]['updated_at'],
			];

			// Return success response
			echo json_encode([
				'status' => 'success',
				'data' => $groupedData,
				'extraFields' => $extraFields,
			]);
		} catch (Exception $e) {
			// Log error for debugging
			log_message('error', $e->getMessage());

			// Return error response
			echo json_encode([
				'status' => 'error',
				'message' => $e->getMessage(),
			]);
		}
	}

	public function delete_AgentBilling($id)
	{


		$this->load->model('Home_model');
		$this->Home_model->delete_BillingAgent($id);
		redirect(site_url('index.php/Home/AgentsBillingList'));
	}

	// Retailers billing section


	private function Retailers_BillingNumGenerate()
	{
		// Get the latest record from the billing table
		$last_billing = $this->Home_model->get_last_billing_Retailer();

		if ($last_billing) {
			// Increment the billing number
			$last_number = (int) $last_billing->retailer_billing_num;
			return sprintf('%04d', $last_number + 1); // Generates 0001, 0002, etc.
		} else {
			// Start with 0001 if no record exists
			return '0001';
		}
	}
	public function NewRetailersBilling()
	{
		header('Access-Control-Allow-Origin: http://localhost:8080'); // Allow frontend
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow methods
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization'); // Allow headers
		header('Access-Control-Allow-Credentials: true'); // Allow credentials

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0); // Handle preflight request
		}

		if (!$this->input->post('retailer')) {
			log_message('error', 'Retailers is missing.');
			echo json_encode(['status' => 'error', 'message' => 'Retailer is required.']);
			return;
		}
		$paymentStatus = $this->input->post('payment_status');
		if ($paymentStatus !== 'Completed') {
			echo json_encode([
				'status' => 'success',
				'redirect_url' => 'http://localhost/dairy/index.php/Home/RetailersBillingList', // Redirection URL
			]);
			exit;
		}
		$billing_number = $this->Retailers_BillingNumGenerate();


		$postData = [
			'retailer_billing_num' => $billing_number,
			'retailer'          => $this->input->post('retailer'),
			'company'        => $this->input->post('company'),
			'commission' => $this->input->post('commission'),
			'grand_total' => $this->input->post('grand_total'),
			'final_total' =>  $this->input->post('final_total'),
			'total_dues' =>  $this->input->post('total_dues'),
			'arhat_coolie'   => $this->input->post('arhat_coolie'),
			'britty'         => $this->input->post('britty'),
			'dan'            => $this->input->post('dan'),
			'jeep_fair'      => $this->input->post('jeep_fair'),
			'rail_coolie'    => $this->input->post('rail_coolie'),
			'ice_leaf'       => $this->input->post('ice_leaf'),
			'unio_n'         => $this->input->post('unio_n'),
			'misc_exp'       => $this->input->post('misc_exp'),
			'market_exp'     => $this->input->post('market_exp'),
			'grand_total'    => $this->input->post('grand_total'),
			'final_total'    => $this->input->post('final_total'),
			'cheque'		 => $this->input->post('cheque'),
			'cash'			 => $this->input->post('cash'),
			'online'		 => $this->input->post('online'),
			'payment_status' => $paymentStatus,
			'created_at'		 => $this->input->post('created_at'),
			'updated_at'		 => $this->input->post('updated_at'),
		];

		try {
			// Save billing record and get the billing ID

			$billing_id = $this->Home_model->get_retailersBilling($postData);
			if ($billing_id) {
				echo json_encode([
					'status' => 'success',
					'message' => 'Billing record created successfully.',
					'billing_id' => $billing_id,
				]);
			} else {
				// Failure response
				echo json_encode(['status' => 'error', 'message' => 'Failed to save billing record.']);
			}
		} catch (Exception $e) {
			log_message('error', 'Exception: ' . $e->getMessage());
			echo json_encode(['status' => 'error', 'message' => 'An error occurred: ' . $e->getMessage()]);
		}

		return;

		$data['RegRetailersList'] = $this->Home_model->get_retailers();
		$data['RegCompaniesList'] = $this->Home_model->get_companies();
		$data['ProductList'] = $this->Home_model->get_products();


		$this->load->view('Partials/header');
		$this->load->view('vue-bill/src/components/BillingRetailer.vue', $data);
		$this->load->view('Partials/footer');
	}
	public function RetailersBillingList()
	{
		$data['billing_list'] = $this->db->select('bfr.*, r.name AS retailer, c.name AS company')
			->from('billing_retailer_records AS bfr')
			->join('reg_retailers AS r', 'bfr.retailer = r.id', 'left')
			->join('reg_companies AS c', 'bfr.company = c.id', 'left')
			->get()
			->result();
		$this->load->view('Partials/header');
		$this->load->view('Home/BillingretailerList', $data);
		$this->load->view('Partials/footer');
	}
	public function saveRetailersProductDetails()
	{
		header('Access-Control-Allow-Origin: http://localhost:8080'); // Allow frontend
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow methods
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization'); // Allow headers
		header('Access-Control-Allow-Credentials: true'); // Allow credentials

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0);
		}

		// Get input data
		$input = json_decode(file_get_contents('php://input'), true);

		if (!$input || !is_array($input)) {
			echo json_encode(['status' => 'error', 'message' => 'Invalid payload.']);
			return;
		}

		$batch_data = [];

		foreach ($input as $productData) {
			if (empty($productData['product_id']) || !is_array($productData['fields'])) {
				echo json_encode(['status' => 'error', 'message' => 'Invalid product data.']);
				return;
			}

			foreach ($productData['fields'] as $field) {
				if (isset($field['qty'], $field['unit'], $field['price'])) {
					$batch_data[] = [
						'product_id' => $productData['product_id'],
						'qty'        => $field['qty'],
						'unit'       => $field['unit'],
						'price'      => $field['price']
					];
				} else {
					echo json_encode(['status' => 'error', 'message' => 'Invalid field data.']);
					return;
				}
			}
		}

		// Log the received data for debugging
		log_message('info', 'Received product data: ' . print_r($batch_data, true));

		try {
			// Save the batch data using the model
			$saved = $this->Home_model->save_RetailersBillingproductDetails($batch_data);

			if ($saved) {
				echo json_encode(['status' => 'success', 'message' => 'Product details saved successfully.']);
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Failed to save product details.']);
			}
		} catch (Exception $e) {
			log_message('error', 'Exception: ' . $e->getMessage());
			echo json_encode(['status' => 'error', 'message' => 'An internal error occurred.']);
		}
	}
	public function delete_BillingRetailer($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_BillingRetailer($id);
		redirect(site_url('index.php/Home/RetailersBillingList'));
	}
	public function edit_BillingRetailer($id)
	{
		header('Access-Control-Allow-Origin: http://localhost:8080');
		header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization');
		header('Access-Control-Allow-Credentials: true');

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0);
		}

		$this->load->model('Home_model');

		$billingRecord = $this->Home_model->edit_BillingRetailer($id);

		if ($billingRecord) {
			$groupedData = [];
			foreach ($billingRecord as $record) {
				if (!isset($groupedData[$record['product_name']])) {
					$groupedData[$record['product_name']] = [
						'name' => $record['product_name'],
						'fields' => [],
					];
				}
				$groupedData[$record['product_name']]['fields'][] = [
					'qty' => $record['qty'],
					'unit' => $record['unit'],
					'price' => $record['price'],
				];
			}
			$extraFields = [
				'billing_id' => $billingRecord[0]['billing_id'], // Assuming billing ID is consistent
				// 'billing_number' => $billing_number,
				'retailer'          => $billingRecord[0]['retailer'],
				'company'        => $billingRecord[0]['company'],
				'commission'     => $billingRecord[0]['commission'],
				'grand_total'    => $billingRecord[0]['grand_total'],
				'final_total'    => $billingRecord[0]['final_total'],
				'total_dues'     => $billingRecord[0]['total_dues'],
				'arhat_coolie'   => $billingRecord[0]['arhat_coolie'],
				'britty'         => $billingRecord[0]['britty'],
				'dan'            => $billingRecord[0]['dan'],
				'jeep_fair'      => $billingRecord[0]['jeep_fair'],
				'rail_coolie'    => $billingRecord[0]['rail_coolie'],
				'ice_leaf'       => $billingRecord[0]['ice_leaf'],
				'unio_n'         => $billingRecord[0]['unio_n'],
				'misc_exp'       => $billingRecord[0]['misc_exp'],
				'market_exp'     => $billingRecord[0]['market_exp'],
				'grand_total'    => $billingRecord[0]['grand_total'],
				'final_total'    => $billingRecord[0]['final_total'],
				'cheque'		 => $billingRecord[0]['cheque'],
				'cash'			 => $billingRecord[0]['cash'],
				'online'		 => $billingRecord[0]['online'],
				'payment_status' => $billingRecord[0]['payment_status'],
				'created_at'		 => $billingRecord[0]['created_at'],
				'temp' => $billingRecord[0]["temp"],
				'code' => $billingRecord[0]["code"],
				'contact_number' => $billingRecord[0]["contact_number"],
				'address' => $billingRecord[0]["address"],
				'updated_at'		 => $billingRecord[0]['updated_at'],
			];


			echo json_encode([
				'status' => 'success',
				'data' => $groupedData,
				'extraFields' => $extraFields,
			]);
		} else {
			echo json_encode([
				'status' => 'error',
				'message' => 'No record found for the provided ID.',
			]);
		}
		return;
	}
	public function update_BillingRetailer()
	{
		header('Access-Control-Allow-Origin: http://localhost:8080'); // Allow frontend
		header('Access-Control-Allow-Methods: POST'); // Allow POST method
		header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization'); // Allow headers
		header('Access-Control-Allow-Credentials: true'); // Allow credentials

		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
			exit(0); // Handle preflight request
		}
		if ($this->input->server('REQUEST_METHOD') !== 'POST') {
			show_404();
		}
		log_message('debug', 'update_BillingRetailer function was called.');

		$id = $this->input->post('id'); // ID of the record to update
		$postData = [
			'retailer_billing_num' => $this->input->post('retailer_billing_num'),
			'retailer'          => $this->input->post('retailer'),
			'company'        => $this->input->post('company'),
			'grand_total'    => $this->input->post('grand_total'),
			'final_total'    => $this->input->post('final_total'),
			'total_dues'     => $this->input->post('total_dues'),
			'commission'     => $this->input->post('commission'),
			'arhat_coolie'   => $this->input->post('arhat_coolie'),
			'britty'         => $this->input->post('britty'),
			'dan'            => $this->input->post('dan'),
			'jeep_fair'      => $this->input->post('jeep_fair'),
			'rail_coolie'    => $this->input->post('rail_coolie'),
			'ice_leaf'       => $this->input->post('ice_leaf'),
			'unio_n'         => $this->input->post('unio_n'),
			'misc_exp'       => $this->input->post('misc_exp'),
			'market_exp'     => $this->input->post('market_exp'),
			'grand_total'    => $this->input->post('grand_total'),
			'final_total'    => $this->input->post('final_total'),
			'cheque'		 => $this->input->post('cheque'),
			'cash'			 => $this->input->post('cash'),
			'online'		 => $this->input->post('online'),
			'created_at'		 => $this->input->post('created_at'),
			'updated_at'		 => $this->input->post('updated_at'),
			'payment_status' => $this->input->post('payment_status'),

		];

		$this->load->model('Home_model');
		$result = $this->Home_model->update_BillingRetailer($id, $postData);

		if ($result) {
			echo json_encode([
				'status' => 'success',
				'message' => 'Record updated successfully.',
				'redirect_url' => 'http://localhost/dairy/index.php/Home/AgentsBillingList', // Redirection URL
			]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to update record.']);
		}
	}
	public function get_RetailerDetails($id)
	{
		// Fetch agent details by ID
		$this->load->model('Home_model');
		$retailer = $this->Home_model->getRetailerById($id); // Fetch agent data by ID
		if ($retailer) {
			echo json_encode($retailer); // Return agent details
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Agent not found.']);
		}
	}

	public function retailersBillingWithProducts($billing_id)
	{
		$result = $this->Home_model->get_retailersbilling_products($billing_id);

		if ($result) {
			echo json_encode(['status' => 'success', 'data' => $result]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No matching records found.']);
		}
	}











	// Expenses
	// Categories
	public function ExpCategories()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name"),
				'description' => $this->input->post("description"),
				'amount' => $this->input->post("amount"),
				'expense_date' => date('Y-m-d', strtotime($this->input->post('expense_date'))),

				'added_at' => date('Y-m-d h:i:s'),
				//  'updated_by' => $this->input->post("updated_by"),
				'updated_at' => date('Y-m-d h:i:s'),
			);

			$resp = $this->Home_model->save_categories($data);
			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Category added successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/ExpCatgList'));
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/ExpCategories');
		$this->load->view('Partials/footer');
	}

	public function ExpCatgList()
	{

		$this->load->view('Partials/header');
		$this->load->view('Home/ExpcatgList.php');
		$this->load->view('Partials/footer');
	}
	public function edit_ExpenseCategories($id)
	{
		$this->load->view('Partials/header');

		$this->load->model('Home_model');
		$data['add_categories'] = $this->Home_model->edit_ExpenseCategories($id);

		$this->load->view('Home/editExpenseCategory', $data);
		$this->load->view('Partials/footer');
	}

	public function update_ExpenseCategories($id)
	{
		$data = [
			'name' => $this->input->post("name"),
			'description' => $this->input->post("description"),
			'amount' => $this->input->post("amount"),
			'expense_date' => date('Y-m-d', strtotime($this->input->post('expense_date'))),
			// 'added_by' => $this->input->post("added_by"),
			'added_at' => date('Y-m-d h:i:s'),
			//  'updated_by' => $this->input->post("updated_by"),
			'updated_at' => date('Y-m-d h:i:s'),

		];
		$resp = $this->Home_model->update_ExpenseCategories($data, $id);


		if ($resp) {
			$this->session->set_flashdata('msg', array('show_msg' => 'Field Updated successfully !', 'type' => 'success'));
		} else {
			$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
		}
		$this->load->model('Home_model');
		redirect(site_url('index.php/Home/ExpCatgList'));
	}
	public function delete_ExpenseCategories($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_ExpenseCategories($id);
		redirect(site_url('index.php/Home/ExpCatgList'));
	}
	// Daybook

	public function ExpDaybook()
	{

		if ($this->input->post()) {
			//have post
			$data = array(
				'expense_by' => $this->input->post("expense_by"),
				'Amount' => $this->input->post("Amount"),
				'Company' => $this->input->post("Company"),
				'Category' => $this->input->post("Category"),
				// 'Expense_date' => $expense_date,
				'Expense_date' => date('Y-m-d', strtotime($this->input->post('Expense_date'))),

				// 'added_by' => $this->input->post("added_by"),
				'added_at' => date('Y-m-d h:i:s'),
				//  'updated_by' => $this->input->post("updated_by"),
				'updated_at' => date('Y-m-d h:i:s'),
			);
			$resp = $this->Home_model->save_daybook($data);
			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Registration made successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/ExpDaybookList'));
		}
		// 'countries' => $countries->result()
		$data['RegCompanyList'] = $this->Home_model->get_companies();
		$data['ExpCategoryList'] = $this->Home_model->get_categories();

		//$data['RegCompanyList'] = $companies;
		// $data = array(
		// 	'RegCompanyList' => $companies
		// );
		$this->load->view('Partials/header');
		$this->load->view('Home/ExpDaybook', $data);
		$this->load->view('Partials/footer');
	}

	public function ExpDaybookList()
	{


		$this->load->view('Partials/header');
		$this->load->view('Home/ExpDaybookList');
		$this->load->view('Partials/footer');
	}
	public function edit_ExpenseDaybook($id)
	{
		$this->load->view('Partials/header');

		$this->load->model('Home_model');
		$data['expense_daybook'] = $this->Home_model->edit_ExpenseDaybook($id);
		// 'countries' => $countries->result()
		$data['RegCompanyList'] = $this->Home_model->get_companies();
		$data['ExpCategoryList'] = $this->Home_model->get_categories();

		$this->load->view('Home/editExpenseDaybook', $data);
		$this->load->view('Partials/footer');
	}

	public function update_ExpenseDaybook($id)
	{
		$data = [
			'expense_by' => $this->input->post("expense_by"),
			'Amount' => $this->input->post("Amount"),
			'Expense_date' => date('Y-m-d', strtotime($this->input->post('Expense_date'))),
			'Company' => $this->input->post("Company"),
			'Category' => $this->input->post("Category"),

			// 'Expense_date' => $this->input->post("Expense_date"),
			// 'added_by' => $this->input->post("added_by"),
			'added_at' => date('Y-m-d h:i:s'),
			//  'updated_by' => $this->input->post("updated_by"),
			'updated_at' => date('Y-m-d h:i:s'),

		];
		$resp = $this->Home_model->update_ExpenseDaybook($data, $id);


		if ($resp) {
			$this->session->set_flashdata('msg', array('show_msg' => 'Field Updated successfully !', 'type' => 'success'));
		} else {
			$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
		}
		$this->load->model('Home_model');
		redirect(site_url('index.php/Home/ExpDaybookList'));
	}
	public function delete_ExpenseDaybook($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_ExpenseDaybook($id);
		redirect(site_url('index.php/Home/ExpDaybookList'));
	}
	// ProfitLoss
	public function ProfitLoss()
	{
		if ($this->input->post()) {
			echo "11";
			exit;
			//have post
			$data = array(
				'date' => $this->input->post("date"),
				'purchase_amount' => $this->input->post("purchase_amount"),
				'retailers_amount' => $this->input->post("retailers_amount"),
				'agents_amount' => $this->input->post("agents_amount"),
				'netsales_amount' => $this->input->post("netsales_amount"),
				'expense_amount' => $this->input->post("expense_amount"),
				'profit_loss' => $this->input->post("profit_loss"),
				// 'added_by' => $this->input->post("added_by"),
				'added_at' => date('Y-m-d h:i:s'),
				//  'updated_by' => $this->input->post("updated_by"),
				'updated_at' => date('Y-m-d h:i:s'),
			);

			$resp = $this->Home_model->save_profitloss($data);
			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Category added successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/ProfitLossList'));
		}
		$data['RegCompanyList'] = $this->Home_model->get_companies();

		$this->load->view('Partials/header');
		$this->load->view('Home/ProfitLoss', $data);
		$this->load->view('Partials/footer');
	}

	public function ProfitLossList()
	{
		$this->load->view('Partials/header');
		$this->load->view('Home/ProfitLossList');
		$this->load->view('Partials/footer');
	}

	// Ledgers
	// Farmer Ledger
	public function FarmerLedger()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name")
			);
			$resp = $this->Home_model->save($data);
		}
		$data['RegCompanyList'] = $this->Home_model->get_companies();
		$data['RegFarmerList'] = $this->Home_model->get_farmers();

		$this->load->view('Partials/header');
		$this->load->view('Home/FarmerLedger.php', $data);
		$this->load->view('Partials/footer');
	}
	// Agent Ledger
	public function AgentLedger()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name")
				//'name' =>'description')
			);
			//echo $this->input->post("name");
			$resp = $this->Home_model->save($data);
		}
		$data['RegCompanyList'] = $this->Home_model->get_companies();
		$data['RegAgentList'] = $this->Home_model->get_agents();


		$this->load->view('Partials/header');
		$this->load->view('Home/AgentLedger.php', $data);
		$this->load->view('Partials/footer');
	}
	// Retailer Ledger
	public function RetailerLedger()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name")
				//'name' =>'description')
			);
			//echo $this->input->post("name");
			$resp = $this->Home_model->save($data);
		}
		$data['RegCompanyList'] = $this->Home_model->get_companies();
		$data['RegRetailerList'] = $this->Home_model->get_retailers();


		$this->load->view('Partials/header');
		$this->load->view('Home/RetailerLedger.php', $data);
		$this->load->view('Partials/footer');
	}
	// Payments section

	public function PaymentData()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name")
				//'name' =>'description')
			);

			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/ReportPayment.php');
		$this->load->view('Partials/footer');
	}
	public function search_contact()
	{
		// Get the contact number from the request (use GET for AJAX)
		$contact_number = $this->input->get('contact_number');

		// Debugging: Check if the contact_number is being received
		if (!$contact_number) {
			echo json_encode(['error' => 'No contact number provided']);
			return;
		}

		// Search the contact number in farmers, agents, and retailers tables
		$details = $this->Home_model->get_details_by_contact($contact_number);

		// Debugging: Check if any results are found
		if (empty($details)) {
			echo json_encode(['error' => 'No results found']);
			return;
		}

		// Return the result as JSON
		echo json_encode($details);
	}


	public function ReptDaybook()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'expenses_by' => $this->input->post("expenses_by"),
				'amount' => $this->input->post("amount"),
				'companies' => $this->input->post("companies"),
				'categories' => $this->input->post("categories"),
				'expense_date' => date('Y-m-d', strtotime($this->input->post('expense_date'))),
				'added_at' => date('Y-m-d h:i:s'),
				'updated_at' => date('Y-m-d h:i:s'),
			);
			$resp = $this->Home_model->save_reportdaybook($data);
			if ($resp) {
				$this->session->set_flashdata('msg', array('show_msg' => 'Registration made successfully !', 'type' => 'success'));
			} else {
				$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
			}
			redirect(site_url('index.php/Home/ReptDaybooklist'));
		}
		$data['ReptDaybooklist'] = $this->Home_model->get_companies();
		$data['ExpCategoryList'] = $this->Home_model->get_categories();


		$this->load->view('Partials/header');
		$this->load->view('Home/ReptDaybook.php', $data);
		$this->load->view('Partials/footer');
	}
	public function ReptDaybooklist()
	{


		$this->load->view('Partials/header');
		$this->load->view('Home/ReptDaybooklist.php');
		$this->load->view('Partials/footer');
	}

	public function edit_ReportDaybook($id)
	{
		$this->load->view('Partials/header');

		$this->load->model('Home_model');
		$data['reports_daybook'] = $this->Home_model->edit_ReportDaybook($id);
		// 'countries' => $countries->result()
		$data['ReptDaybooklist'] = $this->Home_model->get_companies();
		$data['ExpCategoryList'] = $this->Home_model->get_categories();

		$this->load->view('Home/editReportDaybook', $data);
		$this->load->view('Partials/footer');
	}

	public function update_ReportDaybook($id)
	{
		$data = [
			'expenses_by' => $this->input->post("expenses_by"),
			'amount' => $this->input->post("amount"),
			'expense_date' => date('Y-m-d', strtotime($this->input->post('expense_date'))),
			'companies' => $this->input->post("companies"),
			'categories' => $this->input->post("categories"),
			// 'added_by' => $this->input->post("added_by"),
			'added_at' => date('Y-m-d h:i:s'),
			//  'updated_by' => $this->input->post("updated_by"),
			'updated_at' => date('Y-m-d h:i:s'),

		];
		$resp = $this->Home_model->update_ReportDaybook($data, $id);


		if ($resp) {
			$this->session->set_flashdata('msg', array('show_msg' => 'Field Updated successfully !', 'type' => 'success'));
		} else {
			$this->session->set_flashdata('msg', array('show_msg' => 'It seems you didn\'t change anything !', 'type' => 'warning'));
		}
		$this->load->model('Home_model');
		redirect(site_url('index.php/Home/ReptDaybooklist'));
	}
	public function delete_ReportDaybook($id)
	{
		$this->load->model('Home_model');
		$this->Home_model->delete_ReportDaybook($id);
		redirect(site_url('index.php/Home/ReptDaybooklist'));
	}




	public function LogoutPage()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name")
				//'name' =>'description')
			);
			//echo $this->input->post("name");
			$resp = $this->Home_model->save($data);
			// if($resp>0){

			// }

			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/LogoutPage.php');
		$this->load->view('Partials/footer');
	}
	public function AdminDashboard()
	{

		$this->load->view('Partials/header');
		$this->load->view('Home/AdminDashboard.php');
		$this->load->view('Partials/footer');
	}
	public function SuperAdminDashboard()
	{

		$this->load->view('Partials/header');
		$this->load->view('Home/SuperAdminDasboard.php');
		$this->load->view('Partials/footer');
	}

	public function profile()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name")
				//'name' =>'description')
			);
			//echo $this->input->post("name");
			$resp = $this->Home_model->save($data);
			// if($resp>0){

			// }

			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/profile.php');
		$this->load->view('Partials/footer');
	}
	public function Document()
	{
		if ($this->input->post()) {
			//have post
			$data = array(
				'name' => $this->input->post("name")
				//'name' =>'description')
			);
			//echo $this->input->post("name");
			$resp = $this->Home_model->save($data);
			// if($resp>0){

			// }

			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/Document.php');
		$this->load->view('Partials/footer');
	}
	public function new()
	{

		$this->load->view('Partials/header');
		$this->load->view('Home/new.php');
		$this->load->view('Partials/footer');
	}
}
