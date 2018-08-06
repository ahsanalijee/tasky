<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Model {
	public function savedata($data)
	{
		return $this->db->insert('reports',$data);
	}
	public function memberdata()
	{
		$user=$this->session->userdata('user');
		$query = $this->db->from('reports')->where('member_id',$user->member_id)->order_by('report_id','DESC')->get(); 
		return $query->result();
	}
	public function singledata($value='')
	{
		$data=$this->db->from('reports')->where('report_id',$value)->get();
		return $data->result();
	}
	public function update($data)
	{
		$this->db->where('report_id', $data['id']);
		$this->db->update('reports', $data['data']);
	}
	public function delete($value='')
	{
		$this->db->delete('reports', array('report_id' => $value));
	}
	public function adminreports($value='')
	{
		$data=array();
		$teams=$this->db->from('team')->get()->result();
		foreach ($teams as $team) {
			$members=$this->db->from('members')->join('reports','members.member_id=reports.member_id')->where('members.team_id',$team->team_id)->where('report_date >=',date('Y-m-d H:m:s'))->get()->result();
			$arr=array(
				'team'=>$team->team_name,
				'members'=>$members
			);
			array_push($data, $arr);
			
		}
		return $data;
	}
}
?>