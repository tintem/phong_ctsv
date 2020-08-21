<!DOCTYPE html>
<html lang="">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

<style>



@page {
   size: 7in 9.25in;
   margin: 0mm 14mm 0mm 20mm;
}
   #print {width:100%; border-style:none;  font-family:"Times New Roman", Times, serif  }
   .group1 div, .group2 div, .group3 div, .group4 div, .group5 div, .group6 div{lign-height: 30px; min-height: 25px}
   .group1 div{text-align: center; margin: 0 auto}
   .group1 div.c3{width: 30%}
 	
   .group3{width: 45%; float:right; }
   .group3 div{text-align: center; margin: 0 auto}
   .group3 div.c3{height: 60px; font-style: italic; font-size: 13px}

	.group4 div.c1{height: 40px }
	.group4 div.c3{font-weight: bold; }

   .group6{width: 45%; float:right; }
   .group6 div{text-align: center; margin: 0 auto}
   .group6 div.c2{height: 60px; font-weight: bold; }
   .group6 div.c3{ font-weight: bold; }
  </style>
</head>
<body>
<div id="content">
  <div id="print">
  <?php
  $breakPage ='<p style="page-break-after: always;">&nbsp;</p>';
  //print_r($data); exit;
  $data2 =json_decode( $data->data, true); 
  //echo '<pre>';print_r($data2); var_dump($data2);exit;
  $ngaythangnam = explode('-', $data->ngaysinh);
  ?>

<div class="group1">
	<div class="c1">CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</div>
	<div class="c2">Độc Lập - Tự Do - Hạnh Phúc</div>
	<div class="c3"> <hr> </div>
	<div class="c4">ĐƠN XIN XÁC NHẬN</div>
	<div class="c5">Kính gửi: Ban Giám Hiệu Trường Đại học Công Nghệ Sài Gòn</div>
</div>

<div class="group2">
	<div>Họ và tên: <?php echo $data2['hoten'] ?></div>
	<div>
		Sinh ngày: <?php echo $ngaythangnam[2] ?> Tháng: <?php echo $ngaythangnam[1] ?> Năm <?php echo $ngaythangnam[0] ?>, giới tính: Nam <input type="checkbox" checked> Nữ<input type="checkbox">
	</div>
	<div>Hộ khẩu thường trú: <?php echo $data2['hokhautt'] ?></div>
	<div>
		Hiện đang học lớp: D16Th01, MSSV: <?php echo $data->studentid ?>
	</div>
	<div>Hệ đào tạo: Đại học</div>
	<div>
		Khóa học: 2016-2020, Loại hình đào tạo; chính quy
	</div>
	<div>Kkoa: Công Nghệ thông tin</div>
	<div>
		Nay tôi làm đơn này xin gửi tới Ban Giám Hiệu Trường Đại học Công nghệ Sài Gòn xin xác nhận tôi là sinh viên của trường năm học: 2019-2020
	</div>
	<div>
		Lý do xác nhận: Bổ sung hồ sơ xin tạm hoãn nghĩa vụ quân sự tại địa phương.
	</div>
	<div>Rất mong được sự chấp thuận của Ban Giám Hiệu.</div>
</div>
<div class="group3">
	<div class="c1">TP. Hồ Chí Minh, ngày 14 tháng 07 năm 2020</div>
	<div class="c2">Người làm đơn</div>
	<div class="c3">(ký tên, ghi rõ họ tên)</div>
	<div class="c4">Nguyễn Văn Tèo</div>
</div>
<div style="clear: both;"></div>
<div class="group4">
	<div class="c1"></div>
	<div class="c2"> <hr> </div>
	<div class="c3">XÁC NHẬN CỦA TRƯỜNG ĐẠI HỌC CÔNG NGHỆ SÀI GÒN</div>
</div>

<div class="group5">
	<div class="c1">Xác nhận sinh viên: </div>
	<div class="c2">Hiện là sinh viên năm thứ: </div>
	<div class="c3">MSSV:</div>
	<div class="c3">Hệ đào tạo:</div>
</div>

<div class="group6">
	<div class="c1">TP. Hồ Chí Minh, ngày 14 tháng 07 năm 2020</div>
	<div class="c2">HIỆU TRƯỞNG</div>
	<div class="c3">PGS, TS Cao Hào Thi</div>
</div>
  </div>

</div>

<script type="text/javascript">
	window.print() ;
</script>