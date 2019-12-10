<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>


<link href="../../css/style.css" rel="stylesheet" />

<script>
function sure_delete()
{
	return confirm("Are you sure to delete selected Record ?");
}
</script>
<?php

$con=mysqli_connect('localhost','root','','dbshopping')or die(mysqli_connect_error());
if(isset($_POST['btn_delete']))
	{
	    extract($_POST);
		if ($_REQUEST['category_id'] != null)
        {
            $categoryid = $_REQUEST['category_id'];
			$qry = "delete from tblcategory
				    where category_id=".$categoryid;
		    $q =  mysqli_query($con,$qry);

		}
		if($q==1)
			echo "Record Deleted Successfully..";
			?>
			<script>
			parent.getCourseGrid();
			parent.$.colorbox.close();
			</script>
			<?php
			header('location: index.php?folder=_categorymaster');
	  }
		
?>



<html>

<form method="post" >
<body>
<table  align="center"  width="40%" class="table">
	<tr bgcolor="#0066CC" style="color:white;" align="center">

	<tr>
    	<th colspan="2"><center>
        	Are You Sure to Delete this Category</center>
        </th>
    </tr>
    </br>
    <tr>
    <td><center>
    <input type="submit" value="Delete" name="btn_delete" onClick="javascript:return sure_delete()" class="btn btn-lg btn-danger" title="Remove Category"></center>
    </td>
    </tr>
    
    </table>
    </body>
    </form>
    </html>