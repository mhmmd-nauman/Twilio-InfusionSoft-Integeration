<?php
class Question_model extends CI_Model
{
    function __construct() {
        parent::__construct();
      	$this->load->database();
    }
     function delete_question_id($id){
        $this->db->where('id', $id);
        $this->db->delete('question');   
    }
       
    function question_list()
    {
        $this -> db -> select('*')-> from('question');
        $query = $this -> db -> get();
        if($query -> num_rows() > 0)    {
          return $query->result();
        }
        else
        {
          return false;
        }
    }
    public function get_single_question($question_id)
    {
        $querydb1 = $this->db->select('*')->from("admin")->where('username',$logindata['username'])->where('password',$logindata['pass']);
        $querydb = $querydb1->get();
        $result = $querydb->result();
        return $result;
    }
    public function add_question($question)
    {
        $this->db->insert('question', $question); 
        return $this->db->insert_id();
    }
}