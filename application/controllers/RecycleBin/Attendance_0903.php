<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends CI_Controller {
	

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->database();
	   $this->load->helper('url');
	   $this->load->model("Attendance_model");
	   $this->load->model("user_model");
		 $this->load->model("class_model");
		 $this->load->model("faculty_model");
	   $this->lang->load('basic', $this->config->item('language'));
	  // $this->load->model("User_model");
	   if(!$this->session->userdata('logged_in'))
	   {
			redirect($this->config->item('base_urls').'logins');
		}

		$logged_in=$this->session->userdata('logged_in');
		
	 }


	function protocol() 
	{
	    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	  //  $domainName = $_SERVER['HTTP_HOST'] . '/';
	    return $protocol . $domainName;
	}
	
		
	public function index()
	{
		
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if ($logged_in['su']==0) exit;
		
		$this->load->helper('url');
		$s = $this->protocol();
		if ($s== 'http://') { redirect ($this->config->item('base_urls') .'attendance'); exit;}

		//$logged_in=$this->session->userdata('logged_in');
		//print_r($logged_in);exit;
		$this->load->view('layout3');//,['$user_log'=>$this->user_log]);
	}
	
	
	public function check()
	{
	
		$qrcode = $this->input->get('qr');
		
		if (empty($qrcode) )
			{ echo "0";
			 
			return;
		}
		 echo $this->Attendance_model->getinfo($qrcode) ;
		
	}
 
 /*
Ket qua xua diem danh nhung ai co mat: from date - to date
 */

	public function resultAttendance()
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$data = array();
		if ($from < $to)
		$data =$this->Attendance_model->getDataAttendance($from, $to);
	  //  print_r($data);exit;
		$this->load->view('layout4', array('data'=>$data, 'content'=>'content1', 'from'=>$from, 'to'=>$to, 'faculty'=>$this->Attendance_model->faculty()) );
	}
	
	private function validateDate($date, $format = 'Y-m-d H:i:s')
		{
			$d = DateTime::createFromFormat($format, $date);
			return $d && $d->format($format) == $date;
		}

/*
Ket qua xua diem danh theo tung ca. nhung ai co mat+ khong co mat: from date - to date
 */
	function resultAttendance2( )
	{
		$from = $this->input->post('from');
		$to = $this->input->post('to');
		$facultyid=$this->input->post('facultyid');
		$type=1;
		$data = array('data'=>array(), 'dataTH'=>array());
		if ($from < $to)
		
		$data = $this->Attendance_model->getAttendance( $from, $to, $facultyid, $type);
		//echo "<pre>";print_r($data);exit;

		$this->load->view('layout4', array('data'=>$data['data'], 'dataTH'=>$data['dataTH'], 'content'=>'content2', 'faculty'=>$this->Attendance_model->faculty()) );

	}

	public function qrcodeGenerator ( )
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
				$this->session->unset_userdata('logged_in');		
			redirect('login');
		}
		
		$logged_in = $this->session->userdata('logged_in');
		$studentid = $logged_in['studentid'];
		
		require_once(APPPATH.'libraries/phpqrcode/qrlib.php');
		$qrtext = $this->Attendance_model->getQrText($studentid);
		if($qrtext!='')
		{

			//file path for store images
		    $SERVERFILEPATH = FCPATH.'/photo/qr/';
		   
			$text = $qrtext;
			$text1= substr($text, 0,9);
			
			$folder = $SERVERFILEPATH;
			$file_name1 = $studentid . ".png";
			$file_name = $folder.$file_name1;
			QRcode::png($text,$file_name, 'Q', '6');
			
			redirect('attendance/qr');
		}
		else
		{
			echo 'Not found';
		}	
	}
	
	function downloadQr()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['base_url'] != base_url()){
				$this->session->unset_userdata('logged_in');		
			redirect('login');
		}
		
		$logged_in = $this->session->userdata('logged_in');
		$studentid = $logged_in['studentid'];
		$file_name= FCPATH."photo/qr/{$studentid}.png";
		$file_url = $file_name;
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="QR_'.$studentid.'.png"');
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_url)); //Absolute URL
		ob_clean();
		flush();
		readfile($file_url); //Absolute URL
		exit();
		
		

	}
	
	function qr()
	{

		if(!$this->session->userdata('logged_in')){
			redirect('login');
			
		}
		$logged_in=$this->session->userdata('logged_in');
		
		if($logged_in['base_url'] != base_url()){
				$this->session->unset_userdata('logged_in');		
			redirect('login');
		}
		$logged_in=$this->session->userdata('logged_in');
		if($logged_in['su']!='1')
		{
			 $uid=$logged_in['uid'];
		}
			
		$data['uid']=$uid;
		 $data['title']='Quản lý code QR';//$this->lang->line('edit').' '.$this->lang->line('user');
		// fetching user
		$data['result']=$this->user_model->get_user($uid);
		$this->load->model("payment_model");
		$data['payment_history']=$this->payment_model->get_payment_history($uid);
		// fetching group list
		$data['group_list']=$this->user_model->group_list();
		 $this->load->view('header',$data);
			if($logged_in['su']=='1'){
		$this->load->view('edit_user',$data);
			}else{

		$this->load->view('myaccountqr',$data);
				
			}
		$this->load->view('footer',$data);
	}

}
