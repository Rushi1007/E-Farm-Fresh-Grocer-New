<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>



<?php
include '../include/config.php';
$con=mysqli_connect('localhost','root','','dbshopping')or die(mysqli_connect_error());
extract($_POST);
$q=mysqli_query($con,"select * from tblproduct where product_id=".$_REQUEST['product_id']);
if(isset($_SESSION['user_id'])!=null)
{
	extract($_POST);
  $qr=mysqli_query($con,"select * from tbluser where user_id=".$_SESSION['user_id']);
	while($r = mysqli_fetch_assoc($qr))
		  {
			extract($r);
			$user=$user_id;
			$username=$user_name;
		  }

?>



<div id="productgrid">
<table class="table">
<tbody>
<tr>
    <td align="left" colspan="6"></td>
</tr>
<tr class="tableheader" bgcolor="#CCCCCC">
	<td><b>Product Image</b></td>
    <td><b>Product Type</b></td>
    <td><b>Product Name</b></td>
    <td><b>Product Rate</b></td>
	<td><b>Product Quantity</b></td>
    </tr>
    <tr></tr> 
          
         <?php
		 
		while($r = mysqli_fetch_assoc($q))
		  {
			extract($r);
			$type=$product_type;
            $name=$product_name;
            $rate=$product_rate;
			$qty=$product_qty
		

		?>
        <br /> 
       <tr>
      <td><img  width="200px" class="img img-thumbnail" src="../admin/_uploadproduct/photos/<?=$product_id?>.png" >
                            </a>
            <td align="left"><?=$product_type?></td>
            <td align="left"><?=$product_name?></td>
            <td align="center"><?=$product_rate?></td>
            <td align="center"><?=$product_qty?></td>
     <?php
$qd=mysqli_query($con,"insert into tblcart(prod_name,prod_type,prod_qty,prod_rate,user_id,user_name)values('$name','$type','$qty','$rate','$user','$username')");
  
  if($qd==1)
 {
$m->showInfo('','Product added into Cart');
 }
 else
 {
	 echo"Error";

 }
}
  
}
?>
<br /><br /><br /><br />
</tr>
</tbody>
</table>


</div>

</body>
</html>

