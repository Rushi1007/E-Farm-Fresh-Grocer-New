

<?php
	$menus = array('index.php?folder=_index'=>'',
	               'index.php?folder=_home'=>'',
                    'index.php?folder=_productdetails'=>'',
					'index.php?folder=_viewcart'=>'',
					'index.php?folder=_checkout'=>'',
					'index.php?folder=_order'=>'',
					'index.php?folder=_feedback'=>'',
					'index.php?folder=_contactus'=>''
					);
					
					$file = str_replace(__site_url,null,$m->curPageURL());

?>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
<!--<--inks, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li>
<a class="navbar-brand" href="_slider/index.php" >

<img src="http://localhost/demo21/_menu/image/f1.jpg"  width="30px" alt=" Bhajipala" title="NASHIK Bhajipala" class="roll">
      <b style="color:#2a422c;"> E-FARM</b></a>
	 <a Onclick="E-FARM" href="http://localhost/demo21/admin" ></a> </li>

<li class="#" ><a href="http://localhost/demo21/index.php?folder=_home"><span class="glyphicon glyphicon-home"> Home</span></a>

</li>
<li class="">
<a class="menuitem" href="http://localhost/demo21/index.php?folder=_productdetails"><span class="glyphicon glyphicon-th-list"> Products</span></a>
</li>
<li class="">
<a class="menuitem" href="http://localhost/demo21/index.php?folder=_viewcart"><span class="glyphicon glyphicon-shopping-cart"> Cart</span></a>
</li>
<li class="">
<a class="menuitem" href="http://localhost/demo21/index.php?folder=_checkout"><span class="glyphicon glyphicon-ok"> CheckOut</span></a>
</li>
<li class="">
<a class="menuitem" href="http://localhost/demo21/index.php?folder=_order"><span class="glyphicon glyphicon-th"> Order</span></a>
</li>
</li>
<li class="">
<a class="menuitem" href="http://localhost/demo21/index.php?folder=_feedback"><span class="glyphicon glyphicon-thumbs-up"> Feedback</span></a>
</li>
</li>
<li class="">
<a class="menuitem" href="http://localhost/demo21/index.php?folder=_contactus"><span class="glyphicon glyphicon-earphone"> Contact Us</span></a>
</li>
         <?php
          	foreach($menus as $k=>$v)
			{
				if($k==$file)
				{
					?>
                    <li class="active"><a href="<?=$k?>"><?=$v?></a></li>

                    <?php
				}
				else
				{
				?>
                	<li><a href="<?=$k?>"><?=$v?></a></li>
                <?php
				}
			}
			
		  ?>
          
        </ul>
 
		
       
      
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

      