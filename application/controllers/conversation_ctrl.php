<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Conversation_ctrl extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        if($this->session->userdata('sess_ci_admin_islogged') == 0) {
                redirect('login_ctrl', 'refresh');
        }
        $this->load->model(array('conversation_model'));
        $this->load->library(array('form_validation'));
    }
        
	
    public function index()
    {  
        $this->data['setting'] = $this->conversation_model->getConversation();
        //print_r($this->data['setting']);
        $this->load->view("admin/layout/dashboard_header.php");
        $this->load->view('admin/conversation/conversations',$this->data);
        $this->load->view('admin/layout/footer.php');
    }
                   
           
	
    public function save_setting()
    { 
        $this->form_validation->set_rules('first_reply_name', 'First Reply: Name Capture', 'required');
        $this->form_validation->set_rules('second_reply_email', 'Second Reply: Email Capture', 'required');
        $this->form_validation->set_rules('third_reply_thanks', 'Third Reply: Thank You', 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $this->data['status'] = " Validation Errors";
        
        } else {
          
            $settings=array
            (
            'first_reply_name'  =>$this->input->post('first_reply_name'),
            'second_reply_email'  =>$this->input->post('second_reply_email'),
            'third_reply_thanks'  =>$this->input->post('third_reply_thanks'),
            
            );
            $this->db->where('id', 1);
            $this->db->update('conversations', $settings);

            $this->data['status'] = " Setting saved";
            
        }
        $this->data['setting'] = $this->conversation_model->getConversation();
        $this->load->view("admin/layout/dashboard_header.php");
        $this->load->view('admin/conversation/conversations',$this->data);
        $this->load->view('admin/layout/footer.php');
    }
}