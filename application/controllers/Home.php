<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;


class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');

		$this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index()
	{
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

		$AddCategories = $this->Home_model->save_categories();
		$this->load->view('Home/ExpCatgList', ['add_categories' => $AddCategories]);

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
			if ($result != FALSE) {
				echo
				$auth_userdetails = [
					'first_name'=>$result->first_name,
					'last_name'=>$result->last_name,
					'email'=>$result->email,
				];
				$this->session->set_userdata('authenticated', '1');
				$this->session->set_userdata('auth_user', $auth_userdetails);
				$this->session->set_flashdata('status', 'You are Loggedin successfully');
				redirect(base_url('index.php/Home/AdminDashboard'));
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


		$this->load->view('Partials/header');
		$this->load->view('Home/RegFarmerList');
		$this->load->view('Partials/footer');
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

		$this->load->view('Partials/header');
		$this->load->view('Home/RegCompList');
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
	public function NewFarmersBilling()
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
		$this->load->view('Home/Billingfarmer');
		$this->load->view('Partials/footer');
	}
	public function FarmersBillingList()
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
		$this->load->view('Home/BillingfarmerList');
		$this->load->view('Partials/footer');
	}
	// Agents
	public function NewAgentsBilling()
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
		$this->load->view('Home/BillingAgent');
		$this->load->view('Partials/footer');
	}
	public function AgentsBillingList()
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
		$this->load->view('Home/BillingAgentList');
		$this->load->view('Partials/footer');
	}
	// Retailers
	public function RetBilling()
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
		$this->load->view('Home/BillingRetailer.php');
		$this->load->view('Partials/footer');
	}
	public function RetList()
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
		$this->load->view('Home/BillingRetailerlist');
		$this->load->view('Partials/footer');
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
				'expense_date' => $this->input->post("expense_date"),
				// 'added_by' => $this->input->post("added_by"),
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
			'expense_date' => $this->input->post("expense_date"),
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
				'Expense_date' => $this->input->post("Expense_date"),
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

		$this->load->view('Home/editExpenseDaybook', $data);
		$this->load->view('Partials/footer');
	}

	public function update_ExpenseDaybook($id)
	{
		$data = [
			'expense_by' => $this->input->post("expense_by"),
			'Amount' => $this->input->post("Amount"),
			'Company' => $this->input->post("Company"),
			'Category' => $this->input->post("Category"),
			'Expense_date' => $this->input->post("Expense_date"),
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
		$this->load->view('Partials/header');
		$this->load->view('Home/ProfitLoss');
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


			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/FarmerLedger.php');
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
			// if($resp>0){

			// }

			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/AgentLedger.php');
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
			// if($resp>0){

			// }

			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/RetailerLedger.php');
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
			//echo $this->input->post("name");
			$resp = $this->Home_model->save($data);
			// if($resp>0){

			// }

			exit;
		}
		$this->load->view('Partials/header');
		$this->load->view('Home/ReportPayment.php');
		$this->load->view('Partials/footer');
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
				'expense_date' => $this->input->post("expense_date"),
				// 'added_by' => $this->input->post("added_by"),
				'added_at' => date('Y-m-d h:i:s'),
				//  'updated_by' => $this->input->post("updated_by"),
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
		$data['ExpCategorieslist'] = $this->Home_model->get_categories();



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

		$this->load->view('Home/editReportDaybook', $data);
		$this->load->view('Partials/footer');
	}

	public function update_ReportDaybook($id)
	{
		$data = [
			'expenses_by' => $this->input->post("expenses_by"),
			'amount' => $this->input->post("amount"),
			'companies' => $this->input->post("companies"),
			'categories' => $this->input->post("categories"),
			'expense_date' => $this->input->post("expense_date"),
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
		$this->load->view('Home/AdminDashboard.php');
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

	public function Register()
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
		$this->load->view('Home/Register.php');
		$this->load->view('Partials/footer');
	}
}
