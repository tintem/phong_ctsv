<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Don xin xac nhan</title><!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>
<body>
	<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>chonj</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	foreach ($data as $key => $value) 
        	{
        		?>
        	 <tr>
                <td data-search="Tiger Nixon"><?php 
                echo $value['last_name']. ' ' . $value['first_name']
                ?></td>
                <td>
                	<?php 
                echo $value['classid']
                ?>
                </td>
                <td>Edinburgh</td>
                <td>61</td>
                <td data-order="1303689600">Mon 25th Apr 11</td>
               
                <td>
                	<input type="checkbox" name="studentid" value="<?php echo $value['studentid'] ?>">
                </td>
                <td>
                	<a class="btn btn-primary" data-toggle="modal" href='#modal-id' data-id='<?php echo $value['studentid'] ?>'>Xem</a>
                </td>
            </tr>
            <?php
        	}
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>#</th>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
		$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>
	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Modal title</h4>
				</div>
				<div class="modal-body">
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>