<?php
include '../include/_ares.php';
?>
</br></br></br></br>
<html>
<head>
	<link rel="stylesheet" href="../colorbox/colorbox.css" />
		<script src="../colorbox/jquery.min.js"></script>
		<script src="../colorbox/jquery.colorbox-min.js"></script>
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
<div class="pull-right">
    <a  class="iframe" href="_addcategory/index.php">
     <input type="submit"  name="btn_save" value="Add New Category" class="btn btn-lg btn-info"/></a>
     
        <a  class="ajax" href="_searchcategory/index.php" >
     <input type="submit"  name="name" value="Search Category" class="btn btn-lg btn-success"/></a>
     </div>
   </br></br></br></br>   
        
 <?php
 $cmb_type=null;$txt_name=null;
 $con=mysqli_connect('localhost','root','','dbshopping')or die(mysqli_connect_error());
	 extract($_POST);
 $q = mysqli_query($con,"select * from tblcategory");
?>
<div id="productgrid">
<table class="table">
<tbody>
<tr>
    <td align="right" colspan="6"></td>
</tr>
<tr class="tableheader" bgcolor="#CCCCCC">
    <td><b>Category Type</b></td>
    <td><b>Category Name</b></td>
    <td><b>Options</b></td>
    
</tr>
        <tr>		
            </tr>           
            <?php
		while($r = mysqli_fetch_assoc($q))
		{
			extract($r);
			?>
			<tr>
            <td align="left"><?=$category_type?></td>
            <td align="left"><?=$category_name?></td>
           
           <td><a  class="iframe" href="_updatecategory/index.php?category_id=<?=$category_id?>" >Edit</a>
           &nbsp;&nbsp;&nbsp;&nbsp;
            <a  class="iframe" href="_deletecategory/index.php?category_id=<?=$category_id?>" >Delete</a></td>
            </tr>     
        <?php
}
		
		?>
       
</tbody>
</table>
</div>
</html>

