<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>


<link href="../../css/style.css" rel="stylesheet" />





<?php
include '../../include/config.php';

$cmb_type=null;$txt_name=null;
if(isset($_POST['btn_save']))
{
	extract($_POST);
	$data = array( 'category_name'=>$txt_name,
					'category_type'=>$cmb_type
				  );

	if($m->sql_array_insert('tblcategory',$data))
	{
		$m->showInfo('','category added Successfully..');	
		
		    header('location: index.php?folder=_categorymaster');
		
	}
	else
	{
		$m->showError('Error',mysqli_error($m->con));	
	}
}
?>
<html>
<head>
   </head>
<body>
<form method="post" >
<br><br><br><br><br><br><br>
<div class="container">
<div class="col-md-2">
</div>
<div class="col-md-10">
<table  align="center"  width="10%" class="table">
	<tr bgcolor="#0066CC" style="color:white;" align="center">

	<tr>
    	<th colspan="2">
        	Category Details
        </th>
    </tr>
    
    <tr>
    	<td>*Category Name</td>
        <td>
        	<input type="text" name="txt_name" class="form-control" value="<?=$txt_name?>"/>
        </td>
    </tr>
    <tr>
    	<td>*Category Type</td>
        <td>
        	<select name="cmb_type" class="form-control">
            	<option value="">--Select type--</option>
            	<?php
                	$type = array('Vegetable','Fruit');
					foreach($type as $v)
					{
						if($cmb_type==$v)
							echo "<option selected>$v</option>";
						else
							echo "<option>$v</option>";
					}
				?>
            </select>
        	
        </td>
    </tr>
   <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_save" value="Save Now" class="btn btn-sm btn-success" />
            &nbsp;&nbsp;
          </td>
    </tr>
   </form>
</table>
</hr>
</body>
</html>
