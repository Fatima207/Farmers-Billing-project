<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index()
	{
		$this->load->view('Home/index');
	}
	public function Test()
	{
		$this->load->view('Home/test');
	}


	// public function mainfunc()
	// {
	// 	if ($this->input->post()) {
	// 		//have post
	// 		$data = array(
	// 			'name' => $this->input->post("name")
	// 			//'name' =>'description')
	// 		);
	// 		//echo $this->input->post("name");
	// 		$resp = $this->Home_model->save($data);
	// 		// if($resp>0){

	// 		// }

	// 		exit;
	// 	}



	public function AddFarmer()
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
		$this->load->view('Home/RegFarmer');
		$this->load->view('Partials/footer');
	}
	public function FarmerList()
	{
		//this->load->model('Home_model');
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
		$this->load->view('Home/RegFarmerList');
		$this->load->view('Partials/footer');
	}


	public function AddAgent()
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
		$this->load->view('Home/RegAgent');
		$this->load->view('Partials/footer');
	}
	public function AgentList()
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
		$this->load->view('Home/RegAgentList');
		$this->load->view('Partials/footer');
	}

	public function AddRetailer()
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
		$this->load->view('Home/RegRetailer');
		$this->load->view('Partials/footer');
	}
	public function RetailerList()
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
		$this->load->view('Home/RegRetailerList');
		$this->load->view('Partials/footer');
	}


	public function AddCompany()
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
		$this->load->view('Home/RegComp');
		$this->load->view('Partials/footer');
	}
	public function CompanyList()
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
		$this->load->view('Home/RegCompList');
		$this->load->view('Partials/footer');
	}


	public function AddProduct()
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
		$this->load->view('Home/AddProduct');
		$this->load->view('Partials/footer');
	}
	public function ProductList()
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
		$this->load->view('Home/AddProductlist');
		$this->load->view('Partials/footer');
	}
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
		$this->load->view('Home/BillingRetailerlist.php');
		$this->load->view('Partials/footer');
	}
	public function ExpCategories()
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
		$this->load->view('Home/ExpCategories.php');
		$this->load->view('Partials/footer');
	}

	public function ExpCatgList()
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
		$this->load->view('Home/ExpcatgList.php');
		$this->load->view('Partials/footer');
	}
	public function ExpDaybook()
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
		$this->load->view('Home/ExpDaybook.php');
		$this->load->view('Partials/footer');
	}
	public function ExpDaybookList()
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
		$this->load->view('Home/ExpDaybookList.php');
		$this->load->view('Partials/footer');
	}
	public function ProfitLoss()
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
		$this->load->view('Home/ProfitLoss.php');
		$this->load->view('Partials/footer');
	}
	public function FarmerLedger()
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
		$this->load->view('Home/FarmerLedger.php');
		$this->load->view('Partials/footer');
	}
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
		$this->load->view('Home/PaymentData.php');
		$this->load->view('Partials/footer');
	}
}
