<?php
Class Form_model extends CI_Model
{

function listForm()
{
	$o = $this->db->query('select * from etp_form where 1');
	return $o->result_array();
}
 function getDemo($n=10)
 {
 	
 	$o= $this->db->query('select * from v_form_student ');
 	
 	return $o->result_array();

 }
/**
 * demo
 * @return [type] [description]
 */
 function getStudentForm()
 {
 	return $this->db->get('etp_form_student')->result();
 }
/**
 * [chitietStudentForm tra ve thong tin chi tiet cua 1 don sinh vien]
 * @param  [type] $id [idchitiet student - form]
 * @return [type]     [array or false]
 */
 function detail_form_student($id)
 {
	 $query = $this->db->get_where('v_form_student', array('id' => $id));
	// echo $this->db->last_query();
 	if ($query->num_rows()==0) return false;
 	$row = $query->row();
 	
 	$row->student_form_detail= $this->db->get_where('etp_form_student_detail', ['form_student_id'=>$id])->result();
 	return $row;
 }

 function update_form_student()
 {
 	$id = $this->input->post('id');
    $data['status'] = $this->input->post('status');
    $data['date2'] = $this->input->post('date2');
    //$data['note'] = 'concat(note,<p>' .$this->input->post('note') .')';
  //$this->db->update('mytable', $data, array('id' => $id));
	$this->db->where('id', $id);
	$this->db->update('etp_form_student', $data);

	$this->db->where('id',$id);
	$this->db->set('note', 'CONCAT(note,\',<p>'.$this->input->post('note').'\')', FALSE);
	$this->db->update('etp_form_student');
  	echo $this->db->last_query();
 }
}

?>
