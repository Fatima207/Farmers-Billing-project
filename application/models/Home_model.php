<?php
class Home_model extends CI_Model
{
  public function loginUser($data)
  {
    $this->db->select('*');
    $this->db->where('email', $data['email']);
    $this->db->where('password', $data['password']);
    $this->db->from('users');
    $this->db->limit(1);
    $query =  $this->db->get();
    if ($query->num_rows() == 1) {
      return $query->row();
    } else {
      return false;
    }
  }
  public function registerUser($data)
  {

    $this->db->set($data);
    $this->db->insert('users', $data);
    return $this->db->insert_id();
  }
  public function get_Employee()
  {
    $name = '';
    $value = '';
    $relatedUsers = '';
    if (isset($_REQUEST['empid']) && $_REQUEST['empid']['value'] != '') {
      $name = $_REQUEST['empid']['field'];
      $value = $_REQUEST['empid']['value'];
      $relatedUsers = $this->user_model->get_Employee($name, $value);
      echo json_encode($relatedUsers);
    } else {
      $relatedUsers = $this->user_model->get_Employee($name = NULL, $value = NULL);
      echo json_encode($relatedUsers);
    }
  }



  public function save_farmer($data)
  {

    $this->db->set($data);
    $this->db->insert('reg_farmers', $data);
    return $this->db->insert_id();

    $query = $this->db->get('reg_farmers');
    return $query->result();
  }

  public function get_farmers()
  {
    $query = $this->db->get('reg_farmers');
    return $query->result();
  }
  // ----Registration-------


  // Farmer section
  public function edit_RegisterFarmer($id)
  {
    $query = $this->db->get_where('reg_farmers', ['id' => $id]);
    return $query->row();
  }

  public function update_RegisterFarmer($data, $id)
  {
    return $this->db->update('reg_farmers', $data, ['id' => $id]);
  }

  public function delete_RegisterFarmer($id)
  {
    return $this->db->delete('reg_farmers', ['id' => $id]);
  }
  // Agents section
  public function edit_RegisterAgent($id)
  {
    $query = $this->db->get_where('reg_agents', ['id' => $id]);
    return $query->row();
  }

  public function update_RegisterAgent($data, $id)
  {
    return $this->db->update('reg_agents', $data, ['id' => $id]);
  }

  public function delete_RegisterAgent($id)
  {
    return $this->db->delete('reg_agents', ['id' => $id]);
  }
  // Retailers section
  public function edit_RegisterRetailer($id)
  {
    $query = $this->db->get_where('reg_retailers', ['id' => $id]);
    return $query->row();
  }

  public function update_RegisterRetailer($data, $id)
  {
    return $this->db->update('reg_retailers', $data, ['id' => $id]);
  }

  public function delete_RegisterRetailer($id)
  {
    return $this->db->delete('reg_retailers', ['id' => $id]);
  }

  // for companies
  public function edit_RegisterCompany($id)
  {
    $query = $this->db->get_where('reg_companies', ['id' => $id]);
    return $query->row();
  }

  public function update_RegisterCompany($data, $id)
  {
    return $this->db->update('reg_companies', $data, ['id' => $id]);
  }

  public function delete_RegisterCompany($id)
  {
    return $this->db->delete('reg_companies', ['id' => $id]);
  }


  // --------Products----------

  public function edit_Product($id)
  {
    $query = $this->db->get_where('add_products', ['id' => $id]);
    return $query->row();
  }

  public function update_Product($data, $id)
  {
    return $this->db->update('add_products', $data, ['id' => $id]);
  }

  public function delete_Product($id)
  {
    return $this->db->delete('add_products', ['id' => $id]);
  }


  public function save_agent($data)
  {
    $query = $this->db->get('reg_agents');

    $this->db->set($data);
    $this->db->insert('reg_agents', $data);
    return $this->db->insert_id();
  }

  public function save_retailer($data)
  {

    $this->db->set($data);
    $this->db->insert('reg_retailers', $data);
    return $this->db->insert_id();
  }

  public function save_company($data)
  {
    $this->db->set($data);
    $this->db->insert('reg_companies', $data);

    return $this->db->insert_id();
  }
  public function save_product($data)
  {
    $query = $this->db->get('add_products');

    $this->db->set($data);
    $this->db->insert('add_products', $data);

    return $this->db->insert_id();
  }

  public function save_categories($data)
  {
    $query = $this->db->get('add_categories');

    $this->db->set($data);
    $this->db->insert('add_categories', $data);

    return $this->db->insert_id();
  }
  public function get_categories()
  {
    $query = $this->db->get('add_categories');
    return $query->result();
  }



  // --------categories----------

  public function edit_ExpenseCategories($id)
  {
    $query = $this->db->get_where('add_categories', ['id' => $id]);
    return $query->row();
  }

  public function update_ExpenseCategories($data, $id)
  {
    return $this->db->update('add_categories', $data, ['id' => $id]);
  }

  public function delete_ExpenseCategories($id)
  {
    return $this->db->delete('add_categories', ['id' => $id]);
  }
  // expense Daybook
  public function edit_ExpenseDaybook($id)
  {
    $query = $this->db->get_where('expense_daybook', ['id' => $id]);
    return $query->row();
  }

  public function update_ExpenseDaybook($data, $id)
  {
    return $this->db->update('expense_daybook', $data, ['id' => $id]);
  }

  public function delete_ExpenseDaybook($id)
  {
    return $this->db->delete('expense_daybook', ['id' => $id]);
  }


  public function save_daybook($data)
  {
    // $data = [
    //   'Expense_date' => date('Y-m-d', strtotime($this->input->post('Expense_date')))
    // ];

    $query = $this->db->get('expense_daybook');
    $this->db->set($data);
    $this->db->insert('expense_daybook', $data);
    return $this->db->insert_id();
  }
  public function get_companies()
  {
    $query = $this->db->get('reg_companies');
    return $query->result();
  }
  public function get_agents()
  {
    $query = $this->db->get('reg_agents');
    return $query->result();
  }
  public function getAgentById($id)
  {
    // Fetch agent details by ID
    $query = $this->db->get_where('reg_agents', ['id' => $id]); // Assuming 'id' is the agent's identifier
    return $query->row_array();
  }
  public function get_last_billing_Retailer()
  {
    $this->db->select('retailer_billing_num');
    $this->db->from('billing_retailer_records');
    $this->db->order_by('id', 'DESC'); // Assuming 'id' is the primary key
    $this->db->limit(1);
    $query = $this->db->get();

    return $query->row(); // Return the last record
  }
  public function delete_BillingRetailer($id)
  {
    return $this->db->delete('billing_retailer_records', ['id' => $id]);
  }
  public function update_BillingRetailer($id, $postData)
  {
    $this->db->trans_start(); // Begin transaction

    $this->db->where('id', $id);
    $this->db->update('billing_retailer_records', $postData); // Update billing agent record

    if (isset($data['product_details'])) {
        // Loop through the product details to update the product record
        foreach ($data['product_details'] as $product) {
            // Assuming 'product_id', 'qty', 'unit', and 'price' are being updated
            $this->db->where('billing_id', $id);
            $this->db->where('product_id', $product['product_id']);
            $this->db->update('billing_agent_product_records', [
                'qty' => $product['qty'],
                'unit' => $product['unit'],
                'price' => $product['price']
            ]);
        }
    }

    // Commit or roll back the transaction based on the success of all updates
    $this->db->trans_complete(); // Complete transaction

    // Check if transaction was successful
    if ($this->db->trans_status() === FALSE) {
        return false; // If any update fails, return false
    }

    return true; // If everything is successful, return true
  }



// farmer billing


  public function save_farmersBillingproductDetails($batch_data)
  {
    return $this->db->insert_batch('billing_farmer_product_records', $batch_data);
  }

  public function get_farmersbilling_products($billing_id)
  {
    $this->db->select('b.id as billing_id, b.farmer_billing_num, b.farmer, b.company, b.commission, b.arhat_coolie, b.britty, b.dan, b.jeep_fair, b.rail_coolie, b.ice_leaf, b.unio_n,b.misc_exp, b.market_exp, b.grand_total, b.final_total, b.total_dues, b.payment_status,b.cash,b.cheque,b.online, b.created_at, b.updated_at,bp.product_id, bp.qty, bp.unit, bp.price');    
   $this->db->from('billing_farmer_records b');
    $this->db->join('billing_farmer_product_records bp', 'b.id = bp.billing_id',  'inner');


    $this->db->where('b.id', $billing_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array(); // Return as an array of results
    }
    return false; // Return false if no matching records found
  }

  public function update_BillingFarmer($postData, $id)
  {
    return $this->db->update('billing_agent_records', $postData, ['id' => $id]);
  }
  public function get_farmersBilling($postData)
  {
    $this->db->insert('billing_farmer_records', $postData);
    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    }
    return false;
  }
  public function getFarmerById($id)
  {
    // Fetch agent details by ID
    $query = $this->db->get_where('reg_farmers', ['id' => $id]); // Assuming 'id' is the agent's identifier
    return $query->row_array();
  }
  public function edit_BillingFarmer($id)
  {
    $this->db->select('b.id as billing_id, b.farmer_billing_num, b.farmer, b.company, b.commission, b.arhat_coolie, b.britty, b.dan, b.jeep_fair, b.rail_coolie, b.ice_leaf, b.unio_n,b.misc_exp, b.market_exp, b.grand_total, b.final_total, b.total_dues, b.payment_status,b.cash,b.cheque,b.online, b.created_at, b.updated_at,bp.product_id, bp.qty, bp.unit, bp.price, r.id temp, r.code, r.address, r.contact_number,p.name product_name, bp.product_id, bp.qty, bp.unit, bp.price');
    $this->db->from('billing_farmer_records b');
    $this->db->join('billing_farmer_product_records bp', 'b.id = bp.billing_id',  'inner');
    $this->db->join('reg_farmers r', 'r.id = b.farmer', 'inner');
    $this->db->join('add_products p', 'p.id = bp.product_id', 'inner');

    $this->db->where('b.id', $id);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array(); 
    }
    return false;

  }

  public function get_last_billing_farmers()
  {
    $this->db->select('farmer_billing_num');
    $this->db->from('billing_farmer_records');
    $this->db->order_by('id', 'DESC'); // Assuming 'id' is the primary key
    $this->db->limit(1);
    $query = $this->db->get();

    return $query->row(); // Return the last record
  }


  public function get_retailersBilling($postData)
  {
    $this->db->insert('billing_retailer_records', $postData);
    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    }
    return false;
  }
public function getRetailerById($id)
{
  // Fetch agent details by ID
  $query = $this->db->get_where('reg_retailers', ['id' => $id]); // Assuming 'id' is the agent's identifier
  return $query->row_array();
}
public function edit_BillingRetailer($id)
{
  $this->db->select('b.id as billing_id, b.retailer_billing_num, b.retailer, b.company, b.commission, b.arhat_coolie, b.britty, b.dan, b.jeep_fair, b.rail_coolie, b.ice_leaf, b.unio_n,b.misc_exp, b.market_exp, b.grand_total, b.final_total, b.total_dues, b.payment_status,b.cash,b.cheque,b.online, b.created_at, b.updated_at,bp.product_id, bp.qty, bp.unit, bp.price, r.id temp, r.code, r.address, r.contact_number,p.name product_name, bp.product_id, bp.qty, bp.unit, bp.price');
  $this->db->from('billing_retailer_records b');
  $this->db->join('billing_retailer_product_records bp', 'b.id = bp.billing_id',  'inner');
  $this->db->join('reg_retailers r', 'r.id = b.retailer', 'inner');
  $this->db->join('add_products p', 'p.id = bp.product_id', 'inner');

  $this->db->where('b.id', $id);

  $query = $this->db->get();

  if ($query->num_rows() > 0) {
    return $query->result_array(); 
  }
  return false;

}
  // AGENTS
  


  public function edit_BillingAgent($id)
  {
    $this->db->select('b.id as billing_id, b.billing_number, b.agent, b.company, b.commission, b.arhat_coolie, b.britty, b.dan, b.jeep_fair, b.rail_coolie, b.ice_leaf, b.unio_n,b.misc_exp, b.market_exp, b.grand_total, b.final_total, b.total_dues, b.payment_status,b.cash,b.cheque,b.online, b.created_at, b.updated_at,bp.product_id, bp.qty, bp.unit, bp.price, r.id temp, r.code, r.address, r.contact_number,p.name product_name, bp.product_id, bp.qty, bp.unit, bp.price');
    $this->db->from('billing_agent_records b');
    $this->db->join('billing_agent_product_records bp', 'b.id = bp.billing_id',  'inner');
    $this->db->join('reg_agents r', 'r.id = b.agent', 'inner');
    $this->db->join('add_products p', 'p.id = bp.product_id', 'inner');

    $this->db->where('b.id', $id);

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array(); 
    }
    return false;

  }

 
public function update_billingAgentRecord($billing_id, $billingData)
{
    $this->db->where('id', $billing_id);
    return $this->db->update('billing_agent_records', $billingData);
}


  public function update_BillingAgent($id,$data)
{ 
    $this->db->trans_start(); // Begin transaction

    $this->db->where('id', $id);
    $this->db->update('billing_agent_records', $data); // Update billing agent record

    if (isset($data['product_details'])) {
        // Loop through the product details to update the product record
        foreach ($data['product_details'] as $product) {
            // Assuming 'product_id', 'qty', 'unit', and 'price' are being updated
            $this->db->where('billing_id', $id);
            $this->db->where('product_id', $product['product_id']);
            $this->db->update('billing_agent_product_records', [
                'qty' => $product['qty'],
                'unit' => $product['unit'],
                'price' => $product['price']
            ]);
        }
    }

    // Commit or roll back the transaction based on the success of all updates
    $this->db->trans_complete(); // Complete transaction

    // Check if transaction was successful
    if ($this->db->trans_status() === FALSE) {
        return false; // If any update fails, return false
    }

    return true; // If everything is successful, return true
}


  public function get_last_billing_agents()
  {
    $this->db->select('billing_number');
    $this->db->from('billing_agent_records');
    $this->db->order_by('id', 'DESC'); // Assuming 'id' is the primary key
    $this->db->limit(1);
    $query = $this->db->get();

    return $query->row(); // Return the last record
  }
  public function get_agentsBilling($postData)
  {
    $this->db->insert('billing_agent_records', $postData);
    if ($this->db->affected_rows() > 0) {
      return $this->db->insert_id();
    }
    return false;
  }

  public function get_agentsbilling_products($billing_id)
  {
    $this->db->select('b.id as billing_id, b.billing_number, b.agent, b.company, b.commission, b.grand_total, b.final_total, b.total_dues, b.payment_status, b.created_at, bp.product_id, bp.qty, bp.unit, bp.price');
    $this->db->from('billing_agent_records b');
    $this->db->join('billing_agent_product_records bp', 'b.id = bp.billing_id', 'inner');

    $this->db->where('b.id', $billing_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array(); // Return as an array of results
    }
    return false; // Return false if no matching records found
  }
  public function get_retailersbilling_products($billing_id)
  {
    $this->db->select('b.id as billing_id, b.retailer_billing_num, b.retailer, b.company, b.commission, b.grand_total, b.final_total, b.total_dues, b.payment_status, b.created_at, bp.product_id, bp.qty, bp.unit, bp.price');
    $this->db->from('billing_retailer_records b');
    $this->db->join('billing_retailer_product_records bp', 'b.id = bp.billing_id', 'inner');

    $this->db->where('b.id', $billing_id);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->result_array(); // Return as an array of results
    }
    return false; // Return false if no matching records found
  }


  public function save_agentsBillingproductDetails($batch_data)
  {
    return $this->db->insert_batch('billing_agent_product_records', $batch_data);
  }
 
  public function delete_BillingAgent($id)
  {
    return $this->db->delete('billing_agent_records', ['id' => $id]);
  }

  
  public function save_RetailersBillingproductDetails($batch_data)
  {
    return $this->db->insert_batch('billing_retailer_product_records', $batch_data);
  }


  public function delete_BillingFarmer($id)
  {
    // Ensure the ID is valid
    if (!$id) {
      log_message('error', 'Invalid ID provided for deletion');
      return false;
    }
    return $this->db->delete('billing_farmer_records', ['id' => $id]);

    // Log the last executed query
    log_message('error', 'Delete Query: ' . $this->db->last_query());

    // Check for errors
    if (!$deleted) {
      log_message('error', 'DB Error: ' . $this->db->_error_message());
      return false;
    }

    // Ensure at least one row was affected
    // return $this->db->affected_rows() > 0;
  }

  public function get_retailers()
  {
    $query = $this->db->get('reg_retailers');
    return $query->result();
  }


  public function get_products()
  {
    $query = $this->db->get('add_products');
    return $query->result();
  }




  public function save_profitloss($data)
  {
    $query = $this->db->get('profit/loss');

    $this->db->set($data);
    $this->db->insert('profit/loss', $data);

    return $this->db->insert_id();
  }
  public function save_reportdaybook($data)
  {

    $this->db->set($data);
    $this->db->insert('reports_daybook', $data);
    return $this->db->insert_id();
  }
  function get_sub_category($category_id)
  {
    $query = $this->db->get_where('sub_category', array('subcategory_category_id' => $category_id));
    return $query;
  }


  // report dayboook


  public function edit_ReportDaybook($id)
  {
    $query = $this->db->get_where('reports_daybook', ['id' => $id]);
    return $query->row();
  }

  public function update_ReportDaybook($data, $id)
  {
    return $this->db->update('reports_daybook', $data, ['id' => $id]);
  }

  public function delete_ReportDaybook($id)
  {
    return $this->db->delete('reports_daybook', ['id' => $id]);
  }

  public function get_details_by_contact($contact_number)
  {
    // Query for farmers
    $farmers_query = $this->db->select('name, code, contact_number, "Farmer" as type')
      ->from('reg_farmers')
      ->where('contact_number', $contact_number)
      ->get_compiled_select();

    // Query for agents
    $agents_query = $this->db->select('name, code, contact_number, "Agent" as type')
      ->from('reg_agents')
      ->where('contact_number', $contact_number)
      ->get_compiled_select();

    // Query for retailers
    $retailers_query = $this->db->select('name, code, contact_number, "Retailer" as type')
      ->from('reg_retailers')
      ->where('contact_number', $contact_number)
      ->get_compiled_select();

    // Combine all queries using UNION
    $query = $this->db->query("($farmers_query) UNION ($agents_query) UNION ($retailers_query)");

    return $query->result_array();  // Return all matching results
  }

  // public function getPrefilledProducts() {
	// 	$editId = $this->input->get('billing_id'); // Get the ID from the request
		
	// 	// Fetch prefilled product IDs from the database based on the editId
	// 	$query = $this->db->select('product_id')
	// 					  ->from('billing_agent_product_record') // Replace with your table name
	// 					  ->where('billing_id', $editId)
	// 					  ->get();
	
	// 	$result = $query->result_array();
	// 	$prefilledProducts = array_column($result, 'product_id');
	
	// 	// Return the IDs as a JSON response
	// 	echo json_encode(['prefilledProducts' => $prefilledProducts]);
	// }
	


}
