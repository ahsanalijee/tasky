<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('user');
    }
	public function index(){
		$this->load->view('member_login');
	}
	public function validate(){
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('login_form');
        }
        else
        {	
            $data = array(  
            'email' => $this->input->post('email'),  
            'password'  => $this->input->post('password'), 
        );           
            $check=$this->user->login($data);
            if (count($check)>0) {
                $this->session->set_userdata('user',$check[0]);
                $this->session->set_flashdata('success', "Welcome ".$check[0]->name);
                redirect("member/home");
            }else{
                $this->session->set_flashdata('error', 'Either Username Or Password Is Incorrect!');
                $this->load->view('member_login');
            }
        }
	}
}
?>