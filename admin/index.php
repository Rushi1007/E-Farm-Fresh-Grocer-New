<?php 
	include '../include/config.php'; 
	$folder='_home';
	if(isset($_GET['folder']))
		$folder = $_GET['folder'];
?>

<html>
	<head>
    	
        <?php include '../include/_ares.php'; ?>
       
    </head>
    <body>
      	    <?php include $folder.'/index.php'; ?>
            
    
    	<?php
		
		 include '../include/_menu.php'; 
         ?>
        
        </body>
        </html>