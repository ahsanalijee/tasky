<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Members extends CI_Controller 
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('team');
		$this->load->model('member');

	}
	public function index()
	{
		$data['teams']=$this->team->alldata();
		$this->load->view('members/member_add',$data);
	}
	public function save()
	{
		//if ($this->input->post('image')) {

			$config['upload_path']          = './uploads/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 100;
	        $config['max_width']            = 1024;
	        $config['max_height']           = 768;

	        $this->load->library('upload', $config);

	        if ( ! $this->upload->do_upload('image'))
	        {
	             $error = array('error' => $this->upload->display_errors());
	             // print_r($error);
	             // echo "string1";
	        }
	        else
	        {
	        	echo $imgname="uploads/".$this->upload->data('file_name');
	        	//echo "string";
	        }
		//}	
		//$lead= if($this->input->post('type')) ? 1:0 ;	
        $data = array(  
        'member_name'     => $this->input->post('name'),
        'designation'     => $this->input->post('designation'),
        'member_image'    => @$imgname,
        'team_id'     => $this->input->post('team'),
        'email'     => $this->input->post('email'),
        'password'     => $this->input->post('password'),
        'is_leader'     => $this->input->post('type'),

    	);
    	// print_r($data);
    	// exit();
       $ret= $this->member->savedata($data);
       if ($ret) {
       	$this->session->set_flashdata('success',"Member Added Successfully");
       }
       // else{
       // 	$this->session->set_flashdata('error',"Team Already Exists");
       // }
       redirect("members");
	}
	public function members()
	{
		$data['data']=$this->member->alldata();
		$this->load->view('members/member_all',$data);
	}
	public function edit()
	{
		$id=$this->uri->segment('3');
		$data['teams']=$this->team->alldata();
		$data['data']=$this->member->singledata($id);
		$this->load->view('members/member_edit',$data);
	}
	public function update()
	{
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if (!$this->input->post('checkimage')) {
        	
        	if ( ! $this->upload->do_upload('image'))
	        {
	             $error = array('error' => $this->upload->display_errors());
	             print_r($error);

	        }
	        else
	        {
	        	$data=$this->member->singledata($this->input->post('id'));
	        	//print_r($data);
				unlink($data->member_image);
	        	$imgname="uploads/".$this->upload->data('file_name');
	        }
        	
        }else{
        	$imgname=$this->input->post('checkimage');
        }
		$data['data'] = array(  
	        'member_name'     => $this->input->post('name'),
	        'designation'     => $this->input->post('designation'),
	        'member_image'    => @$imgname,
	        'team_id'     => $this->input->post('team'),
	        'email'     => $this->input->post('email'),
	        'password'     => $this->input->post('password'),
	        'is_leader'     => $this->input->post('type'),

    	);
    	// print_r($data['data']);
    	// exit();
		$data['id']=$this->input->post('editid');
		$this->member->update($data); 
		redirect('members/members');
	}
	public function delete($value='')
	{
		$this->member->delete($value);
		redirect('members/members');
	}
	public function ajax($value='')
	{
		//echo $_REQUEST['id'];
		$query = $this->db->from('members')->where('team_id', $_REQUEST['id'])->get()->result();
		//print_r($query);
		//echo "<option value=''>Select</option>";
		foreach ($query as $member) {
			echo "<option value='".$member->member_id."'>".$member->member_name."</option>";
		}
	}
	
}
?>
