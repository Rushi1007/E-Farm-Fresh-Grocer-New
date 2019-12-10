<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<link href="./css/style.css" rel="stylesheet" />

<html>
<head>
          </head>
      <body>



<?php
$txt_email=null;
$con=mysqli_connect('localhost','root','','dbshopping')or die(mysqli_connect_error());
if(isset($_SESSION['user_id']))
{
$q=mysqli_query($con,"select * from tbluser where user_id=".$_SESSION['user_id']);
	
while($r = mysqli_fetch_assoc($q))
		  {
			extract($r);
?>

<table class="table">
<form method="post">
<div class="container">
<div class="row">
	<h3 >Billing &amp; Shipping</h3>
    <tr>
   		<td>First Name <span class="required">*</span></td>
		<td width="40%" align="center">
    		<input type="text" name="$txt_first_name" placeholder="First Name"  value="<?=$user_name?>" class="form-control"/>				
		</td>
    </tr>
    <tr>
   		<td>Last Name <span class="required">*</span></td>
		<td width="40%" align="center">
    		<input type="text" name="$txt_last_name" placeholder="Last Name"  value="<?=$user_lname?>" class="form-control"/>				
		</td>
    </tr>
     <tr>
   		<td>Email <span class="required">*</span></td>
		<td>
    		<input type="text" name="$txt_email" placeholder="you@gmail.com"  value="<?=$user_email?>" class="form-control"/>				
		</td>
    </tr>
     <tr>
   		<td>Address <span class="required">*</span></td>
		<td>
    		<input type="text" name="$txt_address" placeholder="Address" value="<?=$user_address?>" class="form-control"/>				
		</td>
    </tr>
     <tr>
   		<td>City <span class="required">*</span></td>
		<td>
    		<input type="text" name="$txt_city" placeholder="City" value="<?=$user_city?>" class="form-control"/>				
		</td>
    </tr>
    <tr>
   		<td>Pincode <span class="required">*</span></td>
		<td>
    		<input type="text" name="$txt_pincode" placeholder="Pincode"  value="<?=$user_pincode?>" class="form-control"/>				
		</td>
    </tr>
    <tr>
   		<td>Mobile <span class="required">*</span></td>
		<td>
    		<input type="text" name="$txt_mobile" placeholder="mobile"  value="<?=$user_mobile?>" class="form-control"/>				
		</td>
    </tr>
     <!--<tr>
   		<td>Notes <span class="required">*</span></td>
		<td>
    		<input type="text" name="$txt_notes" placeholder="Add Your Notes" class="form-control" />				
		</td>
    </tr>-->
    <?php
		  }
		  }
		  else
		  {
		  
		?>
		<b>Login Please</b>
		<?php
		}
		?>
    <tr>
		<td>
		<div class="pull-right">
    	<a href="index.php?folder=_order" >Order</a>
        </div>				
		</td>
    </tr>
      </table>

    
</body>
</html>


