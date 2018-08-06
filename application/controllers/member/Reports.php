<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Reports extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('report');

	}
	public function index()
	{
		$this->load->view('member/report/report_add');
	}
	public function save()
	{
		$user=$this->session->userdata('user');
        $data = array(  
        'member_id'     =>$user->member_id,
        'report_title'     => $this->input->post('title'),
        'report_discription'     => $this->input->post('discription'),
        'report_type'     => $this->input->post('type'),
        'report_date'	=> date('Y-m-h H:m:s')
    	);
       $ret= $this->report->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Report Submitted");
       }
       redirect("member/reports");
	}
	public function reports()
	{
		$data['data']=$this->report->memberdata();
		$this->load->view('member/report/report_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['data']=$this->team->singledata($id);
		$this->load->view('team/team_edit',$data);
	}
	public function update()
	{
		$data['data'] = array(  
        'team_name'     => $this->input->post('name'),
        'discription'     => $this->input->post('discription'),
    	);
		$data['id']=$this->input->post('editid');
		$this->team->update($data); 
		redirect('teams/teams');
	}
	public function delete($value='')
	{
		$this->team->delete($value);
		redirect("teams/teams");
	}
	
}
?>
