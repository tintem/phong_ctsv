 <div class="container">

   
 <h3>Cập nhật thông tin sinh viên</h3>
   
 

  <div class="row">
     <form method="post" action="<?php echo site_url('user/update_user/'.$uid);?>">
	
<div class="col-md-8">
<br> 
 <div class="login-panel panel panel-default">
		<div class="panel-body"> 
			<?php 
			
		if($this->session->flashdata('message')){
			echo $this->session->flashdata('message');	
		}
		?>	
		
				<div class="form-group">	 
				<?php 
				$logged_in=$this->session->userdata('logged_in');
				if($logged_in['su']=='1'){
					echo $this->lang->line('group_name');?>: <?php echo $result['group_name'];?> (<?php echo $this->lang->line('price_');?>: <?php echo $result['price'];?>)
					
					<?php 
					if($this->config->item('allow_switch_group')){
					?>
						<a href="<?php echo site_url('user/switch_group');?>" class="btn btn-danger"><?php echo $this->lang->line('change_group');?></a>
					<?php 
					}
				}
				?>
				</div>
				
				
			<div class="form-group">	 
					<label for="inputStudentid" ><?php echo $this->lang->line('studentid');?></label> 
					<input type="text" id="inputStudentid" name="studentid" value="<?php echo $result['studentid'];?>" readonly=readonly class="form-control" placeholder="<?php echo $this->lang->line('studentid');?>" required autofocus>
			</div>
			<div class="form-group">	 
					<label for="inputEmail" ><?php echo $this->lang->line('email_address');?></label> 
					<input type="email" id="inputEmail" name="email" value="<?php echo $result['email'];?>"  class="form-control" placeholder="<?php echo $this->lang->line('email_address');?>">
			</div>
			<div class="form-group">	  
					<label for="inputPassword" ><?php echo $this->lang->line('password');?></label>
					<input type="password" id="inputPassword" name="password"   value=""  class="form-control" placeholder="<?php echo $this->lang->line('password');?>"   >
			 </div>
			 <div class="form-group">	 
					<label for="inputEmail" ><?php echo $this->lang->line('last_name');?></label> 
					<input type="text"   name="last_name"  class="form-control"  value="<?php echo $result['last_name'];?>"  placeholder="<?php echo $this->lang->line('last_name');?>"   required>
			</div>
			<div class="form-group">	 
					<label for="inputEmail" ><?php echo $this->lang->line('first_name');?></label> 
					<input type="text"  name="first_name"  class="form-control"  value="<?php echo $result['first_name'];?>"  placeholder="<?php echo $this->lang->line('first_name');?>"   required>
			</div>
				
				<div class="form-group">	 
					<label for="inputEmail" ><?php echo $this->lang->line('contact_no');?></label> 
					<input type="text" name="contact_no"  class="form-control"  value="<?php echo $result['contact_no'];?>"  placeholder="<?php echo $this->lang->line('contact_no');?>"   autofocus>
			</div>
				 
 
	<button class="btn btn-default" type="submit"><?php echo $this->lang->line('submit');?></button>
 
		</div>
</div>
 
 
 
 
</div>
      </form>
</div>



 



</div>
