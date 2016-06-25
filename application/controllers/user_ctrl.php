<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_ctrl extends CI_Controller {

    function index() 
    {
        $this->load->view("user/layout/header.php");
        $this->load->view('user/login');
        $this->load->view('user/layout/footer.php');
    }
    function registration() 
    {
        $this->load->view("user/layout/header.php");
        $this->load->view('user/registration');
        $this->load->view('user/layout/footer.php');
    }
    function adduser() 
    {
        $this->load->model("user_login_model");
        $data['username'] = $this->input->post('username');
        $data['password'] = $this->input->post('password');
        $result = $this->user_login_model->add($data);
        $this->index();
    }
    public function login() {
        if ($this->session->userdata('sess_ci_user_islogged') == 'true') {
            redirect("user/dashboard");
        } 
        else 
            {
            $data['title'] = "Login";
            $this->load->view("user/layout/header.php");
            $this->load->view('user/login',$data);
            $this->load->view('user/layout/footer.php');
        }
        
    }
    public function dologin() {

    $this->load->library('session');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('userName', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE){
        $this->session->set_userdata(array(
                'sess_ci_user_msg' => "Invalid Login. ",
                'sess_ci_user_msg_type' => 'error',
                'sess_ci_user_islogged' => false
            ));
        redirect("dashboard/user");
    }

    $this->load->model("login_model");
    $login['email'] = $this->input->post('username');
    $login['pass'] = $this->input->post('password');
    $result = $this->user->isAdmin($login);

    if (count($result) != 0) 
        {                
        $this->session->set_userdata(array(
            'sess_ci_user_iuserid' => $result['0']->user_id,
            'sess_ci_user_vName' => $result['0']->first_name,
            'sess_ci_user_vEmailaddress' => $result['0']->email,
            'sess_ci_user_role' => 1,
            'sess_ci_user_lock' => false,
            'sess_ci_user_msg' => " Login Successfully. ",
            'sess_ci_user_msg_type' => 'success',
            'sess_ci_user_islogged' => true
        ));

        redirect("dashboard/user");
        } 
    else 
        {
        $this->session->set_userdata(array(
            'sess_ci_user_msg' => "Invalid Login. ",
            'sess_ci_user_msg_type' => 'error',
            'sess_ci_user_islogged' => false
        ));
        redirect("user/login");
        }

}

    public function logout() {

    $this->load->library('session');
        $this->session->sess_destroy();
        $this->session->set_userdata(array(
            'sess_ci_user_msg' => " You Have Logged Out successfully... ",
            'sess_ci_user_msg_type' => 'success'
        ));
        $this->index();

    }
}