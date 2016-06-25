<?php
class Login_model extends CI_Model
{

    public function isAdmin($logindata)
    {
        
        
        $querydb1 = $this->db->select('*')->from("admin")->where('username',$logindata['email'])->where('password',$logindata['pass']);
         
        $querydb = $querydb1->get();
        $result = $querydb->result();
        
        return $result;
    }
}