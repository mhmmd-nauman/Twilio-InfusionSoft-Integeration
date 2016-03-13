<?php
class Login extends CI_Model
{
function login_model($data)
    {
      $this -> db -> select('*');
      $this -> db -> from('admin');
      $this -> db -> where($data);
      $this -> db -> limit(1);

      $query = $this -> db -> get();

      if($query -> num_rows() == 1)
      {
        return $query->result();
      }
      else
      {
        return false;
      }
    }
    public function isAdmin($logindata)
    {
        $querydb1 = $this->db->select('*')->from("admin")->where('username',$logindata['username'])->where('password',$logindata['pass']);
        $querydb = $querydb1->get();
        $result = $querydb->result();
        return $result;
    }
}