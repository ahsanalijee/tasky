<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

	public function login($data)
	{
		$data=$this->db->get_where('members', $data);
		return $data->result();
	}
}
?>