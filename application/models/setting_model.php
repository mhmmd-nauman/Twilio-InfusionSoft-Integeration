<?php
class Setting_model extends CI_Model
{
    function __construct() {
        parent::__construct();
      	$this->load->database();
    }
    
    public function getSetting()
    {
        $querydb1 = $this->db->select('*')->from("settings");
        $querydb = $querydb1->get();
        $result = $querydb->result();
        return $result[0];
    }
    
}