<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Model {
	public function savedata($data)
	{
		return $this->db->insert('tasks',$data);		
	}
	public function alldata()
	{
		$query = $this->db->from('tasks')->join('members','members.member_id=tasks.member_id')->where('task_status !=',1)->where('by_leader !=',1)->get(); 
		return $query->result();
	}
	public function bylead()
	{
		$user=$this->session->userdata('user');
		$query = $this->db->from('tasks')->join('members','members.member_id=tasks.member_id')->where('tasks.team_id =',$user->team_id)->where('task_status !=',1)->where('by_leader =',1)->get(); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$query = $this->db->from('tasks')->where('task_id',$value)->get();
		return $query->result();
	}
	public function update($data)
	{
		$this->db->where('task_id', $data['id']);
		$this->db->update('tasks', $data['data']);
	}
	public function delete($value='')
	{
		$this->db->delete('tasks', array('task_id' => $value));
	}
	public function completed($id='')
	{
		$data=array(
			'task_status'=>'1',
		);
		$this->db->where('task_id', $id);
		$this->db->update('tasks', $data);
	}
	public function membertasks()
	{
		$user=$this->session->userdata('user');
		$query = $this->db->from('tasks')->where('task_status !=',1)->where('member_id ',$user->member_id)->order_by('task_id','DESC')->get(); 
		return $query->result();
	}
	public function membercompleted($id='')
	{
		$data=array(
			'completed_date'=>date("Y-m-d H:m:s")
		);
		$this->db->where('task_id', $id);
		$this->db->update('tasks', $data);
	}
}
?>