<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tasks extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('task');
		$user=$this->session->userdata('user');
		//$this->load->model('member');

	}
	public function index()
	{
		$user=$this->session->userdata('user');
                       
		$data['member']=$this->db->where('team_id',$user->team_id)->get('members')->result();
		//print_r($data['member']);
		$this->load->view('member/tasks/task_add',$data);
	}
	public function save()
	{
		$user=$this->session->userdata('user');
        $data = array(  
        'team_id'     => $user->team_id,
        'member_id'     => $this->input->post('member'),
        'task_title'     => $this->input->post('title'),
        'task_discription'     => $this->input->post('discription'),
        'assign_date'     => date("Y-m-d H:m:s"),
        'by_leader'	=> 1,
    	);
       $ret= $this->task->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Task  Assigned Successfully");
       }
       redirect("member/tasks");
	}
	public function tasks()
	{
		$data['data']=$this->task->bylead();
		$this->load->view('member/tasks/tasks_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('4');
		$user=$this->session->userdata('user');
		$data['data']=$this->task->singledata($id);
		$data['members']=$this->db->where('team_id',$user->team_id)->get('members')->result();
		$this->load->view('member/tasks/tasks_edit',$data);
	}
	public function update()
	{
		$user=$this->session->userdata('user');
		$data['data'] = array(  
        'team_id'     => $user->team_id,
        'member_id'     => $this->input->post('member'),
        'task_title'     => $this->input->post('title'),
        'task_discription'     => $this->input->post('discription'),
    	);
		$data['id']=$this->input->post('editid');
		$this->task->update($data); 
		redirect('member/tasks/tasks');

	}
	public function completed($id='')
	{
		$this->task->completed($id);
		redirect("member/tasks/tasks");
	}
	public function delete($value='')
	{
		$this->task->delete($value);
		redirect("member/tasks/tasks");
	}
	
}
?>
