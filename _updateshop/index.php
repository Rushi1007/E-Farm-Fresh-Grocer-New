<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>


<link href="../css/style.css" rel="stylesheet" />
<div class="container" >
<div class="table" align="center">
<form method="post">
<br /><br /><br />
Quantity:<input type="text" name="t"><br/><br />

<input type="submit" name="btn_update" value="Update" class="btn btn-info">
</div>

</div>
<?php


$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
if(isset($_POST['btn_update']))
{
	extract($_POST);
		  $productid = $_REQUEST['prod_id'];
	
  $q=mysqli_query($con,"update tblcart set prod_qty='$t' where prod_id=".$productid);
		
	if($q==1)
	{
		echo "Recod update successfully";
	}
	else
	{
		echo "Error: ".mysqli_error($con);
	}
}
?>

</form>
