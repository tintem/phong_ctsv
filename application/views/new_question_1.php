 <div class="container">

   
 <h3>Thêm câu hỏi</h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('qbank/new_question_1/'.$nop);?>">
	
<div class="col-md-12">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
	
	
	
			<?php 
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
		
		
				

			
			<div class="form-group">	 
					<label   ><?php echo $this->lang->line('select_category');?></label> 
					<select class="form-control" name="cid">
					<?php 
					foreach($category_list as $key => $val){
						?>
						
						<option value="<?php echo $val['cid'];?>"><?php echo $val['category_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>
			
		<!--
			<div class="form-group">	 
					<label   ><?php echo $this->lang->line('select_level');?></label> 
					<select class="form-control" name="lid">
					<?php 
					foreach($level_list as $key => $val){
						?>
						
						<option value="<?php echo $val['lid'];?>"><?php echo $val['level_name'];?></option>
						<?php 
					}
					?>
					</select>
			</div>
		-->
			
			

			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('question');?></label> 
					<textarea  name="question"  class="form-control"   ></textarea>
			</div>
			<div class="form-group">	 
					<label for="inputEmail"  ><?php echo $this->lang->line('description');?></label> 
					<textarea  name="description"  class="form-control"></textarea>
			</div>
		<?php 
		for($i=1; $i<=$nop; $i++){
			?>
			<div class="form-group">	 
					<label for="inputEmail"  >Lựa chọn số <?php echo $i;?>)</label> <br>
					<input type="radio" name="score" value="<?php echo $i-1;?>" <?php if($i==1){ echo 'checked'; } ?> > Lựa chọn đúng 
					<br><textarea  name="option[]"  class="form-control"   ></textarea>
			</div>
		<?php 
		}
		?>

 
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>

 



</div>
<script>
<?php
if(strpos($this->uri->segment(2),'edit_question')!==FALSE || strpos($this->uri->segment(2),'new_question')!==FALSE || strpos($this->uri->segment(2),'new_notification')!==FALSE )
{
?>
 window.onload=function()
 {
     CKEDITOR.replace('question', {
         baseHref: '<?php echo $this->config->item('base_url');?>'
         //entities_additional: 'lt, gt',
         //basicEntities: true
		 });
		 
 }

 <?php
}
?>
</script>