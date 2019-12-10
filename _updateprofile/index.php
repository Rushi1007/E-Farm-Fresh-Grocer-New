<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<link href="../css/style.css" rel="stylesheet" />
<?php
include '../include/config.php';
//$m->pageHeader('Update Profile','Update your profile on '.__site_title);
$cmb_city=null;$txt_email=null;$rdo_gender=1;$txt_pincode=null;
$txt_address=null;$txt_name=null;$txt_last_name=null;$txt_mobile=null;
$con = mysqli_connect('localhost','root','','dbshopping') or die(mysqli_connect_error());
extract($_POST);
if ($_SESSION['user_id'] != null)
        {	extract($_POST);

            $userid = $_SESSION['user_id'];
			$qr = mysqli_query($con,"select * from tbluser where user_id=".$userid);
		
			if($r=mysqli_fetch_assoc($qr))
			{        	
			     extract($r);
				 $txt_email=$r['user_email'];
				 $txt_name=$r['user_name'];
				 $txt_last_name=$r['user_lname'];
				 $cmb_city=$r['user_city'];
				 $rdo_gender=$r['user_gender'];
				 $txt_pincode=$r['user_pincode'];
				 $txt_address=$r['user_address'];
				 $txt_mobile=$r['user_mobile'];
				 
		   }


		}

if(isset($_POST['btn_register']))
{
	extract($_POST);
	if ($_SESSION['user_id'] != null)
        {
            $userid = $_SESSION['user_id'];
	$q=mysqli_query($con,"update tbluser set user_email='$txt_email',user_name='$txt_name',user_lname='$txt_last_name',user_city='$cmb_city',user_gender='$rdo_gender', user_pincode='$user_pincode',user_address='$txt_address',user_mobile='$txt_mobile' where user_id=".$userid);
		}
	if($q==1)
	{
		echo "Record update successfully";
		
	}
	else
	{
		echo "Error: ".mysqli_error($con);
	}
}
?>
<div class="container">
<div class="col-md-2">
</div>
<div class="col-md-8">
<form method="post">

<table class="table">
	<tr>
    	<th colspan="2">
        	Account Details
        </th>
    </tr>
    <tr>
    	<td>*Email</td>
        <td>
        	<input type="text" name="txt_email" class="form-control" placeholder="you@gmail.com" value="<?=$txt_email?>" />
        </td>
    </tr>
     <tr>
    	<th colspan="2">
        	Personal Details
        </th>
    </tr>
    <tr>
    	<td>* First Name</td>
        <td>
        	<input type="text" name="txt_name" value="<?=$txt_name?>" placeholder="First Name" class="form-control" />
        </td>
    </tr>
    <tr>
    	<td>*Last Name</td>
        <td>
        	<input type="text" name="txt_last_name" value="<?=$txt_last_name?>" placeholder="Last Name" class="form-control" />
        </td>
    </tr>
    <tr>
    	<td>*City</td>
        <td>
        	<select name="cmb_city" class="form-control" value="<?=$cmb_city?>">
            	<option value="">--Select City--</option>
            	<?php
                	$city = array('Nashik','Pune','Mumbai','Niphad','Delhi');
					foreach($city as $v)
					{
						if($cmb_city==$v)
							echo "<option selected>$v</option>";
						else
							echo "<option>$v</option>";
					}
				?>
            </select>
        	
        </td>
    </tr>
    <tr>
    	<td>*Gender</td>
        <td>
        	<?php
				$gender = array('Male'=>1,'Female'=>0);
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
    	<td>*Address</td>
        <td>
        	<input type="text" name="txt_address" class="form-control" placeholder="Address" value="<?=$txt_address?>" />
        </td>
    </tr>
     <tr>
    	<td>*Pincode</td>
        <td>
        	<input type="text" name="txt_pincode" class="form-control" placeholder="Pincode" value="<?=$txt_pincode?>" />
        </td>
    </tr>
    <tr>
    	<td>Mobile</td>
        <td>
        	<input type="text" name="txt_mobile" class="form-control" placeholder="mobile"  value="<?=$txt_mobile?>"/>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_register" value="Register Now" class="btn btn-lg btn-success" /> 
        </td>
    </tr>
</table>
</form>
</div>
</div>