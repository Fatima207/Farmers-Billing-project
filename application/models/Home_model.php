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

  public function save_farmer($data)
  {

    $this->db->set($data);
    $this->db->insert('reg_farmers', $data);

    return $this->db->insert_id();
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
    $query = $this->db->get('reg_companies');
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

  public function get_retailers()
  {
    $query = $this->db->get('reg_retailers');
    return $query->result();
  }

  public function get_farmers()
  {
    $query = $this->db->get('reg_farmers');
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
}
