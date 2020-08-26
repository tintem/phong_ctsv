<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Etp extends CI_Controller {

	 function __construct()
	 {
	    parent::__construct();
	    $this->load->database();
	    $this->load->helper('url');
	    $this->load->model("etp_model");
		$this->load->model("user_model");
		$this->load->model("notification_model");
	    $this->lang->load('basic', $this->config->item('language'));

	 }

	public function index($limit='0',$list_view='grid')
    {
        // redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
		$data=array();
		
		
        // $logged_in=$this->session->userdata('logged_in');
		 $data['title']="Đánh giá rèn luyện";
		 $data['user']=$this->user_model->get_faculty_class($logged_in['uid']);
		 
		 $data['template']=$this->etp_model->get_template('2020-2021-1');
		 $data['semester']='2020-2021-1';
         $this->load->view('header',$data);
		 $this->load->view('etp',$data);
		 $this->load->view('footer',$data);
	}
	public function insert()
	{
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
			$this->session->unset_userdata('logged_in');		
			redirect('login');
		}
		$uid=$logged_in['uid'];
		$semester=$this->input->post('semester');
		//$criteria_ids=$this->etp_model->get_template_criterias($semester);
		//echo $criteria_ids;

		if($semester!="")
		{
			$this->etp_model->insert_result($uid,$semester);
		}

	}

	public function update()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
			$this->session->unset_userdata('logged_in');		
			redirect('login');
		}
		$uid=$logged_in['uid'];
		
		
		if($this->input->post('btnSubmit')!=null)
		{
			$this->etp_model->update_result($this->input->post('rid'),$this->input->post('semester'),$this->input->post('user_type'));
		}
		redirect(base_url()."etp/get/".$this->input->post('rid'));

	}

	public function get($rid)
	{
		// redirect if not loggedin
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
		$this->session->unset_userdata('logged_in');		
		redirect('login');
		}
		$uid=$logged_in['uid'];
		$data=array();
		$tmp_data=$this->etp_model->get_template_result($rid,$uid);
		//$tmp_data=$this->etp_model->get_template_result(1,2);
		//var_dump($tmp_data);exit;
		$data['user']=$this->user_model->get_faculty_class($uid);
		$data['result']=$tmp_data['result'];
		$data['result_detail']=$tmp_data['result_detail'];
		//var_dump($data['result_detail']);exit;
		$data['type_user']=$tmp_data['type_user'];
		$data['title']="Đánh giá rèn luyện";
		$data['template']=$tmp_data['template'];
		$data['semester']=$data['result']['semester'];
        $this->load->view('header',$data);
		$this->load->view('update_etp',$data);
		$this->load->view('footer',$data);
	}
}