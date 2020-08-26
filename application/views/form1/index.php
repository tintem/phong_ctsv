<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Danh sách form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<table class="table table-bordered table-striped">
			<thead class="t">
				<tr>
					<th>stt</th>
					<th>Tên biểu mẫu</th>
					<th>mô tả</th>
					<th>Mẫu</th>
					<th>Số đơn</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($data as $key => $value)
				{
				?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><a href="<?php echo base_url() ?>/form/form1/<?php echo $value['formid'] ?>">
						<?php echo $value['name'] ?>
					</a></td>
					<td>
						<?php 
							echo $value['description']
						?>
					</td>
					<td>
						<a href="<?php echo base_url() ?>images/form/<?php 
							echo $value['url'] 	?>" target=_hinh>
							<img src="<?php echo base_url() ?>images/form/<?php 
							echo $value['url'] 	?>" alt="" width=100>
						</a>
						</td>
					<td>5</td>
					<td>
						<a class="btn btn-primary openModalEdit" data-toggle="modal"  data-id="<?php echo $value['formid'] ?>">Sửa</a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		
</body>
</html>

<script>
var base_url="<?php echo base_url() ?>";
	$(document).ready(
			function(){
				/*$('#modal-id').on('shown.bs.modal', function(e){
					var id = $(this).attr('data-id');
					alert('hi, id='+id);
				})*/

				$("a.openModalEdit").click(function()
				{
     			 var id = $(this).attr('data-id');
     			// alert(id);
     			 $('#modal-id').modal('show');
     			 chiTietForm(id);
     			});
			}
		);


function chiTietForm(formid)
{
	$.ajax({
		url: base_url+'/form/formEdit',
		type: 'POST',
		data: {formid:formid},
		success:function(s)
		{
			console.log(s);
			s = JSON.parse(s);
			$('#modal-id form #formid').val(formid);
			$('#modal-id form #name').val(s.name);
			$('#modal-id form #description').val(s.description);

		}
	});

	
}

function frmUpdate()
{
	$.ajax({
		url: base_url+'/form/formUpdate',
		type: 'POST',
		data: $("#modal-id form").serializeArray(),
		success:function(s)
		{
			console.log(s);
			
			alert(s);
		}
	});

}
</script>
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Chỉnh sửa nội dung đơn</h4>
			</div>
			<div class="modal-body">
				<form action="/action_page.php">
					<div class="form-group">
						<label for="formid">id biểu mẫu</label>
						<input type="text" class="form-control" placeholder="Enter email" id="formid" name="formid">
					</div>
					<div class="form-group">
						<label for="name">Tên biểu mẫu</label>
						<input type="text" class="form-control" placeholder="Enter email" id="name" name="name">
					</div>
					<div class="form-group">
						<label for="description">Các tài liệu cần nộp kèm</label>
						<textarea class="form-control" rows="5" id="description" name="description"></textarea>
					</div>
					
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" onClick='frmUpdate()'>Save changes</button>
			</div>
		</div>
	</div>
</div>