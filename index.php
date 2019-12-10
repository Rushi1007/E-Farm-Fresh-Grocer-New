<?php 
	include 'include/config.php'; 
	$folder='_index';
	if(isset($_GET['folder']))
		$folder = $_GET['folder'];
?>

<html>
	<head>
    	
        <?php include 'include/_res.php'; ?>
       <!--<link rel="stylesheet" href="colorbox/colorbox.css" />
		//<script src="colorbox/jquery.min.js"></script>
		//<script src="colorbox/jquery.colorbox-min.js"></script>-->
		
    <title></title></head>
    <body>
    	
    	<div class="container">
        	<div class="header">
			
            	<h1><?=__site_title?></h1>
				
				

            </div>
			<?php include '_menu/index.php'; ?>
            <div class="wrapper">
            <div class="row">
            <div class="col-md-3">
            <div class="panel panel-success" >
            <div class="panel-heading">
            <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Members</h3>
		
             </div>
			 
             <div class="panel-body">
			 	
             <?php
             if(isset($_SESSION['user_id']))
			   {
			  ?>
              <center>
              Welcome <b><?=$_SESSION['user_name']?></b>,<br /><br />
              </center>
              <br />
             <a href="index.php?folder=_logout" title="Click here to Logout from your account" class="btn btn-sm btn-danger">Logout</a>
                            
             <a href="_updateprofile/index.php?user_id=<?=$_SESSION['user_id']?>" title="Click here to update profile" class="iframe"><input type="submit" name="btn_update" value="Update Profile" class="btn btn-primary"/></a>
                  <?php
				   
				   }
				   
				   else
				   {
				   ?> 
  New User <a href="index.php?folder=_createaccount" title="Click here to create your account" class="btn btn-sm btn-success">Create Account</a>
                        <br /><br />
Already Member <a href="index.php?folder=_login" title="Login Here" class="btn btn-sm btn-primary">Login Now</a>
                     <?php
						}
					  ?>
                    </div>
                    </div>
                    
                    <!-- End of Panel -->

<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="thumbnail">
<img width="130px" height="130px" class="img img-thumbnail" src="r4.jpg">
      <div class="caption">

        <div class="list-group">

       
          <a href="#" class="list-group-item">
          <div class="text">
   <h2><b> SERVICE IS AVAILABLE AT:</b></h2>
</div>
<div class="text1">
<h3>Service Available In The Following Areas :</h3>
</div>
<p><marquee direction="up"> 
College Road , Gangapur road ,
       Uttam nagar.


N-52-S-F-4-15/6 old nashik09,
flat no 16 suyog apartment nashik03,
all over maharastra our services  started 
now nashik,Maharastra .


   
   
                             </marquee></p>


          
          </a>
        <?php /*?>  <a href="album" class="list-group-item"> Products</a>
          
          
          <a href="#" class="list-group-item">Stock Details</a>
          <a href="#" class="list-group-item"></a>
          <a href="#" class="list-group-item"></a>
          <a href="#" class="list-group-item"></a>

<?php */?>

        </div>
      </div>
    </div>
  </div>
</div>
 </div>
                    <!-- End of Left SideBar -->
                    <div class="col-md-9" >
                    <div class="content">
                    	<?php include $folder.'/index.php'; ?>
                     </div>
                    </div>
                    <!-- End of Content -->
         
      </div>
        </br></br>
    </body>
     <div class="footer" style="background-color:#91ff68">
           <?php include 'include/_footer.php';?>
           <ul><h4 align="right">
      <a href="https://www.facebook.com/"><img src="bckimg/facebook1.png"/></a>&nbsp;&nbsp;
      <a href="https://www.twitter.com/"><img src="bckimg/twitter1.png"/></a>&nbsp;&nbsp;
      <a href="https://www.googleplus.com/"><img src="bckimg/googleplus-circle-color.png"/></a>&nbsp;&nbsp;
     </h4> </ul>
                 <h5 align="right"><b>All rights &copy reserved by  E-FARM</b></h5>
	 
      </div>
</html>
