<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>


<link href="../../css/style.css" rel="stylesheet" />




<?php
include '../../include/_res.php';
if(isset($_POST['btn_upload']))
{
if($_FILES['f1']['error']>0)
{
	echo"Error:".$_FILES['f1']['error']."<br />";
}
else
{ 
   $id=$_GET['product_id'];
	echo"Upload File:" .$_FILES["f1"]["name"]."<br />";
    echo"Type:" .$_FILES["f1"]["type"]."<br />";
	echo"Upload File:" .($_FILES["f1"]["size"]/1024)."kb<br />";
move_uploaded_file($_FILES['f1']['tmp_name'],'photos/'.$id.'.png');
	
}
}
?>

<?
$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
extract($_POST);
if ($_REQUEST['product_id'] != null)
        {	extract($_POST);

            $productid = $_REQUEST['product_id'];
			echo   $productid;
	

		?>



<div class="container">
<div class="col-md-2"></div>
<div class="col-md-10">
<form method="post" enctype="multipart/form-data">
<table class="table" align="center">
<br /><br />
<tr>
<td align="center">

<img width="150px" class="img img-thumbnail" src="photos/b.png" />
<?
}?>
</td></tr>
    	<tr>
        <td>*Select Image</td>
        <td>
        	<input type="file" name="f1" />
        </td>
    </tr>
    
    <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_upload" value="Upload" class="btn btn-group-lg btn-info"  size="20%"/> 
        </td>
    </tr>
</table>
</form>
</div></div>