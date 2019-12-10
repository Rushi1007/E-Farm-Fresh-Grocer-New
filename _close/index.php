<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>


<link href="../css/style.css" rel="stylesheet" />




<script>
function sure_delete()
{
	return confirm("Are you sure to Remove Selected Record From Cart?....");
}
</script>
<?php
$con=mysqli_connect('localhost','root','','dbshopping')or die(mysqli_connect_error());
extract($_POST);
if(isset($_POST['btn_close']))
	{
	        extract($_POST);
		  $productid = $_REQUEST['prod_id'];
			$qry = "delete from tblcart
				    where prod_id=".$productid;
		    $q =  mysqli_query($con,$qry);
            if($q==1)
			echo "Record Deleted Successfully..";
			//header('location: index.php?folder=_productmaster');
	  }
		
?>
<br /><br /><br />
<html>
<form method="post" >
<body>
<table  align="center"  width="40%" class="table">
	<tr bgcolor="#0066CC" style="color:white;" align="center">

	<tr>
    	<th colspan="2">
        	<center> <b>Are You sure to Remove  this record From Shopping cart</b></center>
        </th>
    </tr>
    </br>
    <tr>
    <td><center>
    <input type="submit" value="Remove" name="btn_close" onClick="javascript:return sure_delete()" class="btn btn-group-lg btn-danger" ></center>
    </td>
    </tr>
    
    </table>
    </body>
    </form>
    </html>