<?php
$m->pageHeader('Login Now','Login Page - '.__site_title);
$cmb_city=null;$txt_email=null;$rdo_gender=1;
if(isset($_POST['btn_login']))
{
	extract($_POST);
	$query = mysqli_query($m->con,"select * from tbluser where user_email='$txt_email'
					and user_password='$txt_password'");
	if(mysqli_num_rows($query)==1)
	{
		$result = mysqli_fetch_array($query);
		if($result['user_email']==$txt_email && $result['user_password']==$txt_password)
		{
			$m->showInfo('','Login Successfully..');
			$_SESSION['user_id']=$result['user_id'];
			$_SESSION['user_email']=$result['user_email'];
			$_SESSION['user_name']=$result['user_name'];
			$_SESSION['user_mobile']=$result['user_mobile'];
			header('location: index.php?folder=_productdetails');
		}else
		{
			$m->showError('Error','Invalid UserName or Password..');
		}
	}else
	{
		$m->showError('Error','Invalid UserName or Password..');
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
<fieldset>
<form method="post">
<table class="table">
    <tr>
    	<td>*Email</td>
        <td>
        	<input type="text" name="txt_email" class="form-control"  placeholder="rohipatil123@gmail.com"value="<?=$txt_email?>" />
        </td>
    </tr>
    <tr>
    	<td>*Password</td>
        <td>
        	<input type="password" name="txt_password"  placeholder="********"class="form-control"  />
        </td>
    </tr>
    
    <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_login" value="Login Now" class="btn btn-lg btn-success" /> 
        </td>
    </tr>
</table>
</form></fieldset>