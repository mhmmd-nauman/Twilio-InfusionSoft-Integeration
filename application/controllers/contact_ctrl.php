<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_ctrl extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('sess_ci_admin_islogged') == 0) {
                redirect('login_ctrl', 'refresh');
        }
        $this->load->model("contact_model");
    }
	
    public function index()
    {

        $data['list'] = $this->contact_model->contact_list();

        $this->load->view("admin/layout/dashboard_header.php");
        $this->load->view('admin/contact/contacts',$data);
        $this->load->view('admin/layout/footer.php');
    }
                   
    public function  del_contact()
    {
        $id = $this->uri->segment(3);
        
        $this->index();
    }   
	
        
}