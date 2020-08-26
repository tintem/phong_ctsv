
    <!-- ModalForms -->
	<div class="modal fade" id="myModal1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id=name>Form 1: <span id=span_idchitiet></span></h4>
				</div>
				<div class="modal-body">
                    <form>
                        <input type="hidden" name="id" id='idchitiet'>
                   
					<div>Thông tin sinh viên:
                        <table class="table table-striped">
                            <tr>
                                <td>MSSV</td>
                                <td><span id="studentid"></span></td>
                            </tr>
                            <tr>
                                <td>Họ tên</td>
                                <td><span id="fullname"></span></td>
                            </tr>
                            <tr>
                                <td>Lớp</td>
                                <td><span id="classid"></span></td>
                            </tr>
                            <tr>
                                <td>Khoa</td>
                                <td><span id="facultyname"></span></td>
                            </tr>
                        </table>
                    </div>
                    <div>Yêu cầu:
                        <span id="description"></span>
                    </div>
                    <div>Ngày yêu cầu:<span id="date1"></span> </div>
                    <div>Đã có:
                        <div id="student_form_detail">
                        
                           
                        
                        </div>
                    </div>
                    <div id=status>
                        Trạng thái:
                        <input type="radio" value="-1" name="status"> Hủy
                        <input type="radio" value="0"  name="status"> Chưa xem
                        <input type="radio"  value="1"  name="status"> Đang xử lý
                        <input type="radio"  value="2"  name="status"> Hoàn thành
                    </div>
                    <div>Hẹn ngày lấy: 
                         <input type="date" name="date2" id=date2>(<span id=date2_old></span>)
                    </div>
                    <div>
                        <div id=note_old></div>
                        <textarea id='note' name="note" class="form-control"></textarea>
                    </div>

                </form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="fLuuSua()">Lưu cập nhật</button>
                    <button type="button" class="btn btn-primary" onclick="fLuuSua_In()">Lưu cập nhật và in</button>
				</div>
			</div>
		</div>
	</div>

<!-- Mẫu 2 - Đơn xin cấp giấy chứng nhận -->
    <div class="modal fade" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id=name>Form 2 <span id=span_idchitiet></span></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id" id='formstudentid'>
                   
                    <div>
                        <table class="table table-striped">
                            <tr>
                                <td>
                                    Cộng hòa  <br> 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td>Tôi tên: <input type="text" name="key1" id=key1></td>
                                            <td>Sinh ngày: <input type="text" name="key2" id=key2></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                     <table>
                                        <tr>
                                            <td>Lớp: <input type="text" name="key3" id=key3></td>
                                            <td>Khoa: <input type="text" name="key4" id=key4></td>
                                             <td>MSSV: <input type="text" name="key5" id=key5></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea id=key6 name="key6"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Điện thoại: <input type="text" name="key7" id="key7"></td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td>Xac nhan NVQS</td>
                                           
                                            <td>  <input type="checkbox" name="key8" id=key8 value="nvqs"></td>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Xac nhan giam tru gia canh</td>
                                            <td>
                                                <input type="checkbox" name="key8" id=key8 value="giamtrugiacanh">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Khac
                                                <input type="text" name="key10" name="key10">
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div>Yêu cầu:
                        <span id="description"></span>
                    </div>
                    <div>Ngày yêu cầu:<span id="date1"></span> </div>
                    <div>Đã có:
                        <div id="student_form_detail">
                        
                           
                        
                        </div>
                    </div>
                    <div id=status>
                        Trạng thái:
                        <input type="radio" value="-1" name="status"> Hủy
                        <input type="radio" value="0"  name="status"> Chưa xem
                        <input type="radio"  value="1"  name="status"> Đang xử lý
                        <input type="radio"  value="2"  name="status"> Hoàn thành
                    </div>
                    <div>Hẹn ngày lấy: 
                         <input type="date" name="date2" id=date2>(<span id=date2_old></span>)
                    </div>
                    <div>
                        <div id=note_old></div>
                        <textarea id='note' name="note" class="form-control"></textarea>
                    </div>

                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="fLuuSua()">Lưu cập nhật</button>
                    <button type="button" class="btn btn-primary" onclick="fLuuSua_In()">Lưu cập nhật và in 2</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal3">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id=name>Form 3- <span id=span_idchitiet></span></h4>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" name="id" id='idchitiet'>
                   
                    <div>Thông tin sinh viên:
                        <table class="table table-striped">
                            <tr>
                                <td>MSSV</td>
                                <td><span id="studentid"></span></td>
                            </tr>
                            <tr>
                                <td>Họ tên</td>
                                <td><span id="fullname"></span></td>
                            </tr>
                            <tr>
                                <td>Lớp</td>
                                <td><span id="classid"></span></td>
                            </tr>
                            <tr>
                                <td>Khoa</td>
                                <td><span id="facultyname"></span></td>
                            </tr>
                        </table>
                    </div>
                    <div>Yêu cầu:
                        <span id="description"></span>
                    </div>
                    <div>Ngày yêu cầu:<span id="date1"></span> </div>
                    <div>Đã có:
                        <div id="student_form_detail">
                        
                           
                        
                        </div>
                    </div>
                    <div id=status>
                        Trạng thái:
                        <input type="radio" value="-1" name="status"> Hủy
                        <input type="radio" value="0"  name="status"> Chưa xem
                        <input type="radio"  value="1"  name="status"> Đang xử lý
                        <input type="radio"  value="2"  name="status"> Hoàn thành
                    </div>
                    <div>Hẹn ngày lấy: 
                         <input type="date" name="date2" id=date2>(<span id=date2_old></span>)
                    </div>
                    <div>
                        <div id=note_old></div>
                        <textarea id='note' name="note" class="form-control"></textarea>
                    </div>

                </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="fLuuSua()">Lưu cập nhật</button>
                    <button type="button" class="btn btn-primary" onclick="fLuuSua_In()">Lưu cập nhật và in</button>
                </div>
            </div>
        </div>
    </div>
<!-- end modalforms -->

<!-- Script -->
<script type="text/javascript">
var base_url ="<?php echo base_url() ?>";

$('#myModal1').on('shown.bs.modal', function (event) 
{
    
    var button = $(event.relatedTarget);
        var id = button.data('id');
       
      $("#myModal1  #span_idchitiet").html(id);  
   //alert(id);
  loadChitietStudentForm(id);

});

$('#myModal2').on('shown.bs.modal', function (event) 
{
    
    var button = $(event.relatedTarget);
        var id = button.data('id');
        alert(id);
      $("#myModal2  #formstudentid").val(id);  
   //alert(id);
  //loadChitietStudentForm(id);

});
function loadChitietStudentForm_(id)
{
  
   $("#myModal1 form #idchitiet").val(id);  ;//return;
    url = base_url +'Form1/detailStudentForm/';
  
    $.ajax({
        url:url,
        data:{id:id},
        type:"POST",
        datatype:'json',
        success:function(data2)
        {
            data2= JSON.parse(data2);
        
            console.log(data2);
            
            $("#myModal1 #name").html(data2.name);
            $("#myModal1 #studentid").html(data2.studentid);
            $("#myModal1 #fullname").html(data2.last_name+' ' + data2.first_name);
            $("#myModal1 #classid").html(data2.classid);
            $("#myModal1 #facultyname").html(data2.facultyname);
            $("#myModal1 #description").html(data2.description);
            $("#myModal1 #date1").html(data2.date1);
             $("#myModal1 #date2_old").html(data2.date2);
              $("#myModal1 #note_old").html(data2.note);
            s ='';
            $("#student_form_detail").html('');
            $.each(data2.student_form_detail, function(k,v){
                s = v.id +' - <img src="/images/form/' + v.url +'"><hr>';
                $("#student_form_detail").append(s);
            });

            $("#myModal1 input[type=\"radio\"][value=\"" + data2.status+"\"]").prop('checked', true);
           
        }
    });

}

function loadChitietStudentForm(id)
{
  
   $("#myModal2 form #formstudentid").val(id);  ;//return;
    url = base_url +'Form/detail_form_student/';
  
    $.ajax({
        url:url,
        data:{id:id},
        type:"POST",
        datatype:'json',
        success:function(data2)
        {
            data2= JSON.parse(data2);
        
          //  console.log(data2);
            t = JSON.parse(data2.notejson);
          //  alert(t);
            console.log(t);
            $.each(t, function(k,v)
            {
                alert(k+'-'+v);
                $("#myModal2 #"+k).val(v);
            });
         /*
            $.each(data2.student_form_detail, function(k,v){
                s = v.id +' - <img src="/images/form/' + v.url +'"><hr>';
                $("#student_form_detail").append(s);
            });

            $("#myModal1 input[type=\"radio\"][value=\"" + data2.status+"\"]").prop('checked', true);*/
           
        }
    });

}

function fLuuMoi()
{
    alert('New');
    url =base_url +'form/formSave/';
    data= $("#frmthemmoi").serialize();
    $.ajax({
        url:url,
        data:data,
        type:"POST",
        //datatype:'json',
        success:function(data2)
        {
            location.reload();
            //console.log(data2);
            //alert("Xng");
            //$("#myModal1 #hoten").val(data2.hoten);
        }
    });
}

function fLuuSua()
{   


    var form = $("#myModal1 form");
    var formData = new FormData(form[0]);
    //alert($("#myModal1 form input#idthanhvien").val());console.log(formData);return;
    url =base_url+'form/detailStudentFormUpdate/';
    alert(url);
    $.ajax({
        url:url,
        data:formData,
        type:"POST",
        //datatype:'json',
        success: function (data2) {
         //   alert(data2);
         console.log(data2);
       //  alert('Đã cập nhật dữ liệu');

        },
        cache: false,
        contentType: false,
        processData: false
    });
}

function fLuuSua_In()
{   

   // fLuuSua();
    $("#myModal2").modal('hide');
    fInStudentForm();
    
}

function fInStudentForm()
{
     var id=$("#myModal2 form #formstudentid").val();//alert(id); return;
     //x=  window.open("/form/detailStudentFormPrint/"+id);
     //window.location="/form/detailStudentFormPrint/"+id; 
       $('<a href="/form/print_form_student/'+id+'" target="in1sv"></a>')[0].click();    
}
function fReloadTable(idthanhvien)
{//alert(idthanhvien);
    $("#example tr#tr_" + idthanhvien +" td").css('background', '#DDF0ED');
        tam = document.getElementById('tr_' + idthanhvien);
        arr = tam.getElementsByTagName('td');
    
        arr[3].innerHTML= $("#myModal1 input[name=hoten]").val();
        
        gtinh = $('#myModal1 input[name=gioitinh]:checked').val();
        if (gtinh=='Nam')
            arr[4].innerHTML='Nam';
        else arr[4].innerHTML='Nu';

        arr[5].innerHTML= $("#myModal1 input[name=phapdanh]").val();
        arr[6].innerHTML= $("#myModal1 input[name=ngaysinh]").val();
        if ($("#myModal1 input[name=dacohoso]").is(":checked"))
            arr[7].innerHTML='DACO';
        else arr[7].innerHTML='CHUA'; 
    $("#myModal1").modal('hide');
    
}
</script> 
    </body>
</html>
<script type="text/javascript">
    $('#ModalDaoTrangSua').on('shown.bs.modal', function (event) 
{

    var button = $(event.relatedTarget);
        var id = button.data('id');
      loadAdminDaotrangChitiet(id);

});


$('#ModalThemdsthanhvien').on('shown.bs.modal', function (event) 
{

    var button = $(event.relatedTarget);
        var id = button.data('id');
  loadAdminDaotrangChitiet2(id);

});
</script>

