<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting_ctrl extends CI_Controller {
    
    public function __construct()
	{
            parent::__construct();
            $this->load->database();
            if($this->session->userdata('sess_ci_admin_islogged') == 0) {
                    redirect('login_ctrl', 'refresh');
            }
            $this->load->model(array('setting_model'));
            $this->load->library(array('form_validation'));
  	}
        
	
	public function index()
	{  
            $this->data['setting'] = $this->setting_model->getSetting();
            //print_r($this->data['setting']);
            $this->load->view("admin/layout/dashboard_header.php");
            $this->load->view('admin/setting/settings',$this->data);
            $this->load->view('admin/layout/footer.php');
      	}
                   
           
	
        public function save_setting()
        { 
         
            $this->form_validation->set_rules('ACCOUNT_SID', 'Twilio Account SID', 'required');
            $this->form_validation->set_rules('AUTH_TOKEN', 'Twilio Auth Token', 'required');
            $this->form_validation->set_rules('Infusionsoft_App', 'Infusion Soft APP', 'required');
            $this->form_validation->set_rules('Infusionsoft_API_Key', 'Infusion Soft API Key', 'required');
            $this->form_validation->set_rules('Number', 'Phone Number', 'required');
            $this->form_validation->set_rules('Apply_Tag', 'Infusion Soft Tag', 'required');
            
            if ($this->form_validation->run() == FALSE) {

                $this->data['status'] = " Validation Errors";

            } else {
                $settings=array
                (
                'ACCOUNT_SID'  =>$this->input->post('ACCOUNT_SID'),
                'AUTH_TOKEN'  =>$this->input->post('AUTH_TOKEN'),
                'Infusionsoft_App'  =>$this->input->post('Infusionsoft_App'),
                'Infusionsoft_API_Key'  =>$this->input->post('Infusionsoft_API_Key'),
                'Number'  =>$this->input->post('Number'),
                'Apply_Tag'  =>$this->input->post('Apply_Tag')
                );
                $this->db->where('id', 1);
                $this->db->update('settings', $settings);

                $this->data['status'] = " Setting saved";
                $this->data['setting'] = $this->setting_model->getSetting();
                $this->load->view("admin/layout/dashboard_header.php");
                $this->load->view('admin/setting/settings',$this->data);
                $this->load->view('admin/layout/footer.php');
            }
      }
}