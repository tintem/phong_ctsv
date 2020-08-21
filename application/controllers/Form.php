<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	

	function index()
	 {
	 	$this->load->model('Form_model');
	 	$data = $this->Form_model->listForm();
	 	$this->load->view('form/index', ['data'=>$data]);
	 }
	 /**
	  * Danh sach sinh vien can xin cac form $id
	  */
	 function Form1()
	 {

	 	$this->load->model('Form_model');
	 	$data = $this->Form_model->getdemo(10);
	 	//print_r($data);exit;
	 	$this->load->view('form/form1', ['data'=>$data]);
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
function print_form_student($id)
{
	$this->load->model('Form_model');
	$data = $this->Form_model->detail_form_student($id);
	$this->load->view('form/Form_detailStudentFormPrint',['data'=>$data]);
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
		echo "Load sua form";
	}
	function formUpdate()
	{
		echo "Form update!";
	}
	function formDelete()
	{
		echo "Form delete";
	}

}
