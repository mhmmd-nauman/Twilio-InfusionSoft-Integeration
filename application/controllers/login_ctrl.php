<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_ctrl extends CI_Controller {

    function index() 
    {
        $this->load->view("admin/layout/header.php");
        $this->load->view('admin/login');
        $this->load->view('admin/layout/footer.php');
    }
    public function login() {
        if ($this->session->userdata('sess_ci_admin_islogged') == 'true') {
            redirect("dashboard");
        } 
        else 
            {
            $data['title'] = "Login";
            $this->load->view("admin/layout/header.php");
            $this->load->view('admin/login',$data);
            $this->load->view('admin/layout/footer.php');
        }
        
    }
    public function dologin() {

    $this->load->library('session');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('userName', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE){
        $this->session->set_userdata(array(
                'sess_ci_admin_msg' => "Invalid Login. ",
                'sess_ci_admin_msg_type' => 'error',
                'sess_ci_admin_islogged' => false
            ));
        redirect("dashboard");
    }

    $this->load->model("login_model");
    $login['email'] = $this->input->post('username');
    $login['pass'] = $this->input->post('password');
    $result = $this->admin->isAdmin($login);

    if (count($result) != 0) 
        {                
        $this->session->set_userdata(array(
            'sess_ci_admin_iadminid' => $result['0']->user_id,
            'sess_ci_admin_vName' => $result['0']->first_name,
            'sess_ci_admin_vEmailaddress' => $result['0']->email,
            'sess_ci_admin_role' => 1,
            'sess_ci_admin_lock' => false,
            'sess_ci_admin_msg' => " Login Successfully. ",
            'sess_ci_admin_msg_type' => 'success',
            'sess_ci_admin_islogged' => true
        ));

        redirect("admin/dashboard");
        } 
    else 
        {
        $this->session->set_userdata(array(
            'sess_ci_admin_msg' => "Invalid Login. ",
            'sess_ci_admin_msg_type' => 'error',
            'sess_ci_admin_islogged' => false
        ));
        redirect("admin/login");
        }

}

    public function logout() {

        $this->session->sess_destroy();
        $this->session->set_userdata(array(
            'sess_ci_admin_msg' => " You Have Logged Out successfully... ",
            'sess_ci_admin_msg_type' => 'success'
        ));
        redirect("admin/login");

    }
}