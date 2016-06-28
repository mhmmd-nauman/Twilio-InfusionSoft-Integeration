<?php
class Conversation_model extends CI_Model
{
    function __construct() {
        parent::__construct();
      	$this->load->database();
    }
    
    public function getConversation($con_id = false)
    {
        $querydb1 = $this->db->select('*')->from("conversations");
        if( $con_id ) {
            $this->db->where('id', $con_id);
	}
        $querydb = $querydb1->get();
        $result = $querydb->result();
        return $result;
    }
    public function create($data,$con_id = false) {
        
        $cdata = array(
			'name' => $data['name'],
			'first_reply_name' => (isset($data['first_reply_name']))? $data['first_reply_name'] : "",
			'second_reply_email' => $data['second_reply_email'],
			'third_reply_thanks' => (isset($data['third_reply_thanks']))? $data['third_reply_thanks'] : "",
			'keyword' => (isset($data['keyword']))? $data['keyword'] : "",
			'Apply_Tag' => (isset($data['Apply_Tag']))? $data['Apply_Tag'] : "",
		);
        if($con_id)
        {
            $this->db->where('id', $con_id);
            $this->db->update('conversations', $cdata);
        } else {
            $this->db->insert('conversations', $cdata);
            return $this->db->insert_id();
        }
       
    }
    public function delete( $con_id ) {
		
            $this->db->where('id', $con_id);
            $this->db->delete('conversations');
    }
    public function findConversation($keyword = false)
    {
        $querydb1 = $this->db->select('*')->from("conversations");
        if( $keyword ) {
            $this->db->where('keyword', $keyword);
	}
        
        $querydb = $querydb1->get();
        $result = $querydb->result();
        if($result){
            return $result;
        } else {
            return false;
        }
    }
    
}