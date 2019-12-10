
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
 <div class="row">
 <?php

$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_error($con));
$q = mysqli_query($con,'select * from tblproduct');

	while($r = mysqli_fetch_array($q))
	{
		extract($r);
		?>
  
 <div class="col-sm-6 col-md-4">
<div class="thumbnail">

<li align="center"><h4><?=$product_name?></h4></li>
<img width="160px"  height="160px" class="img img-thumbnail" src="admin/_uploadproduct/photos/<?=$product_id?>.png" >
<div class="caption"  align="right">

 <li  style="font-size:large" ><i>Rs: <?=$product_rate?> per <?=$product_unit?></i></li>
     
	 <a href="_addtocart/index.php?product_id=<?=$product_id?>" class="iframe" >
      <input type="submit"  name="btn_cart" value="Add to Cart" align="right" class="btn  btn-sm btn-warning "  /></a>
 
</div>
</div>
</div>
<?php
	}
	?>
    
    </div>
    </body>
    </html>