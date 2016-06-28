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
        $this->data['list'] = $this->conversation_model->getConversation();
        //print_r($this->data['setting']);
        $this->load->view("admin/layout/dashboard_header.php");
        $this->load->view('admin/conversation/conversations_list',$this->data);
        $this->load->view('admin/layout/footer.php');
    }
    
    public function add_new()
    {  
        //$this->data['setting'] = $this->conversation_model->getConversation();
        //print_r($this->data['setting']);
        $this->load->view("admin/layout/dashboard_header.php");
        $this->load->view('admin/conversation/conversations_new');
        $this->load->view('admin/layout/footer.php');
    }               
    public function load_con($con_id)
    {  
        $setting = $this->conversation_model->getConversation($con_id);
        $this->data['setting'] = $setting[0];
        //print_r($this->data['setting']);
        $this->load->view("admin/layout/dashboard_header.php");
        $this->load->view('admin/conversation/conversations',$this->data);
        $this->load->view('admin/layout/footer.php');
    }        
	
    public function save_setting($con_id = false)
    { 
        $this->form_validation->set_rules('first_reply_name', 'First Reply: Name Capture', 'required');
        $this->form_validation->set_rules('second_reply_email', 'Second Reply: Email Capture', 'required');
        $this->form_validation->set_rules('third_reply_thanks', 'Third Reply: Thank You', 'required');
        $this->form_validation->set_rules('keyword', 'KeyWord', 'required');
        $this->form_validation->set_rules('Apply_Tag', 'Tag', 'required');
        if ($this->form_validation->run() == FALSE) {
            
            $this->data['error'] = " Validation Errors - Please Fill all fields";
        
        } else {
            $conversationID = $this->conversation_model->create($_POST,$con_id);
            $this->data['status'] = " Conversation saved"; 
        }
        $this->index();
    }
    public function del_conversation($con_id){
        $this->conversation_model->delete($con_id);
        $this->data['status'] = " Conversation deleted"; 
        $this->index();
    }
}