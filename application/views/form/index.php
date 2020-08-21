<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Danh sách form</title>
</head>
<body>
	<div class="container">
		<?php
		foreach ($data as $key => $value) 
		{
			?>
			<div><a href="/form/form1/<?php echo $value['id'] ?>">
			<?php echo $value['name'] ?>
			</a></div>

			<?php
		}
		
		?>
	</div>
</body>
</html>