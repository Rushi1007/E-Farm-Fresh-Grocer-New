<?php
$txt_name=null;


 if(isset($_GET['name']))
	{
		$name = trim($_GET['name']);
		
		$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
		$qry = 'select * from tblcart';
		if($name!='')
		{
			$qry = "select * from tblcart where user_name like '%$name%'";
		}
		$q = mysqli_query($con,$qry);
		echo mysqli_num_rows($q)." Records Found..";
		?>
   <html>
        
 <div id="productgrid">
<table class="table">
<tbody>
<tr>
    <td align="right" colspan="6"></td>
</tr>
<tr class="tableheader" bgcolor="#99CCCC">
	<td><b>Consumer Name</b></td>
    <td><b>Product Name</b></td>
    <td><b>Product Price</b></td>
	<td><b>Product Quantity</b></td>
	<td><b>Subtotal</b></td>
    </tr>
        <tr>		
            </tr>           
			<?php
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
        
			 </tr>
			 <?php
			}
			  
		?>
</tbody>
</table>
</div>
</html>

