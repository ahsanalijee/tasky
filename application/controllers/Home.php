<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('report');
	}
	public function index()
	{ 
		$data['reports']=$this->report->adminreports();
		//echo "<pre>";
		//print_r($report);
		
		$this->load->view('home',$data);
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url()."admins");
	}
	public function search($value='')
	{
		$res=$this->db->where('report_id',$_POST['id'])->get('reports')->result();
		
		echo "<h1 align='center' >".$res[0]->report_title."</h1>";
		echo "<p>".$res[0]->report_discription."<p>";
	}
	public function settings()
	{
		//print_r($user=$this->session->userdata('user'));
		$this->load->view("settings");
	}
	public function changesettings()
	{
		$user=$this->session->userdata('admin');
		$data = array(
			'admin_name' => $this->input->post('name'),
	        'admin_email' => $this->input->post('email'),
	        'admin_pass' => $this->input->post('password'),
		);
		$this->session->set_flashdata('success',"Settings Saved");
		$this->db->where('admin_id', $user->admin_id);
		$this->db->update('admin', $data);
		$nuser=$this->db->where('admin_id',$user->admin_id)->get('admin')->result();
		//print_r($nuser);
		$this->session->set_userdata('admin', $nuser[0]);
		redirect("home/settings");
	}
	
}
?>
