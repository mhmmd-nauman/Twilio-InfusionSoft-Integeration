<?php
class Conversation_model extends CI_Model
{
    function __construct() {
        parent::__construct();
      	$this->load->database();
    }
    
    public function getConversation()
    {
        $querydb1 = $this->db->select('*')->from("conversations");
        $querydb = $querydb1->get();
        $result = $querydb->result();
        return $result[0];
    }
    
}