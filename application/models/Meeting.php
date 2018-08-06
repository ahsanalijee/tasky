<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meeting extends CI_Model {
	public function savedata($data)
	{
		return $this->db->insert('meetings',$data);		
	}
	public function alldata()
	{
		$query = $this->db->from('meetings')->join('team', 'meetings.team_id = team.team_id')->where('is_team !=',1)->order_by('meeting_id','DESC')->get();
		return $query->result();
	}
	public function bylead()
	{
		$user=$this->session->userdata('user');
		$query = $this->db->from('meetings')->where('team_id',$user->team_id)->where('is_team =',1)->order_by('meeting_id','DESC')->get();
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('meetings')->where('meeting_id',$value)->get();
		return $data->result();
	}
	public function update($data)
	{
		$this->db->where('meeting_id', $data['id']);
		$this->db->update('meetings', $data['data']);
	}
	public function delete($value='')
	{
		$this->db->delete('meetings', array('meeting_id' => $value));
	}
	public function usermeetings()
	{
		$user=$this->session->userdata('user');
		$query = $this->db->from('meetings')->join('team', 'meetings.team_id = team.team_id')->join('members', 'members.team_id = team.team_id')->where('member_id',$user->member_id)->where('meeting_date>=',date('Y-m-d H:m:s'))->get();
		return $query->result();
	}
}
?>