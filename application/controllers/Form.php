<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	private $logged_in;
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('logged_in'))
	 	{
			redirect('login');
		}
		$this->logged_in=$this->session->userdata('logged_in');
	
	}
	

	function index()
	 {
	 	

	 	$this->load->model('Form_model');
	 	$data = $this->Form_model->listForm();
	 	
	 	if ($this->logged_in['su']=='0')
	 		$this->load->view('form0/index', ['data'=>$data]);
	 	if ($this->logged_in['su']=='1')
	 		$this->load->view('form1/index', ['data'=>$data]); //danh cho su=1
	 }
	 /**
	  * Danh sach sinh vien can xin cac form $id
	  */
	 function Form1()
	 {

	 	$this->load->model('Form_model');
	 	$data = $this->Form_model->getdemo(10);

	 	//print_r($data);exit;
	 	if ($this->logged_in['su']==1)
	 		$this->load->view('form1/form1', ['data'=>$data]);
	 	if ($this->logged_in['su']==0)
	 		$this->load->view('form0/form1', ['data'=>$data]);
	 }
	 /**
	  * demo
	  */
 function Form2()
	 {

	 	$this->load->model('Form_model');
	 	$data = $this->Form_model->get_form_student();
	 	//print_r($data);exit;
	 	$this->load->view('form/form2', ['data'=>$data]);
	 }

function detail_form_student()
	 {
	 	//$id = $this->uri->segment(3);
	 	$id= $this->input->post('id');
	 	if (!$id)
	 	{
	 		return;
	 	}

	 	$this->load->model('Form_model');
	 	$thongtinChitiet = $this->Form_model->detail_form_student($id);
	 
	 	echo json_encode($thongtinChitiet);
	 }

function update_form_student()
{
	$this->load->model('Form_model');
	$n =  $this->Form_model->update_form_student();
}

function formPrints()
	{
		echo "In danh sach da lua chon";
		//update ds da in - hoan thanh
	}

//function detailStudentFormPrint($id)
function print_form_student($id=null)
{
	$this->load->model('Form_model');
	
	$data = $this->Form_model->detail_form_students($id);


	$this->load->view('form1/Form_detailStudentFormPrint',['datas'=>$data]);
}

//-------------- QUan ly them - sua - xoa cac loai bieu mau
function formNew()
	{
		echo "Tao them form moi";
	}
	function formSave()
	{
		echo "Save form";
	}

	function formEdit()
	{
		$formid= $this->input->post('formid'); //echo "fid=". $formid;
		$this->load->model('Form_model');
	
		$data = $this->Form_model->formEdit($formid);
		echo json_encode($data);
	}
	function formUpdate()
	{
		/*echo "Form update!";
		print_r($_POST);
*/
		$this->load->model('Form_model');
	
		$data = $this->Form_model->formUpdate();
	}
	function formDelete()
	{
		echo "Form delete";
	}

}
