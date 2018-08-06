<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Teams extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('team');

	}
	public function index()
	{
		$this->load->view('team/team_add');
	}
	public function save()
	{
        $data = array(  
        'team_name'     => $this->input->post('name'),
        'discription'     => $this->input->post('discription'),
    	);
    	// print_r($data);
    	// exit();
       $ret= $this->team->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Team Added Successfully");
       }else{
       	$this->session->set_flashdata('error',"Team Already Exists");
       }
       redirect("teams");
	}
	public function teams()
	{
		$data['data']=$this->team->alldata();
		$this->load->view('team/team_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['data']=$this->team->singledata($id);
		$this->load->view('team/team_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
        'team_name'     => $this->input->post('name'),
        'discription'     => $this->input->post('discription'),
    	);
		$data['id']=$this->input->post('editid');
		$this->team->update($data); 
		redirect('teams/teams');
	}
	public function delete($value='')
	{
		$this->team->delete($value);
		redirect("teams/teams");
	}
	
}
?>
