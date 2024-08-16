<?php
class Home_model extends CI_Model {
    public function save($data) {
        //print_r($data); exit;
        $this->db->set($data);
        $this->db->insert('farmers');
        return $this->db->insert_id();
      }
      
    


      }

     