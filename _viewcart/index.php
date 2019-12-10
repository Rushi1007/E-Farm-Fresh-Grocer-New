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
       
		<link rel="stylesheet" href="colorbox/colorbox.css" />
		<script src="colorbox/jquery.min.js"></script>
		<script src="colorbox/jquery.colorbox-min.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox({width:"75%", height:"75%"});
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
		</script>
        
      </head>
      <body>

<?php

$con=mysqli_connect('localhost','root','','dbshopping')or die(mysqli_connect_error());
extract($_POST);
		   

if(isset($_SESSION['user_id']))
{
$q=mysqli_query($con,"select * from tblcart where user_id=".$_SESSION['user_id']);


?>
<html>
<div class="container">
<div class="col-md-8">

<div id="productgrid">
<table class="table">
<tbody>
 <td align="left" colspan="6"></td>
 <tr class="tableheader" >
    <td><b>Product Edit</b></td>
    <td><b>Product Delete</b></td>
    <td><b>Product Name</b></td>
    <td><b>Unit Price</b></td>
    <td><b>Product Quantity</b></td>
    <td><b>Price</b></td>
    </tr>
     <?php

		while($r = mysqli_fetch_assoc($q))
		  {
			extract($r);
			
			$a=$prod_rate;
			$b=$prod_qty;
			$mult=$a*$b;
        ?>
			
        <br /> 
       <tr>
       <td>
       <form method="post">
      <a href="_updateshop/index.php?prod_id=<?=$prod_id?>" class="iframe" > 

       <span class="glyphicon glyphicon-pencil">Edit
        </span></a>
</td>
       <td>
       <a href="_close/index.php?prod_id=<?=$prod_id?>" class="iframe" > 
       <span class="glyphicon glyphicon-remove-sign" ></span> Remove</a></td>
      
       
            <td align="left"><?=$prod_name?></td>
            <td align="center"><?=$prod_rate?></td>
            <td align="center"><?=$prod_qty?> </td>
              <td>
              <?=$mult; ?>
              </td>
             
              </tr>
  <?php
}
 

}

else
{
  echo"<b>Login Please</b>";
}
?>

</tbody>
</table>

<a href="index.php?folder=_productdetails"><span class="glyphicon glyphicon-circle-arrow-left">  ReturnToShop</span></a>
&nbsp;&nbsp;&nbsp;

&nbsp;&nbsp;&nbsp;

<div class="pull-right">
<a href="index.php?folder=_checkout">
 Proceed Checkout<span class="glyphicon glyphicon-circle-arrow-Right"></span></a>


</div>
</div>
</div>
<br /><br /><br />
</div>
</form>
           
   </body>
   <html> 
           
