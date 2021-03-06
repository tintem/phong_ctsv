<html lang="vi">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
		<title><?php echo $title;?></title>
	<!-- bootstrap css -->
	<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
	
	<!-- custom css -->
	<link href="<?php echo base_url('css/style.css');?>" rel="stylesheet">
	
	<script>
	
	var base_url="<?php echo base_url();?>";

	</script>
	
	<!-- jquery -->
	<script src="<?php echo base_url('js/jquery.js');?>"></script>
	
	<!-- custom javascript -->
	  	<script src="<?php echo base_url('js/basic.js');?>"></script>
		
	<!-- bootstrap js -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>
	
	<!-- fontawesome css -->
	<link href="<?php echo base_url('font-awesome/css/font-awesome.css');?>" rel="stylesheet">
	
	<!-- chartjs -->
	<script src="<?php echo base_url('js/Chart.bundle.min.js');?>"></script>
	
	<!-- firebase messaging menifest.json -->
	 <link rel="manifest" href="<?php echo base_url('js/manifest.json');?>">

	<!--DatePicker -->
	<script src="<?php echo base_url('bootstrap/js/moment.js');?>"></script>
	<script src="<?php echo base_url('bootstrap/js/bootstrap-datetimepicker.min.js');?>"></script>
	<link href="<?php echo base_url('bootstrap/css/bootstrap-datetimepicker.css');?>" rel="stylesheet">

 </head>
  <body>
	<?php
		//Cat chuoi
		function sub_str($s,$n)
		{
			if(strlen($s)<=$n)
				return $s;
			$i=$n;
			while ($s[$n]!=' ' && $s[$n]!='.' && $s[$n]!=',') {
				$n--;
			}
			if($i==$n)
				return $s;
			return substr($s,0,$n)."...";
		}
		//echo sub_str("Bài thi giữa khóa (Khoa Cơ khí và khoa công nghệ thông tin",64);exit;
	?>
  
  	
	<?php 
			if($this->session->userdata('logged_in')){
				if(($this->uri->segment(1).'/'.$this->uri->segment(2))!='quiz/attempt'){
				$logged_in=$this->session->userdata('logged_in');
	?>
	    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://stu.edu.vn"><?php echo $this->lang->line('savsoft_quiz');?></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <?php  
				if($logged_in['su']==1)
				{
			?>
			  
			  <li <?php if($this->uri->segment(1)=='dashboard'){ echo "class='active'"; } ?> ><a href="<?php echo site_url('dashboard');?>"><?php echo $this->lang->line('dashboard');?></a></li>
            
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='user'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('users');?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('user/new_user');?>"><?php echo $this->lang->line('add_new');?></a></li>
                  <li><a href="<?php echo site_url('user');?>">Danh sách người dùng</a></li>
                  
                </ul>
              </li>
			 
			 
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='qbank'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('qbank');?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
									<li><a href="<?php //echo site_url('qbank/pre_new_question');
									echo site_url('qbank/new_question_1/4');
									?>"><?php echo $this->lang->line('add_new');?></a></li>
                  <li><a href="<?php echo site_url('qbank');?>">Danh sách câu hỏi</a></li>
                  
                </ul>
              </li>
			 
			 
			 
		    <?php 
				}else{
			?>
			 <li><a href="<?php echo site_url('user/edit_user/'.$logged_in['uid']);?>"><?php echo $this->lang->line('myaccount');?></a></li>
			  <li><a href="<?php echo site_url('attendance/qr/')?>">Mã QR</a></li>

			<?php 
				}
			?>
     		  <li class="dropdown" <?php if($this->uri->segment(1)=='qbank'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Đề thi <span class="caret"></span></a>
                <ul class="dropdown-menu">
                 <?php  
				if($logged_in['su']==1){
			?>     <li><a href="<?php echo site_url('quiz/add_new'); ?>"><?php echo $this->lang->line('add_new');?></a></li>
              <?php 
				}
?>				 <li><a href="<?php echo site_url('quiz');?>">Danh sách đề thi </a></li>
               
                </ul>
              </li>
				<?php 	if($logged_in['su']==1){	?>
				<li class="dropdown" <?php if($this->uri->segment(1)=='attendance'){ echo "class='active'"; } ?> >
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kết quả<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('result');?>">Kết quả thi</a></li>
					
						<li><a href="<?php echo site_url('survey/');?>">Kết quả khảo sát</a></li>
						<li><a href="<?php echo base_url();?>attendance/resultAttendance">Kết quả điểm danh</a></li>
						<li><a href="<?php echo base_url();?>attendance/resultAttendance2">Kết quả điểm danh 2</a></li>
					
					</ul>
			
				</li>
				<li><a href="<?php echo site_url('form');?>">Quản lý đơn</a></li>
				<?php }else 
				{ ?>    
				<li><a href="<?php echo site_url('result');?>">Kết quả thi</a></li> 
				<li><a href="<?php echo site_url('form');?>">Xin đơn</a></li> 
				<li><a href="<?php echo site_url('etp');?>">Đánh giá rèn luyện</a></li>
			<?php  
				}
				/*if($logged_in['su']==0){
			?> <li><a href="<?php echo site_url('notification');?>"><?php echo $this->lang->line('notification');?></a></li>
			 
			  <?php 
			  } */
				if($logged_in['su']==1){
			?>
			
			 
			  <li class="dropdown" <?php if($this->uri->segment(1)=='user_group'){ echo "class='active'"; } ?> >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line('setting');?>  <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('notification');?>"><?php echo $this->lang->line('notification');?></a></li>
                  
                  <li><a href="<?php echo site_url('qbank/category_list');?>"><?php echo $this->lang->line('category_list');?></a></li>
									<li><a href="<?php echo site_url('classroom');?>"><?php echo $this->lang->line('class');?></a></li>
									<li><a href="<?php echo site_url('faculty');?>">Tên khoa</a></li>
                  
				<!--	<li><a href="<?php echo site_url('dashboard/config');?>"><?php echo $this->lang->line('config');?></a></li>
					 
					<li><a href="<?php echo site_url('dashboard/css');?>"><?php echo $this->lang->line('custom_css');?></a></li>
				-->
					<li><a href="<?php echo site_url('quiz/time');?>">Thiết lập thời gian</a></li>
                  
                </ul>
              </li>
			<li><a href="https://ctsv.stu.edu.vn/attendance">Điểm danh</a></li>
			<li><a href="<?php echo site_url('form');?>">QL Xin đơn</a></li> 
			<li><a href="<?php echo site_url('etp');?>">QL Đánh giá rèn luyện</a></li>
							
			<?php 
				}
				?>
             <li><a href="<?php echo site_url('user/logout');?>"><?php echo $this->lang->line('logout');?></a></li>
              <!--
			  <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                 
                </ul>
              </li>
			  -->
			  
            </ul>
             
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

	<?php 
			}
			}
	?>
	
