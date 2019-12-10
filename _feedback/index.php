<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="../bootstrap-3.2.0-dist/css/bootstrap-theme.min.css">
<script src="../bootstrap-3.2.0-dist/js/jquery-1.11.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="../bootstrap-3.2.0-dist/js/bootstrap.min.js"></script>
<link href="./css/style.css" rel="stylesheet" />
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
$txt_number=null;$txt_email=null;$txt_name=null;$txt_comments=null;
if(isset($_POST['btn_save']))
{
	extract($_POST);
	$data = array(  'feedback_name'=>$txt_name,
					'feedback_email'=>$txt_email,
					'feedback_comments'=>$txt_comments,
					'feedback_mobile'=>$txt_number);
	if($m->sql_array_insert('tblfeedback',$data))
	{
		$m->showInfo('Feedback Entered','Feedback Entered Successfully..');	
		//header('location: index.php?folder=_index');
	}
	else
	{
		
		$m->showError('Error',mysqli_error($m->con));	
	}
}
?>

<head>
<title> Feedback Form</title>
</head>
<form method="post">
<table class="table" align="center">
 <tr>
         <td>Full Name</td>
         <td>
        	<input type="text" name="txt_name"  class="form-control"  placeholder=" Full Name" required />
        </td>
 </tr>
 <tr>
         <td>Email</td>
         <td>
        	<input type="email" name="txt_email" class="form-control" placeholder="you@gmail.com" required />
        </td>
 </tr>
 <tr>
         <td>Contact Number</td>
         <td>
        	<input type="text" name="txt_number" pattern="^[0-9]{10}$" class="form-control" placeholder="Mobile Number" required />
        </td>
 </tr>

 <tr>
         <td>Comments</td>
         <td>
        	<input type="text" name="txt_comments"class="form-control" placeholder="Write comments" required />
        </td>
 </tr>
 <tr>
    	<td colspan="2" align="center">
        	<input type="submit" name="btn_save" value="Save Now" class="btn btn-lg btn-success" /> 
        </td>
    </tr>
 </table>
</html>
</form>