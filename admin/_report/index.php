<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>


<link href="../../css/style.css" rel="stylesheet" />
<br><br><br>
   <html>
  <div id="productgrid">
<table class="table">
<div class="container">
<div class="col-md-3">
</div>
<div class="col-md-9">

<tbody>
<div class="pull-right">
     
     <a  class="ajax" href="_searchreport/index.php" >
     <input type="submit"  name="name" value="Search" class="btn btn-lg btn-success"/></a>
     </div>

<tr>
    <td align="right" colspan="6"></td>
</tr>
<tr class="tableheader" bgcolor="#99CCCC">
	<td><b>Consumer Name</b></td>
    <td><b>Product Name</b></td>
    <td><b>Product Price</b></td>
    <td><b>Product Quantity</b></td>
     <td><b>SubTotal</b></td>
	 

    </tr>
        <tr>		
            </tr>           

<?php
$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
extract($_POST);
$total=0;
$q = mysqli_query($con,"select * from tblcart ");
while($r = mysqli_fetch_assoc($q))
		{
			extract($r);
			
			
			 $a=$prod_rate;
 			 $b=$prod_qty;
			 $mult=$a*$b;
			 $total = $total + $mult;
			 $subtotal=$total;
		?>
            <tr>
            <td align="center"><?=$user_name?></td>
            <td align="center"><?=$prod_name?></td>
            <td align="left"><?=$prod_rate?></td>
            <td align="left"><?=$prod_qty?></td>
             <td align="left"><?=$mult ;?></td>
			  
			  </tr>  
            
			 <?php
           
           
           
            
			
			}
			  
		?>
      
        <td  class="alert-info" ><b>Total =</b>&nbsp;&nbsp;&nbsp;&nbsp;
           <b><?=$subtotal; ?></b></td>
         
        </tbody>
</table>
</div>
</div>
</div>
</html>