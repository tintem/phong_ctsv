<div class="container">

<?php 
function integerToRoman($integer) {
    // Convert the integer into an integer (just to make sure).
    $integer = intval($integer);
    $result = '';

    // Create a lookup array that contains all of the Roman numerals.
    $lookup = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    foreach ($lookup as $roman => $value) {
        $matches = intval($integer / $value);
        $result .= str_repeat($roman, $matches);
        $integer = $integer % $value;
    }
    return $result;
}
//$logged_in=$this->session->userdata('logged_in');

$student_value_arr=null;
$class_value_arr=null;
$teacher_value_arr=null;
$student_value_total=0;
$class_value_total=0;
$teacher_value_total=0;
$cid_arr=null;
if($result_detail!=null)
{

    //var_dump($result_detail);exit; 
    $cid_arr=explode(",",$result_detail['cid']);
    //var_dump($cid_arr);
    $student_value_arr=explode(",",$result_detail['student_value']);
    $class_value_arr=explode(",",$result_detail['class_value']);
    if($class_value_arr[0]=='')
     $class_value_arr=null;
    $teacher_value_arr=explode(",",$result_detail['teacher_value']);
    if($teacher_value_arr[0]=='')
        $teacher_value_arr=null;
}

if($template==null)
    echo "Ban khong co quyen";
else{
?>
    
   
    <div class="row">
        <div class="header1">
        BỘ GIÁO DỤC VÀ ĐÀO TẠO <br>
        TRƯỜNG ĐẠI HỌC CÔNG NGHỆ SÀI GÒN
        <hr  class="myhr">
        
        Khoa: <?php if($user['facultyname']!=null) echo $user['facultyname'] ?> – Lớp: <?php if($user['classid']!=null) echo $user['classid'] ?>
        </div>
        <div class="header2">
        CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br>
        Độc lập – Tự do – Hạnh phúc 
        <hr>
        <?php
        $date=getdate();
        ?>
        Tp. Hồ Chí Minh, ngày <?php echo $date['mday']?> tháng <?php echo $date['mon']?> năm <?php echo $date['year']?>
        </div>
        <div class="title">PHIẾU ĐÁNH GIÁ KẾT QUẢ RÈN LUYỆN CỦA SINH VIÊN <br>
        <?php
        $arr=explode("-",$semester);
        echo "HỌC KỲ ",$arr[2], " –  NĂM HỌC ",$arr[0]," - ",$arr[1];
        ?>
        </div>
        <div>
        Họ và tên sinh viên: <?php echo $user['last_name']," ",$user['first_name'] ?> – MSSV: <?php if($user['studentid']!=null) echo  $user['studentid'];?>
        </div>
        <form action="<?php echo base_url();?>etp/update" method="POST">
        <input type="hidden" name="semester" value="<?php echo $semester;?>">
        <input type="hidden" name="rid" value="<?php echo $result['rid'];?>">
        <input type="hidden" name="user_type" value="<?php echo $type_user?>">
        <table class="dgrl-tbl">
            <tr align="center">
                <th width="60%">Nội dung đánh giá</th>
                <th width="10%">Thang điểm</th>
                <th width="10%">Sinh viên tự đánh giá</th>
                <th width="10%">Tập thể lớp đánh giá</th>
                <th width="10%">CVHT/GVCN kết luận điểm </th>
            </tr>
            <tr align="center">
                <td>(1)</td>
                <td>(2)</td>
                <td>(3)</td>
                <td>(4)</td>
                <td>(5)</td>
            </tr>
            <?php
            $category="";
            $group="";
            $catIndex=0;
            
        foreach($template as $temp)
        {

            if($category!=$temp['catid'])
            {
            if($category!=0){
            ?>

            <tr>
                 <td colspan="2" style="font-weight: bold; text-align: center;">Tổng <?php echo integerToRoman($catIndex)?>. (Tối đa <?php echo $temp['cat_max_point']?> điểm)</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
                 <td>&nbsp;</td>
               
             </tr>
            <?php 
            
            }else
            { $catIndex++;}
            ?>
             <tr>
                 <td colspan="5" class="category"><?php echo integerToRoman($catIndex),". ",$temp['cat_content'] ?>. </td>
             </tr>
            <?php
            $category=$temp['catid'];
            $catIndex++;
            $groupIndex=0;
            }
            if($group!=$temp['gid']&&$temp['group_content']!=null)
            {
                if($temp['group_note']==null){
            ?>
              <tr>
                 <td colspan="5" class="group"><?php echo chr(97+$groupIndex),". ",$temp['group_content']?> </td>
             </tr>
            <?php
                }else{
            ?>
                <tr>
                    <td class="group"><?php echo chr(97+$groupIndex),". ",$temp['group_content'] ?> </td>
                    <td>&nbsp;</td>
                    <td colspan="3" align="center"><?php echo $temp['group_note']?></td>
                </tr>
            <?php
                }
            $group=$temp['gid'];
            $groupIndex++;
            }
            ?>
            <tr>
                 <td class="criteria-content"> <?php echo $temp['criteria_content'] ?></td>
                 <td><?php echo $temp['criteria_point'] ?></td>
                 <?php
                 if($temp['criteria_note']!=null || $temp['criteria_point']==null)
                    echo '<td colspan="3" align="center">',$temp['criteria_note'],'</td>';
                 else{
                    if($student_value_arr!=null) 
                        $student_value_total+=$student_value_arr[array_search($temp['cid'],$cid_arr)];
                    if($class_value_arr!=null) 
                        $class_value_total+=$class_value_arr[array_search($temp['cid'],$cid_arr)];
                    if($teacher_value_arr!=null) 
                        $teacher_value_total+=$teacher_value_arr[array_search($temp['cid'],$cid_arr)];
                     ?>
                <td><input class="txt-point" type="number" name="<?php echo "student_",$temp['cid'] ?>" id="<?php echo "student_",$temp['cid'] ?>" value="<?php if($student_value_arr!=null) echo $student_value_arr[array_search($temp['cid'],$cid_arr)]; ?>" >
                  
                </td>
                    <td><input class="txt-point" type="number" name="<?php echo "class_",$temp['cid'] ?>" id="<?php echo "class_",$temp['cid'] ?>" value="<?php if($class_value_arr!=null) echo $class_value_arr[array_search($temp['cid'],$cid_arr)]; ?>" ></td>
                    <td><input class="txt-point" type="number" name="<?php echo "teacher_",$temp['cid'] ?>" id="<?php echo "teacher_",$temp['cid'] ?>" value="<?php if($teacher_value_arr!=null) echo $teacher_value_arr[array_search($temp['cid'],$cid_arr)]; ?>"></td>
                         
                 <?php } ?>              
             </tr>
             <?php
                }

                ?>
             <tr> 
                 <td style="font-weight: bold; text-align: center;">Tổng cộng</td>
                 <td style="font-weight: bold;">0 - 100</td>
                 <td><?php echo $student_value_total ?></td>
                 <td><?php echo $class_value_total ?></td>
                 <td><?php echo $teacher_value_total ?></td>
             </tr>

             <tr>
                 <td style="font-weight: bold; text-align: center;">Xếp loại</td>
                <?php
                if($type_user=='student')
                    echo '<td colspan="3" style="background-color:gray;"></td>';
                else if($type_user=='class')
                { 
                ?>
                    <td >&nbsp;</td>
                    <td><input type="button" onclick="copyToClass(<?php echo $result['rid'];?>)" value='==>'></button></td>
                     
                     <td>&nbsp;</td>
                <?php } else if($type_user=='teacher')
                {?>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td ><input type="button" onclick="copyToTeacher(<?php echo $result['rid'];?>)" value='==>'></td>
                     
                <?php } ?>
                <td>&nbsp;</td>
             </tr>
             <tr>
                 <td colspan="5" align="center">
                     <input type="submit" value="Nộp" name="btnSubmit">
                 </td>
             </tr>
        </table>
        </form>
    </div>
</div>
<?php } ?>
<script>
    <?php
    echo 'var cid =[',$result_detail['cid'],'];';
    ?>
    function copyToClass() {
        for(i=0;i<cid.length;i++)
            document.getElementById('class_'+cid[i]).value=document.getElementById('student_'+cid[i]).value;
    }
    function copyToTeacher() {
        for(i=0;i<cid.length;i++)
        {    
            document.getElementById('teacher_'+cid[i]).value=document.getElementById('class_'+cid[i]).value;
            console.log(cid[i]);
        }
    }
</script>