<?php
include ('config.php');
$txt_email=null;
if(isset($_POST['btn_login']))
{
	extract($_POST);
	$query = mysqli_query($m->con,"select * from tbladmin where admin_email='$txt_email'
			and admin_password='$txt_password'");
	if(mysqli_num_rows($query)==1)
	{
		$result = mysqli_fetch_assoc($query);
		if($result['admin_email']==$txt_email && $result['admin_password']==$txt_password)
		{
			$m->showInfo('','Login Successfully..');
			$_SESSION['admin_email']=$result['admin_email'];
			$_SESSION['admin_password']=$result['admin_password'];
			header('location: index.php?folder=_productmaster');	
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
<html>
<head>      
 </head>
 </hr>
 <body>
 <h1 align="center">Admin Login</h1>
 <hr />
 <br />
 <form method="post">
<table class="table" align="center">
    <tr>
    	<td>*Email</td>
        <td>
        	<input type="text" name="txt_email" class="form-control" value="<?=$txt_email?>" />
        </td>
    </tr>
    <tr>
    	<td>*Password</td>
        <td>
        	<input type="password" name="txt_password" class="form-control" />
        </td>
    </tr>
    
    <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_login" value="Login Now" class="btn btn-lg btn-success" /> 
        </td>
    </tr>
</table>
</form>
</body>
</html>