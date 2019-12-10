<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>


<link href="../../css/style.css" rel="stylesheet" />


<?php
$txt_name=null;$cmb_type=null;
$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
extract($_POST);
if ($_REQUEST['category_id'] != null)
        {	extract($_POST);

            $categoryid = $_REQUEST['category_id'];
			 $qr = mysqli_query($con,"select * from tblcategory where category_id=".$categoryid);
		
			if($r=mysqli_fetch_assoc($qr))
			{        	extract($r);

				$txt_name=$r['category_name'];
				 $cmb_type=$r['category_type'];
			 }
		
		}



if(isset($_POST['btn_save']))
{
print_r($_GET);
extract($_POST);
if ($_REQUEST['category_id'] != null)
        {
  $categoryid = $_REQUEST['category_id'];
  $q=mysqli_query($con,"update tblcategory set category_name='$txt_name',category_type='$cmb_type' where category_id=".$categoryid);
		
	     }
	if($q==1)
	{
		echo "Recod update successfully";
		header('location: index.php?folder=_category');
	}
	else
	{
		echo "Error: ".mysqli_error($con);
	}
}
?>


<html>
<form method="post">
<div class="container">
<div class="col-md-2">
</div>
<div class="col-md-10">
<body>
<table  align="center"  width="40%" class="table">
	<tr bgcolor="#0066CC" style="color:white;" align="center">

	<tr>
    	<th colspan="2">
        	Category Details
        </th>
    </tr>
    </br>
    
    <tr>
    	<td>*Category Name</td>
        <td>
        	<input  type="text" name="txt_name" class="form-control" value="<?=$txt_name?>"/>
        </td>
    </tr>
    </br>
    <tr>
    	<td>*Category Type</td>
        <td>
        	<select name="cmb_type" class="form-control">
            	<option value="">--Select type--</option>
            	<?php
                	$type = array('Vegetable','Fruit','Food');
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
    </br></br>
   <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_save" value="Update Now" class="btn btn-lg btn-info" />
            &nbsp;&nbsp;
     
        	
        	
        </td>
    </tr>
   
   </form>
</table>
</div>
<div class="col-md-3">
</div>
</html>