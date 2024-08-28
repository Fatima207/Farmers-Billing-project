<?php
class Home_model extends CI_Model
{
  public function save_farmer($data)
  {

    $this->db->set($data);
    $this->db->insert('farmers', $data);

    return $this->db->insert_id();



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
  public function save_daybook($data)
  {
    $query = $this->db->get('add_daybook');

    $this->db->set($data);
    $this->db->insert('add_daybook', $data);

    return $this->db->insert_id();
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
    $query = $this->db->get('reports_daybook');

    $this->db->set($data);
    $this->db->insert('reports_daybook', $data);

    return $this->db->insert_id();
  }

  

 

}
