 <div class="container">
<?php 
$cc=0;
$colorcode=array(
'success',
'warning',
'info',
'danger'
);
$logged_in=$this->session->userdata('logged_in');
			 
			
			?>
   
 
    <?php 
	if($logged_in['su']=='1'){
		?>
		<div class="row">
 

  
    <p style="float:right;text-align:right">
      <?php 
      if($list_view=='grid'){
        ?>
        <a href="<?php echo site_url('quiz/index/'.$limit.'/table');?>"><?php echo $this->lang->line('table_view');?></a>
        <?php 
      }else{
        ?>
        <a href="<?php echo site_url('quiz/index/'.$limit.'/grid');?>"><?php echo $this->lang->line('grid_view');?></a>
        <?php 
      }
      ?>
    </p>

</div>

<?php 
	}
?>

  <div class="row">
    <div class="col-md-4"  style="background-color:#red !important">
      <h3 class="title"><?php echo 'Các thông báo'?></h3>  
      <?php
      if(count($notifications)==0)
        echo '<h4 align="center">Chưa có thông báo</h4>';
      foreach ($notifications as $notification) {
        
      ?>
      <div class="col-md-12 text-center">
          <div class="panel panel-<?php echo $colorcode[$cc];?> panel-pricing">
            <div class="panel-heading notification-title">
                <?php echo substr(strip_tags($notification['title']),0,50);?>
            </div>
            <div class="panel-body text-center">
                <p class="notification-message"><?php echo substr(strip_tags($notification['message']),0,200);?></p>
                <a href="<?php echo site_url('notification/detail/'.$notification['nid']);?>">Xem chi tiết</a>
            </div>
            
          </div>
      </div>
      <?php
      if($cc >= 4){
        $cc=0;
        }else{
        $cc+=1;
        }
      }
      ?>
    </div>
    <div class="col-md-8" >
    <h3 class="title">Các bài thi</h3>
      
			<?php 
        if($this->session->flashdata('message')){
          echo $this->session->flashdata('message');	
        }
        ?>	
        <?php 
      if($list_view=='table'){
        ?>
        <table class="table table-bordered">
        <tr>
        <th>#</th>
        <th><?php echo $this->lang->line('quiz_name');?></th>
        <th><?php echo $this->lang->line('noq');?></th>
        <th><?php echo $this->lang->line('action');?> </th>
        </tr>
        <?php 
        if(count($result)==0){
          ?>
        <tr>
        <td colspan="3" align="center"><?php echo $this->lang->line('no_record_found');?></td>
        </tr>	
        <?php
        }
        foreach($result as $key => $val){
        ?>
        <tr>
        <td><?php echo $val['quid'];?></td>
        <td>
        <abbr title="<?php echo $val['quiz_name'];?>"><?php echo sub_str(strip_tags($val['quiz_name']),64);?></abbr></td>
        <td><?php echo $val['noq'];?></td>
        <td>
        <a href="<?php echo site_url('quiz/quiz_detail/'.$val['quid']);?>" class="btn btn-success"  ><?php echo $this->lang->line('attempt');?> </a>

        <?php 
        if($logged_in['su']=='1'){
          ?>
              
        <a href="<?php echo site_url('quiz/edit_quiz/'.$val['quid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
        <a href="javascript:remove_entry('quiz/remove_quiz/<?php echo $val['quid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>
        <?php 
        }
        ?>
        </td>
        </tr>
        <?php 
        }
        ?>
        </table>

          <?php 
          }else{
            ?>
            <?php 
        if(count($result)==0){
          echo "<h4 align='center'>",$this->lang->line('no_record_found'),'</h4>';
        }
        
        foreach($result as $key => $val){
        ?>
	                <!-- item -->
          <div class="col-md-6 text-center">
              <div class="panel panel-<?php echo $colorcode[$cc];?> panel-pricing">
                  <div class="panel-heading quiz-name">
                      <h3><abbr title="<?php echo $val['quiz_name'];?>"><?php echo sub_str(strip_tags($val['quiz_name']),64);?></abbr></h3>
                  </div>
                  <div class="panel-body text-center">
                      <strong><?php echo $this->lang->line('duration');?> <?php echo $val['duration'];?></strong>
                  </div>
                  <ul class="list-group text-center">
                      <li class="list-group-item"><i class="fa fa-check"></i> <?php echo $this->lang->line('noq');?>:  <?php echo $val['noq'];?></li>
                      <li class="list-group-item"><i class="fa fa-check"></i> <?php echo $this->lang->line('maximum_attempts');?>: <?php echo $val['maximum_attempts'];?></li>
                  </ul>
                  <div class="panel-footer">	 
                    <a href="<?php echo site_url('quiz/quiz_detail/'.$val['quid']);?>" class="btn btn-success"  ><?php echo $this->lang->line('attempt');?> </a>

                    <?php 
                    if($logged_in['su']=='1'){
                      ?>
                          
                    <a href="<?php echo site_url('quiz/edit_quiz/'.$val['quid']);?>"><img src="<?php echo base_url('images/edit.png');?>"></a>
                    <a href="javascript:remove_entry('quiz/remove_quiz/<?php echo $val['quid'];?>');"><img src="<?php echo base_url('images/cross.png');?>"></a>
                    <?php 
                    }
                    ?>
                  </div>
                </div>
              </div>
                <!-- /item -->
            <?php 
            if($cc >= 4){
            $cc=0;
            }else{
            $cc+=1;
            }
        }
      }
      ?>
    </div>
  </div>
<br><br>
</div>