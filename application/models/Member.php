<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Model {
	public function savedata($data)
	{
		// $cheack=array('team_name'=>$data['team_name']);
		// $query = $this->db->get_where('team', $check)->result();
		// if (count($query)<1) {
			return $this->db->insert('members',$data);
		// }else{
		// 	return false;
		// }
		
	}
	public function alldata()
	{
		$query = $this->db->from('members')->join('team', 'members.team_id = team.team_id')->get();
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('members')->where('member_id',$value)->get();
		return $data->result();
	}
	public function update($data)
	{
		$this->db->where('member_id', $data['id']);
		$this->db->update('members', $data['data']);
	}
	public function delete($value='')
	{
		$this->db->delete('members', array('member_id' => $value));
	}
}
?>