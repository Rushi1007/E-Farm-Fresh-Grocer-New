<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>


<link href="../../css/style.css" rel="stylesheet" />

<?php

$txt_name=null;$cmb_type=null;$txt_rate=null;$txt_quantity=null;

$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
extract($_POST);
if ($_REQUEST['product_id'] != null)
        {	extract($_POST);

            $productid = $_REQUEST['product_id'];
	
$qr = mysqli_query($con,"select * from tblproduct  where product_id=".$productid);
		
			if($r=mysqli_fetch_assoc($qr))
			{        	
			     extract($r);
                 $cmb_type=$r['product_type'];
				 $txt_name=$r['product_name'];
				 $txt_rate=$r['product_rate'];
				 $cmb_unit=$r['product_unit'];
				 $txt_quantity=$r['product_qty'];

		    }


		}

if(isset($_POST['btn_save']))
{
	extract($_POST);
	if ($_REQUEST['product_id'] != null)
        {
           $productid = $_REQUEST['product_id'];
		   $q=mysqli_query($con,"update tblproduct set product_type='$cmb_type',product_name='$txt_name',product_rate='$txt_rate',product_unit='$cmb_unit',product_qty='$txt_quantity' 
		   where product_id=".$productid);
		}
	if($q==1)
	{
		echo "Recod update successfully";
		header('location: index.php?folder=_productmaster');
	}
	else
	{
		echo "Error: ".mysqli_error($con);
	}
}
?>

<html>
<form method="post">
<div class="container">
<div class="col-md-2">
</div>
<div class="col-md-10">
<body>
<table  align="center"  width="40%" class="table">
	<tr bgcolor="#0066CC" style="color:white;" align="center">

	<tr>
    
    
    	<td>*Category Type</td>
        	<td width="40%"><select name="cmb_type" class="form-control" >
            	<option value="">--Select type--</option>
            	<?php
                	$type = array('Leafy Vegetable','Fruit Vegetable');
					foreach($type as $v)
					{
						if($cmb_type==$v)
							echo "<option selected>$v</option>";
						else
							echo "<option>$v</option>";
					}
				?>
            </select>
        	
        </td>
    </tr>
    <tr>
    <td>*Product Name</td>
       <td>
        	<input type="text" name="txt_name" class="form-control"  value="<?=$txt_name?>"/>
         </td>
    </tr>
      <tr>
    	<td>*Product Rate</td>
        <td>
        	<input type="text" name="txt_rate" class="form-control" value="<?=$txt_rate?>"/>
            </td>
            </tr>
            <tr>
           <td>*Product Unit</td>
            <td>
            <select name="cmb_unit" class="form-control">
            	<option value="">--Select Unit--</option>
            	<?php
                	$unit = array('Kg','Unit','Dozzen');
					foreach($unit as $v)
					{
						if($cmb_unit==$v)
							echo "<option selected>$v</option>";
						else
							echo "<option>$v</option>";
					}
				?>
                </select>
        </td>
    	</tr>
       

    <tr>
        </br>

    	<td>*Product Quantity</td>
        <td>
        	<input type="text" name="txt_quantity" class="form-control" value="<?=$txt_quantity?>"/>
            
      </td>
    </tr>
      
    </br>    
    	 <tr>
    	<td  colspan="2" align="center">
        	<input type="submit" name="btn_save" value="Update Now" 
            class="btn btn-group-lg btn-primary" />
            &nbsp;&nbsp;
     
        	
        </td>
       
    </tr>
    
      
   </form>
    
</table>

</div>
<div class="col-md-3">
</div>
</html>