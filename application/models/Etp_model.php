<?php
Class Etp_model extends CI_Model
{
 
	public function get_template_criterias($semester)
	 {
		$this->db->select("criteria_ids");
		$this->db->where('semester',$semester);
		$this->db->where('status',1);
		$query=$this->db->get('etp_template');
		return $query->result_array()[0]['criteria_ids'] ;
	 }
	 
	function get_template($semester){
	  
		//$logged_in=$this->session->userdata('logged_in');

		$criteria_ids=$this->get_template_criterias($semester);
		$sql="SELECT etp_category.catid, etp_category.content as cat_content,etp_category.max_point as cat_max_point, etp_group.gid,parent_cid, etp_group.content as group_content,etp_group.note as group_note, cid, etp_criteria.content as criteria_content, etp_criteria.point as criteria_point,etp_criteria.note as criteria_note FROM etp_category
		INNER JOIN etp_group
		ON etp_category.catid=etp_group.category_id
		INNER JOIN etp_criteria 
		ON etp_group.gid=etp_criteria.group_id
		WHERE etp_category.status=1
		AND etp_group.status=1
		AND etp_criteria.status=1
		AND etp_criteria.cid IN(".$criteria_ids.") 
		ORDER BY FIELD(etp_criteria.cid,".$criteria_ids.")";
		$query=$this->db->query($sql);
		return $query->result_array();
	 }
	 public function get_result_detail($rid)
	 {
		$sql="SELECT GROUP_CONCAT(cid) as cid, GROUP_CONCAT(student_value) as student_value,GROUP_CONCAT(class_value) as class_value,GROUP_CONCAT(teacher_value) as teacher_value
		from etp_result_detail
		where rid=".$rid;
		$query=$this->db->query($sql);
		return $query->result_array();
	 }
	function get_template_result($rid,$uid){
		
		$data=array();
		$this->db->where('rid',$rid);
		$query = $this->db->get('etp_result');
		
		if(count($query->result_array())>0)
		{	
			$data['result']=$query->result_array()[0];
			//var_dump($data['result']);
			if($data['result']['uid']==$uid)
			{	
				
				$data['template']= $this->get_template($data['result']['semester']);
				$data['type_user']='student';
					
			}else{
				
				$this->db->select('savsoft_class.*');
				$this->db->join("savsoft_users","savsoft_class.classid=savsoft_users.classid");
				$this->db->where("uid",$data['result']['uid']);
				$query=$this->db->get("savsoft_class");
				$tmp_arr=$query->result_array();
				//var_dump($tmp_arr);exit;
				//echo $this->db->last_query();exit;
				if(count($tmp_arr)>0)
				{
					$tmp_arr=$tmp_arr[0];
					//var_dump($tmp_arr);exit;
					if($tmp_arr['form_teacher']!=null && $tmp_arr['form_teacher']==$uid)
					{
	
						$data['template']= $this->get_template($data['result']['semester']);
						$data['type_user']='teacher';
					}else if(($tmp_arr['monitor']!=null && $tmp_arr['monitor']==$uid)|| ($tmp_arr['secretary']!=null && $tmp_arr['secretary']==$uid))
					{
						//echo "111111111111";exit;	
						$data['template']= $this->get_template($data['result']['semester']);
						$data['type_user']='class';
					}else
						$data['template']=null;
				}else
					$data['template']=null;
			}
		if($data['template']!=null)
		{
			$data['result_detail']=$this->get_result_detail($rid)[0];
		}else
		$data['result_detail']=null;
			return $data;
		}else
			return null;
	 }
	 
	 public function insert_result($uid,$semester)
	 {
		$data=array('uid'=>$uid,'semester'=>$semester);
		$flag=true;
		$this->db->trans_start();
		if($this->db->insert('etp_result',$data)){
			$rid=$this->db->insert_id();
			$criteria_ids=$this->get_template_criterias($semester);
			$cri_id_arr=explode(",",$criteria_ids);
			
			
			foreach ($cri_id_arr as $cri_id) {
				if($this->input->post('student_'.$cri_id)!==null)
				{	
					$data=array('rid'=>$rid,'cid'=>$cri_id,'student_value'=>$this->input->post('student_'.$cri_id));
					$this->db->insert('etp_result_detail',$data);
				}
			}
		}else{
			
			$flag= false;
		}
		$this->db->trans_complete();
		return $flag;
	 }
	
	 public function update_result($rid,$semester,$user_type)
	 {
		$criteria_ids=$this->get_template_criterias($semester);
		
		$this->db->trans_start();
		$cri_id_arr=explode(",",$criteria_ids);	
		if($user_type=='class')
		{
			foreach ($cri_id_arr as $cri_id) {
				if($this->input->post('class_'.$cri_id)!==null)
				{	
					$data=array('class_value'=>$this->input->post('class_'.$cri_id));
					$this->db->where('rid',$rid);
					$this->db->where('cid',$cri_id);
					$this->db->update('etp_result_detail',$data);
				}
			}
		}else if($user_type=='teacher')
		{
			foreach ($cri_id_arr as $cri_id) {
				if($this->input->post('teacher_'.$cri_id)!==null)
				{	
					$data=array('teacher_value'=>$this->input->post('teacher_'.$cri_id));
					$this->db->where('rid',$rid);
					$this->db->where('cid',$cri_id);
					$this->db->update('etp_result_detail',$data);
				}
			}
		}else if($user_type=='student')
		{
			foreach ($cri_id_arr as $cri_id) {
				if($this->input->post('student_'.$cri_id)!==null)
				{	
					$$data=array('student_value'=>$this->input->post('student_'.$cri_id));
					$this->db->where('rid',$rid);
					$this->db->where('cid',$cri_id);
					$this->db->update('etp_result_detail',$data);
				}
			}
		}
		$this->db->trans_complete();
		
	 }
	
}
?>
