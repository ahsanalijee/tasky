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
		$this->load->view('member/meetings/meeting_add',$data);
	}
	public function save()
	{
		$user=$this->session->userdata('user');

        $data = array(  
        'meeting_date'     => $this->input->post('date')." ".$this->input->post('time'),
        'team_id'     => $user->team_id,
        'meeting_title'    => $this->input->post('title'),
        'meeting_discription'     => $this->input->post('discription'),
        'is_team'	=> 1
    	);
       $ret= $this->meeting->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Meeting Is Seceduled");
       }
       redirect("member/meetings");
	}
	public function meetings()
	{
		$data['data']=$this->meeting->bylead();
		$this->load->view('member/meetings/meeting_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('4');
		$data['data']=$this->meeting->singledata($id);
		$this->load->view('member/meetings/meeting_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
        'meeting_date'     => $this->input->post('time'),
        'meeting_title'    => $this->input->post('title'),
        'meeting_discription'     => $this->input->post('discription')
    	);
		$data['id']=$this->input->post('editid');
		$this->meeting->update($data); 
		redirect('member/meetings/meetings');
	}
	public function delete($value='')
	{
		$this->meeting->delete($value);
		redirect('member/meetings/meetings');
	}
	
	
}
?>
