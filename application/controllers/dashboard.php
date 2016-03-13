<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
	{
            parent::__construct();
//            $this->load->library('session');
//            if($this->session->userdata('sess_ci_admin_islogged') != true ) {
//                    redirect('login_ctrl', 'refresh');
//            }
  	}
	
	public function index()
	{  
//            $data['message']  = "";
            $this->load->view("admin/layout/dashboard_header.php");
            $this->load->view('admin/dashboard');
            $this->load->view('admin/layout/footer.php');
            
	}
	
	
	
	  
}