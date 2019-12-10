
<?php
	$menus = array( 'index.php?folder=_productmaster'=>'Products',
					'index.php?folder=_categorymaster'=>'Category',
					'index.php?folder=_report'=>'Report',

					);
					
					$file = str_replace(__site_url,null,$m->curPageURL());

?>

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=""></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
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
          
        </div><!--/.nav-collapse -->
      </div>
    </div>