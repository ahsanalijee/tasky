<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('task');
		$this->load->model('meeting');
	}
	public function index()
	{
		$data['meetings']=$this->meeting->usermeetings();
		$data['data']=$this->task->membertasks();
		$this->load->view('member/home',$data);
		
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect("home/index");
	}
	public function membercompleted($id='')
	{
		$this->task->membercompleted($id);
		redirect("member/home");
	}
	public function settings()
	{
		//print_r($user=$this->session->userdata('user'));
		$this->load->view("member/settings");
	}
	public function changesettings()
	{
		$user=$this->session->userdata('user');
		$data = array(
	        'email' => $this->input->post('email'),
	        'password' => $this->input->post('password'),
		);
		$this->session->set_flashdata('success',"Settings Saved");
		$this->db->where('member_id', $user->member_id);
		$this->db->update('members', $data);
		$nuser=$this->db->where('member_id',$user->member_id)->get('members')->result();
		//print_r($nuser);
		$this->session->set_userdata('user', $nuser[0]);
		redirect("member/home/settings");
	}
}
?>
