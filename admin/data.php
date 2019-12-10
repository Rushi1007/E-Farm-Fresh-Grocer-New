<?php
$txt_name=null;$cmb_type=null;


 if(isset($_GET['name']))
	{
		$name = trim($_GET['name']);
		
		$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
		$qry = 'select * from tblcategory';
		if($name!='')
		{
			$qry = "select * from tblcategory where category_name like '%$name%'";
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
	<td><b>Category Id</b></td>
    <td><b>Category Type</b></td>
    <td><b>Category Name</b></td>
    </tr>
        <tr>		
            </tr>           
            <?php
		while($r = mysqli_fetch_assoc($q))
		{
			extract($r);
			?>
			<tr>
			<td align="center"><?=$category_id?></td>
            <td align="left"><?=$category_type?></td>
            <td align="left"><?=$category_name?></td>
           
           
            </tr>     
        <?php

		}
	}
		?>
       
</tbody>
</table>
</div>
</html>

