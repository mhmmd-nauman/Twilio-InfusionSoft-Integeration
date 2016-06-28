<?php
class Contact_model extends CI_Model
{
    function __construct() {
        parent::__construct();
      	$this->load->database();
    }
    public function get_single_contact($phone,$con_id=0)
    {
        $querydb1 = $this->db->select('*')->from("contacts")
                ->where('phone',$phone)
                ->where('date(added_on)', date("Y-m-d"))
                ->where('con_id', $con_id);
        
        $q = $querydb1->get();
        if( $q->num_rows() > 0 ) {
            $result = $q->result();
            return $result[0];
        } else {
            return false;
        }   
    }
       
    function contact_list()
    {
        $this -> db -> select('*')-> from('contacts');
        $query = $this -> db -> get();
        if($query -> num_rows() > 0)    {
          return $query->result();
        }
        else
        {
          return false;
        }
    }
    public function add($data)
    {
         
        $this->db->insert('contacts', $data); 
        return $this->db->insert_id();
    }
    public function update($id,$data)
    {
         
        $this->db->where('id', $id);
        $this->db->update('contacts', $data);
    }
    
}