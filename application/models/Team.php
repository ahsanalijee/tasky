<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Model {
	public function savedata($data)
	{
		$check=array('team_name'=>$data['team_name']);

		$query = $this->db->get_where('team', $check)->result();
		// print_r($query);
		// exit();
		if (count($query)<1) {
			return $this->db->insert('team',$data);
		}else{
			return false;
		}
		
	}
	public function alldata()
	{
		$query = $this->db->get('team'); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('team')->where('team_id',$value)->get();
		return $data->result();
	}
	public function update($data)
	{
		$this->db->where('team_id', $data['id']);
		$this->db->update('team', $data['data']);
	}
	public function delete($value='')
	{
		$this->db->delete('team', array('team_id' => $value));
	}
}
?>