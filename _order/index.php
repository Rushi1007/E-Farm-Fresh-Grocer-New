<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>

<link href="./css/style.css" rel="stylesheet" />

<?php
$cmb_shipping=null;$rdo_gender=null;
$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
if(isset($_SESSION['user_id']))
{
$q=mysqli_query($con,"select * from tblcart where user_id=".$_SESSION['user_id']);
?>
<html>
<head>
</head>
<body>
<table class="table">
<form method="post">
<div class="container">
<div class="row">
<h2><b><i>Thanks For Visiting E-Farm Fresh Grocer</i></b></h2>
<h3><b>Your Order</b></h3>


  <thead>
    <tr>
    	<th>Product</th>
        <th>Quantity</th>
        <th>Totals</th>
     </tr>
     </thead>
     <?php
	 $rate=null;
	 	   $total=0;
	 while($r = mysqli_fetch_assoc($q))
		  {
			 extract($r);
			
			 $a=$prod_rate;
 			 $b=$prod_qty;
			 $mult=$a*$b;
			 $total = $total + $mult;
			 $subtotal=$total;
		  ?>
        <tbody>
      <tr>
        <td><?=$prod_name?></td>
        <td><?=$prod_qty?></td>
        <td><?=$mult; ?></td>   
    </tr>
	
	<?php
	if($rdo_gender==1)
	{
		$grandtotal=$subtotal;
	}
	else
	{
		$grandtotal=$subtotal+10;
		
	}
    }
	
        ?>
			
   
            <tr>
                <td colspan="2">Shipping<br><td>
               <?php
				$gender = array('Shipping'=>0,  'No Shipping'=>1);
				foreach($gender as $k=>$v)
				{
					if($rdo_gender==$v)
						echo "<input checked type='radio' value='$v' name='rdo_gender'>$k ";
					else
						echo "<input type='radio' value='$v' name='rdo_gender'>$k ";
				}
	
			?>
			

        </td>
        </tr>
			
    <tr>
			   
				<td colspan="2"><b>Subtotal</b></td>
                <td><b><?=$subtotal; ?></b></td>
			    
            </tr>
            <tr>
                <td colspan="2">Tax (0%):</td>
                <td>0.00</td>
            </tr>
            <tr>
            <td colspan="2"><strong>Grand Total</strong></td>
            
            
            
            <td><b><?=$grandtotal; ?></b></td>
    
            </tr>
       
    </tbody>

	<?php
	}
	else
	{
	?>
	<b>Login Please</b>
	<?php
	}
	?>
 
</div>
</div>
</form>
</table>
</body>
</html>