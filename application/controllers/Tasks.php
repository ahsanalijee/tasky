<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tasks extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('task');
		$this->load->model('team');

	}
	public function index()
	{
		$data['teams']=$this->team->alldata();
		$this->load->view('tasks/task_add',$data);
	}
	public function save()
	{
        $data = array(  
        'team_id'     => $this->input->post('team'),
        'member_id'     => $this->input->post('member'),
        'task_title'     => $this->input->post('title'),
        'task_discription'     => $this->input->post('discription'),
        'assign_date'     => date("Y-m-d H:m:s"),
    	);
       $ret= $this->task->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Task  Assigned Successfully");
       }
       redirect("tasks");
	}
	public function tasks()
	{
		$data['data']=$this->task->alldata();
		$this->load->view('tasks/tasks_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['teams']=$this->team->alldata();
		$data['data']=$this->task->singledata($id);
		$data['members']= $this->db->from('members')->where('team_id', $data['data'][0]->team_id)->get()->result();
		$this->load->view('tasks/tasks_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
        'team_id'     => $this->input->post('team'),
        'member_id'     => $this->input->post('member'),
        'task_title'     => $this->input->post('title'),
        'task_discription'     => $this->input->post('discription'),
    	);
		$data['id']=$this->input->post('editid');
		$this->task->update($data); 
		redirect('tasks/tasks');

	}
	public function completed($id='')
	{
		$this->task->completed($id);
		redirect("tasks/tasks");
	}
	public function delete($value='')
	{
		$this->task->delete($value);
		redirect("tasks/tasks");
	}
	
}
?>
