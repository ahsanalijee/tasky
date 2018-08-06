<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Meetings extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('team');
		$this->load->model('meeting');

	}
	public function index()
	{
		$data['teams']=$this->team->alldata();
		$this->load->view('meetings/meeting_add',$data);
	}
	public function save()
	{

        $data = array(  
        'meeting_date'     => $this->input->post('date')." ".$this->input->post('time'),
        'team_id'     => $this->input->post('team'),
        'meeting_title'    => $this->input->post('title'),
        'meeting_discription'     => $this->input->post('discription')
    	);
    	// print_r($data);
    	// exit();
       $ret= $this->meeting->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Meeting Is Seceduled");
       }
       // else{
       // 	$this->session->set_flashdata('error',"Team Already Exists");
       // }
       redirect("meetings");
	}
	public function meetings()
	{
		$data['data']=$this->meeting->alldata();
		$this->load->view('meetings/meeting_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['teams']=$this->team->alldata();
		$data['data']=$this->meeting->singledata($id);
		$this->load->view('meetings/meeting_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
        'meeting_date'     => $this->input->post('time'),
        'team_id'     => $this->input->post('team'),
        'meeting_title'    => $this->input->post('title'),
        'meeting_discription'     => $this->input->post('discription')
    	);
    	// print_r($data['data']);
    	// exit();
		$data['id']=$this->input->post('editid');
		$this->meeting->update($data); 
		redirect('meetings/meetings');
	}
	public function delete($value='')
	{
		$this->meeting->delete($value);
		redirect('meetings/meetings');
	}
	
	
}
?>
