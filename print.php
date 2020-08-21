<?php  
include "config/config.php";
include ROOT."/include/function.php";
spl_autoload_register("loadClass");
if (!isset($_SESSION["usersLogin"])) {
  header("location:index.html");exit;
}

$user = new Users();
$listCusId = isset($_REQUEST['cus_id'])?$_REQUEST['cus_id']:array();
//print_r($_GET);exit;
$list = getIndex('list',''); 
if ($list=='all')
  $data  = $user->printCustomDeclareAll($listCusId);
else
$data  = $user->printCustomDeclare($listCusId);
//echo '<pre>'; print_r($data); exit;
?>
<!DOCTYPE html>
<html lang="">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script type="text/javascript" src="assets/js/jquery.js"></script>
<style>
/*
Monarch (7 3/4)   3.875" x 7.5" 
1 inch = 96 pixel 
Monarch =372 x 720 (size mẫu 372x849)
*/


   #print {width:340px; border-style:none; font-weight: bold; font-family:"Times New Roman", Times, serif  }
   
  .print{position: relative;
    width:340px; height: 700px;  /* background-color:#D4C397; background-image:url(images/9x21cm-dung_tiengphap_3); background-repeat:repeat; */
    top:0px;
  } 
  .row1{position:absolute;top:130px; left: 0px;  font-weight: bolder; font-stretch: condensed;  height:20px;}

    .row1 div.pos1{position:absolute; left: 143px; font-size: 8pt; font-weight: bolder; font-stretch: condensed;} 
   
    .row1 .pos2{position: absolute;top:0px; left: 336px; font-size: 8pt}

  div.row2{position: absolute; top:145px; left: 0px; width:100%; height: 30px; letter-spacing:14px; font-size:9pt; }
      div.row2 .pos1{position: absolute;top:0px; left: 152px; } /* Year of arival */
      div.row2 .pos2{position: absolute;top:0; left: 276px; } /* Month */
      div.row2 .pos3{position: absolute;top:0; left: 358px; } /* Date */

  /* row 3: name -full name;*/
  div.row3{position: absolute; top:186px; left: 0px; width:100%; height: 28px; letter-spacing:0px; font-size:9pt;  text-transform: uppercase; /* background: yellow */ }
  div.row3 div.pos1{position: absolute;top:0; left: 110px;}
  div.row3 div.pos2{position: absolute;top:0; left: 243px;}

  /* row4 address */
  div.row4{position: absolute; top:215px; left: 0px; width:100%; height: 22px; letter-spacing:0px; font-size:9pt; /* background: green */  }
  div.row4 div.pos1{position: absolute;top:0; left: 106px;}
 
 /* row5 - phone */
  div.row5{position: absolute; top:230px; left: 0px; width:100%; height: 22px; letter-spacing:9px; font-size:9pt;  /* background: green */   }
  div.row5 div.pos1{position: absolute;top:0; left: 140px;}

/* row6 - Nationality */
  div.row6{position: absolute; top:252px; left: 0px; width:100%; height: 20px; letter-spacing:0px; font-size:9pt;  /* background: green */   }
  div.row6 div.pos1{position: absolute;top:0; left: 105px;}
  div.row6 div.pos2{position: absolute;top:0; left: 285px;}

  /* row7 - Date of Birth */
  div.row7{position: absolute; top:273px; left: 0px; width:100%; height: 20px; letter-spacing:15px; font-size:9pt;  /* background: green */   }
   
  div.row7 .pos1{position: absolute;top:0px; left: 112px; } /* Year of arival */
  div.row7 .pos2{position: absolute;top:0; left: 245px; } /* Month */
  div.row7 .pos3{position: absolute;top:0; left: 350px; } /* Date */

  /* row8 - Passport */
  div.row8{position: absolute; top:295px; left: 0px; width:100%; height: 30px; letter-spacing:22px; font-size:9pt;  /* background: green */   }
   
  div.row8 .pos1{position: absolute;top:0px; left: 110px; } /* Passport No */
 
  /* Family Member */
  div.row8_{position: absolute; top:334px; left: 0px; width:100%; height: 30px; 
  /* letter-spacing:22px; */ font-size:9pt;  /* background: green */   }
   
  div.row8_ .pos1{position: absolute;top:0px; left: 130px; } /* Adult */
  div.row8_ .pos2{position: absolute;top:0px; left: 250px; } /* U */
  div.row8_ .pos3{position: absolute;top:0px; left: 350px; } /* U6 */

  /* row9 - checked Bringing1 */
  div.row9{position: absolute; top:387px; left: 0px; width:100%; height: 28px; letter-spacing:22px; font-size:9pt;  /* background: green */   }
   
  div.row9 .pos1{position: absolute;top:0px; left: 312px; } /* Yes */
  div.row9 .pos2{position: absolute;top:0; left: 356px; } /* No */
  div.row9 img{width:20px; height: 20px}

  /* row10 - checked2 */
  div.row10{position: absolute; top:417px; left: 0px; width:100%; height: 28px; letter-spacing:22px; font-size:9pt;  /* background: green */   }
   
  div.row10 .pos1{position: absolute;top:0px; left: 313px; } /* Yes */
  div.row10 .pos2{position: absolute;top:0; left: 356px; } /* No */
  div.row10 img{width:20px; height: 20px}

  /* row11 - checked3 */
  div.row11{position: absolute; top:441px; left: 0px; width:100%; height: 28px; letter-spacing:22px; font-size:9pt;  /* background: green */   }
   
  div.row11 .pos1{position: absolute;top:0px; left: 313px; } /* Yes */
  div.row11 .pos2{position: absolute;top:0; left: 356px; } /* No */
  div.row11 img{width:20px; height: 20px}

  /* row12 - checked4 */
  div.row12{position: absolute; top:467px; left: 0px; width:100%; height: 28px; letter-spacing:22px; font-size:9pt;  /* background: green */   }
   
  div.row12 .pos1{position: absolute;top:0px; left: 313px; } /* Yes */
  div.row12 .pos2{position: absolute;top:0; left: 356px; } /* No */
  div.row12 img{width:20px; height: 20px}

  /* row12_ - checked5 */
  div.row12_{position: absolute; top:492px; left: 0px; width:100%; height: 28px; letter-spacing:22px; font-size:9pt;  /* background: green */   }
   
  div.row12_ .pos1{position: absolute;top:0px; left: 273px; } /* Yes */
  div.row12_ .pos2{position: absolute;top:0px; left: 315px; } /* No */
  div.row12_ img{width:20px; height: 20px}

  /* row13 - checked Cash*/
  div.row13{position: absolute; top:551px; left: 0px; width:100%; height: 28px; letter-spacing:22px; font-size:9pt;  /* background: green */   }
   
  div.row13 .pos1{position: absolute;top:0px; left: 312px; } /* Yes */
  div.row13 .pos2{position: absolute;top:0; left: 355px; } /* No */
  div.row13 img{width:20px; height: 20px}

  /* row14 - Articles*/
  div.row14{position: absolute; top:651px; left: 0px; width:100%; height: 28px; letter-spacing:5px; font-size:9pt;  /* background: green */   }
   
  div.row14 .pos1{position: absolute;top:0px; left: 147px; } /* Yes */
  div.row14 .pos2{position: absolute;top:5px; left: 238px; font-weight: bold; } /* Yes */
  div.row14 .pos3{position: absolute;top:0; left: 336px; } /* No */
  div.row14 img{width:20px; height: 20px}

  div.breakPage{page-break-before: always;}
@media print
{ 
  .print{page-break-before: always;}
}
</style>
</head>
<body>
<div id="content">
  <div id="print">
  <?php
  $breakPage ='<p style="page-break-after: always;">&nbsp;</p>';

 //$breakPage=' <p style="page-break-after: always;">&nbsp;</p><p style="page-break-before: always;">&nbsp;</p>';
   //   $s ="<div class='print'></div>".$breakPage; //bo trang dau
     //echo $s;
  foreach ($data as $key => $v) 
  {
     $s=  $breakPage;
     $s ="<div class='print'>";
     $s .="<div class=row1>";
     $div1 ="<div class=pos1>".$v['FightNo']."</div>";
     $div2 ="<div class=pos2>".strtoupper($v['PointofEmbarkation'])."</div>";

     $s .= $div1. $div2;
     $s .="</div>";
//Row2
     $year = Date('Y', strtotime($v['PointofEmbarkation']) );
     $month = Date('m', strtotime($v['PointofEmbarkation'] ));
     $date = Date('d', strtotime($v['PointofEmbarkation']));
     $s .="<div class=row2>";
     $s .="<div class=pos1>" .$year."</div>";
     $s .="<div class=pos2>" .$month."</div>";
     $s .="<div class=pos3>" .$date."</div>";
     $s .="</div>";
    
//row3
    $s .="<div class=row3>";
    $s .="<div class=pos1>".$v['LastName']."</div>";
    $s .="<div class=pos2>".$v['FirstName']."</div>";
    $s .="</div>";
   /* s +="<div class=row3>";
    s +="<div class=pos1>"+ Name1[i]+"</div>";
    s +="<div class=pos2>"+ Name2[i]+"</div>";
    s +="</div>";*/
//row4
    $s .="<div class=row4>";
    $s .="<div class=pos1>".$v['AddressInJapan']."</div>";
    $s .="</div>";

     /*s +="<div class=row4>";
     s +="<div class=pos1>Add:"+ Name1[i]+ " 123- Hotel</div>";
     s +="</div>";*/

//row5
     $s .="<div class=row5>";
     $s .="<div class=pos1>".$v['TelInJapan']."</div>";
     $s .="</div>";
    /* s +="<div class=row5>";
     s +="<div class=pos1>0903-762-632</div>";
     s +="</div>";*/

//row6 nationality
     $s .="<div class=row6>";
     $s .="<div class=pos1>".$v['Nationality']."</div>";
     $s .="<div class=pos2>".$v['Occupation']."</div>";
     $s .="</div>";
   
//row7 Date of Birthday
     $year = Date('Y', strtotime($v['DateOfBirth']) );
     $month = Date('m', strtotime($v['DateOfBirth'] ));
     $date = Date('d', strtotime($v['DateOfBirth']));
     $s .="<div class=row7>";
     $s .="<div class=pos1>".$year."</div>";
     $s .="<div class=pos2>".$month."</div>";
     $s .="<div class=pos3>".$date."</div>";
     $s .="</div>";
   
//row8 passport
     $s .="<div class=row8>";
     $s .="<div class=pos1>".$v['PassportNo']."</div>";
   
     $s .="</div>";
     

     $s .="<div class=row8_>";
     $s .="<div class=pos1>8".$v['Adult']."</div>";
     $s .="<div class=pos2>9".$v['Under20']."</div>";
     $s .="<div class=pos3>0".$v['Under6']."</div>";
     $s .="</div>";
     $s .="<div style='height:20px'></div>";
     
     //row 9: checked1
     $s .="<div class=row9>";
     if ($v['Bringing1']==1) 
      $s .="<div class=pos1><img src='images/checkmark3.png'></div>";
     else 
      $s .="<div class=pos2><img src='images/checkmark3.png'></div>";
    
     $s .="</div>";

     //row 10: checked2
     $s .="<div class=row10>";
     if (trim($v['Bringing2'])==1) 
      $s .="<div class=pos1><img src='images/checkmark3.png'></div>";
     else 
      $s .="<div class=pos2><img src='images/checkmark3.png'></div>";
    
     $s .="</div>";

     //row 11: checked3
     $s .="<div class=row11>";
     if (trim($v['Bringing3'])==1) 
      $s .="<div class=pos1><img src='images/checkmark3.png'></div>";
     else 
      $s .="<div class=pos2><img src='images/checkmark3.png'></div>";
    
     $s .="</div>";

     //row 12: checked4
     $s .="<div class=row12>";
     if ($v['Bringing4']==1) 
      $s .="<div class=pos1><img src='images/checkmark3.png'></div>";
     else 
      $s .="<div class=pos2><img src='images/checkmark3.png'></div>";
    
     $s .="</div>";

     //row 12): Bringing5
    /* $s .="<div class=row12_>";
    /// if ($v['Bringing5']==1) 
      $s .="<div class=pos1><img src='images/checkmark3.png'></div>";
     ///else 
      $s .="<div class=pos2><img src='images/checkmark3.png'></div>";
     $s .="</div>";
*/
     //////$s .="<div style='height:45px'></div>";



     //row 13: Cash
     $s .="<div class=row13>";
     if ($v['Cash']>0) 
      $s .="<div class=pos1><img src='images/checkmark3.png'></div>";
     else 
      $s .="<div class=pos2><img src='images/checkmark3.png'></div>";
    
     $s .="</div>";
    
    ///// $s .="<div style='height:60px'></div>";
     //row 14: Articles
     $s .="<div class=row14>";
     if ($v['Unaccompanied']>0) 
      {
          $s .="<div class=pos1><img src='images/checkmark3.png'></div>";
          $s .="<div class=pos2>".$v['Unaccompanied']."</div>";
      }
     else 
      $s .="<div class=pos3><img src='images/checkmark3.png'></div>";
    
     $s .="</div>";
     //===========================

     $s .="</div>";
    // $s.= $breakPage;
    /* if ($key<= Count($data)-1)
        $s .="<div class='breakPage'></div>";*/
     echo $s;
    
  }
?>
  </div>
</div>
<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<script>
  $(document).ready( function(){
   $("div.print:first").css("top", "-20px");
   $("div.print:gt(0)").css("top", "-12px");
  window.print();
  });
</script>
   </body>
</html>