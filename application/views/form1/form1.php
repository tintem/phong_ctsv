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
<style type="text/css">
    #myModal1 img.hinh{width: 300px}
    #student_form_detail img{width: 100%}
    #note_old{border-style: solid; border-width: 1px}
</style>
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
                <th>Chọn in</th>
                <th>Kiểm tra</th>
            </tr>
        </thead>
        <tbody>
        	<?php
        	foreach ($data as $key => $value) 
        	{
        		?>
        	 <tr>
                <td data-search="Tiger Nixon"><?php 
                echo $value['last_name']. ' ' . $value['first_name'].' - ' . $value['formid']?> </td>
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
                    <?php
                    if ($value['formid']==1)
                        {?>
                	       <a class="btn btn-primary" data-toggle="modal" href='#myModal1' data-id='<?php echo $value['id'] ?>'>Xem</a>
                        <?php
                        }

                    if ($value['formid']==2)
                        {?>
                           <a class="btn btn-primary" data-toggle="modal" href='#myModal2' data-id='<?php echo $value['id'] ?>'>Xem</a>
                        <?php
                        }

                    if ($value['formid']==3)
                        {?>
                           <a class="btn btn-primary" data-toggle="modal" href='#myModal3' data-id='<?php echo $value['id'] ?>'>Xem</a>
                        <?php
                        }
                   ?>
                </td>
            </tr>
            <?php
        	}
            ?>
        </tbody>
        
    </table>

    <script type="text/javascript">
		$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</body>
</html>
<?php
include(APPPATH.'views/form1/modalforms.php');
?>
