<html>
<head>
 <link rel="stylesheet" href="validation/css/validationEngine.jquery.css" type="text/css"/>
	<link rel="stylesheet" href="validation/css/template.css" type="text/css"/>
	<script src="validation/js/jquery-1.8.2.min.js" type="text/javascript">
	</script>
	<script src="validation/js/languages/jquery.validationEngine-en.js" type="text/javascript" charset="utf-8">
	</script>
	<script src="validation/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8">
	</script>
	<script>
		jQuery(document).ready(function(){
			// binds form submission and fields to the validation engine
			jQuery("#myform").validationEngine();
		});

		/**
		*
		* @param {jqObject} the field where the validation applies
		* @param {Array[String]} validation rules for this field
		* @param {int} rule index
		* @param {Map} form options
		* @return an error string if validation failed
		*/
		function checkHELLO(field, rules, i, options){
			if (field.val() != "HELLO") {
				// this allows to use i18 for the error msgs
				return options.allrules.validate2fields.alertText;
			}
		}
	</script>
</head>

<?php
$m->pageHeader('Create Account');
$cmb_city=null;$txt_email=null;$rdo_gender=1;$txt_pincode=null;
$txt_address=null;$txt_name=null;$txt_last_name=null;$txt_mobile=null;
if(isset($_POST['btn_update']))
{
	extract($_POST);
	$data = array(  'user_email'=>$txt_email,
					'user_password'=>$txt_password,
					'user_name'=>$txt_name,
					'user_lname'=>$txt_last_name,
					'user_city'=>$cmb_city,
					'user_gender'=>$rdo_gender,
					'user_pincode'=>$txt_pincode,
					'user_address'=>$txt_address,
					'user_mobile'=>$txt_mobile
					);
	if($m->sql_array_insert('tbluser',$data))
	{
		$m->showInfo('','Account Created Successfully..');
		$_SESSION['user_id']=$result['user_id'];
			$_SESSION['user_email']=$result['user_email'];
			$_SESSION['user_name']=$result['user_name'];
			$_SESSION['user_lname']=$result['user_lname'];
			$_SESSION['user_city']=$result['user_city'];
			$_SESSION['user_gender']=$result['user_gender'];
			$_SESSION['user_pincode']=$result['user_pincode'];
			$_SESSION['user_address']=$result['user_address'];
			$_SESSION['user_mobile']=$result['user_mobile'];
			header('location: index.php?folder=_login');	
		
	}
	else
	{
		$m->showError('Error',mysqli_error($m->con));	
	}

}
?>
<style>
fieldset {
  margin: 50px;
  padding: 0 20px 20px;
  border: 3px solid #343a40;
  border-radius: 5px;
  box-shadow: 0 0 30px #343a40;
  padding-top: 20px;


legend {
  font-size: 4rem;
  padding: 1 3px;
  font-family: "Times New roman" ,Times ,Serif;
  
}
</style>
<center><fieldset  style="width:600px">
<form method="post" id ="myform">
<table class="table">
	<tr>
    	<th colspan="2">
        	Account Details
        </th>
    </tr>
    <tr>
    	<td>*Email</td>
        <td>
        	<input type="text" name="txt_email" class="validate[required,custom[email]]" class="form-control" placeholder="rushiahire1999@gmail.com" value="<?=$txt_email?>" />
        </td>
    </tr>
    <tr>
    	<td>*Password</td>
        <td>
		<input type="password" name="txt_password" class="validate[required[minSize[6],maxSize[15]]]" placeholder="password" class="form-control" />
        	
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
        	<input type="text" name="txt_name" class="validate[required]" value="<?=$txt_name?>" placeholder="First Name" class="form-control" />
        </td>
    </tr>
    <tr>
    	<td>*Last Name</td>
        <td>
        	<input type="text" name="txt_last_name" class="validate[required]" value="<?=$txt_last_name?>" placeholder="Last Name" class="form-control" />
        </td>
    </tr>
    <tr>
    	<td>*City</td>
        <td>
        	<select name="cmb_city" class="validate[required]" class="form-control" value="<?=$cmb_city?>">
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
        	<input type="text" name="txt_address" class="validate[required]" class="form-control" placeholder="Address" value="<?=$txt_address?>" />
        </td>
    </tr>
     <tr>
    	<td>*Pincode</td>
        <td>
        	<input type="text" name="txt_pincode" class="validate[required,custom[integer]" class="form-control" placeholder="Pincode" value="<?=$txt_pincode?>" />
        </td>
    </tr>
    <tr>
    	<td>Mobile</td>
        <td>
        	<input type="text" name="txt_mobile" class="validate[required,custom[integer,sSize[10]]]" class="form-control" placeholder="mobile"  value="<?=$txt_mobile?>"/>
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_update" value="Register Now" class="btn btn-lg btn-success" /> 
        </td>
    </tr>
</table>
</form>
</fieldset></center>