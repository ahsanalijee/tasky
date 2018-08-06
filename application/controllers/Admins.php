<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('admin');
    }
	public function index(){
		$this->load->view('login_form');
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
            'admin_email'     => $this->input->post('email'),  
            'admin_pass'  => $this->input->post('password'), 
        );           
            $check=$this->admin->login($data);
            if (count($check)>0) {
                $this->session->set_userdata('admin',$check[0]);
                $this->session->set_flashdata('success', "Welcome ".$check[0]->name);
                redirect("home/index");
            }else{
                $this->session->set_flashdata('error', 'Either Username Or Password Is Incorrect!');
                $this->load->view('login_form');
            }
        }
	}
}
?>