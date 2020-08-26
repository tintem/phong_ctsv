<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Danh sách form</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
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
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($data as $key => $value)
				{
				?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><a href="/form/form1/<?php echo $value['formid'] ?>">
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
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		
</body>
</html>