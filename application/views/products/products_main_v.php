<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Home | <?php echo $site_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url?>/css/footer.css" title="Variant Multi" media="all" />
    <!-- Le styles -->
    <link href="<?php echo $base_url?>/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        /* padding-bottom: 40px; */
      }
    </style>
    <link href="<?php echo $base_url?>/css/bootstrap-responsive.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
    
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo $base_url; ?>/welcome/">Online Store</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="<?php echo $base_url; ?>/welcome/"><i class="icon-home icon-white"></i>&nbsp;Home</a></li>
              <li class="active"><a href="<?php echo $base_url; ?>/products/index/begin/"><i class="icon-eye-open icon-white"></i>&nbsp;Products</a></li>
            </ul>
			
				<a id="example" class="btn btn-info" rel="popover" data-placement="bottom"><i class="icon-shopping-cart icon-white"></i>&nbsp;<strong>Cart</strong><?php if (!$cart_total_items){echo ' (you have 0 items)';} elseif($cart_total_items == 1){echo ' (you have 1 items)';} else {echo ' (you have '.$cart_total_items.' items)';} ?></a>
            
            <ul class="nav pull-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i>&nbsp;Your Account <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="#"><i class="icon-signin"></i>&nbsp;<strong>Login</strong></a></li>
                      <li><a href="#"><i class="icon-cog"></i>&nbsp;<strong>Profile</strong></a></li>
                      <li><a href="<?php echo $base_url; ?>/cart/"><i class="icon-shopping-cart"></i>&nbsp;<strong>Cart</strong><em class="muted">&nbsp;(<?php echo($cart_total_items == 1)? $cart_total_items.' item': $cart_total_items.' items'; ?>)</em></a></li>
                  </ul>
                </li>
            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="page-header">
        <h1>Products</h1>
        
      </div>
          
      <div class="row">
        
        <div class="span2">
          <h2>Options</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
        </div>
        
        <div class="span10">
          <h2>Browse Products</h2>
          <div class="span10">

          <ul class="nav nav-tabs" id="my_tab">
            <li <?php if($ebook_set) echo 'class="active"'; ?>><a data-toggle="tab" href="#ebooks">IT-eBooks</a></li>
            <li <?php if($dvd_set) echo 'class="active"'; ?>><a data-toggle="tab" href="#dvds">Movies(DVD)</a></li>
          </ul>


        <div class="tab-content">  

          <div class="tab-pane <?php if($ebook_set) echo 'active'; ?>" id="ebooks">
            <h3>IT-eBooks</h3>
            <ul class="thumbnails">
		         <?php foreach ($ebooks as $ebook): ?> 	
				  <li class="span3">
				    <div class="thumbnail">
				      <img src="<?php echo $base_url; ?>/images/products_images/<?php echo $ebook['product_id'].'_thumb.jpg'; ?>" style="" alt="">
				      <div class="caption">
				        
				        <div id="<?php echo 'modal_'.$ebook['product_id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 id="myModalLabel"><?php echo $ebook['product_name']; ?></h3>
										</div>
											<div class="modal-body">
											<h4>Book Description</h4>
											<div class="product">
											<img src="<?php echo $base_url; ?>/images/products_images/<?php echo $ebook['product_id'].'_thumb.jpg'; ?>" height="180" width="160" />
											<p><?php echo $ebook['product_description']; ?></p>
											</div>
											<h4>eBook Details</h4>
											<ul>
												<li><strong>Language:</strong>&nbsp;<?php echo $ebook['product_language']; ?></li>	
												<li><strong>ISBN-10:</strong>&nbsp;<?php echo $ebook['product_isbn10']; ?></li>
												<li><strong>Price:</strong>&nbsp;<?php echo $ebook['product_price']; ?>&nbsp;&euro;</li>
											</ul>
										</div>
									<div class="modal-footer">
								 <a href="<?php echo $base_url; ?>/products/add_to_cart/<?php echo $ebook['product_id']; ?>/<?php echo $ebook['product_price']; ?>/<?php echo urlencode($ebook['product_name']); ?>/<?php echo $ebook['type_name']; ?>/" class="btn btn-primary">Add to cart</a>
								<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
							</div>
						</div>
				        
				        <p><a href="<?php echo $base_url; ?>/products/add_to_cart/<?php echo $ebook['product_id']; ?>/<?php echo $ebook['product_price']; ?>/<?php echo urlencode($ebook['product_name']); ?>/<?php echo $ebook['type_name']; ?>/" class="btn btn-primary">Add to cart</a> <a href="#<?php echo 'modal_'.$ebook['product_id']; ?>" role="button" class="btn" data-toggle="modal">View Details</a></p>
				      </div>
				    </div>
				  </li>
				 <?php endforeach; ?>
				</ul>
				    <div class="pagination pagination-centered">
					    <ul>
						    <li <?php echo ($ebook_page == 1)? 'class="disabled" ':''; ?>><a href="<?php echo $base_url; ?>/products/index/next/ebook/<?php echo ($ebook_page - 1); ?>/">Prev</a></li>
						    <?php 
						    for ($x = 1; $x <= $ebooks_num_pages; $x++)
						    {
						    	if($ebook_page == $x)
						    		echo '<li class="active"><a href="'.$base_url.'/products/index/next/ebook/'.$x.'/'.$dvd_page.'/">'.$x.'</a></li>';
						    	else
						    		echo '<li><a href="'.$base_url.'/products/index/next/ebook/'.$x.'/'.$dvd_page.'/">'.$x.'</a></li>';
						    }	
						    		
						   
						    ?>
						    <li <?php echo ($ebook_page == $ebooks_num_pages)? 'class="disabled" ':''; ?>><a href="<?php echo $base_url; ?>/products/index/next/ebook/<?php echo ($ebook_page + 1); ?>/">Next</a></li>
					    </ul>
				    </div>
				  
           </div>


          <div class="tab-pane  <?php if($dvd_set) echo 'active'; ?>" id="dvds">  
            <h3>Movies(DVD)</h3>
            <ul class="thumbnails">
		         <?php foreach ($dvds as $dvd): ?> 	
				  <li class="span3">
				    <div class="thumbnail">
				      <img src="<?php echo $base_url; ?>/images/products_images/<?php echo $dvd['product_id'].'_thumb.jpg'; ?>" style="" alt="">
				      <div class="caption">
				        
				        <div id="<?php echo 'modal_'.$dvd['product_id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
									<h3 id="myModalLabel"><?php echo $dvd['product_name']; ?></h3>
										</div>
											<div class="modal-body">
											<h4>DVD Description</h4>
											<div class="product">
											<img src="<?php echo $base_url; ?>/images/products_images/<?php echo $dvd['product_id'].'_thumb.jpg'; ?>" height="180" width="160" />
											<p><?php echo $dvd['product_description']; ?></p>
											</div>
											<h4>DVD Details</h4>
											<ul>
												<li><strong>Language:</strong>&nbsp;<?php echo $dvd['product_language']; ?></li>	
												<li><strong>ISBN-10:</strong>&nbsp;<?php echo $dvd['product_isbn10']; ?></li>
												<li><strong>Price:</strong>&nbsp;<?php echo $dvd['product_price']; ?>&nbsp;&euro;</li>
											</ul>
										</div>
									<div class="modal-footer">
								 <a href="<?php echo $base_url; ?>/products/add_to_cart/<?php echo $dvd['product_id']; ?>/<?php echo $dvd['product_price']; ?>/<?php echo urlencode($dvd['product_name']); ?>/<?php echo $dvd['type_name']; ?>/" class="btn btn-primary">Add to cart</a>
								<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
							</div>
						</div>
				        
				        <p><a href="<?php echo $base_url; ?>/products/add_to_cart/<?php echo $dvd['product_id']; ?>/<?php echo $dvd['product_price']; ?>/<?php echo urlencode($dvd['product_name']); ?>/<?php echo $dvd['type_name']; ?>/" class="btn btn-primary">Add to cart</a> 
				        <a href="#<?php echo 'modal_'.$dvd['product_id']; ?>" role="button" class="btn" data-toggle="modal">View details</a></p>
				      </div>
				    </div>
				  </li>
				 <?php endforeach; ?>
				</ul>
				    <div class="pagination pagination-centered">
					    <ul>
						    <li <?php echo ($dvd_page == 1)? 'class="disabled" ':''; ?>><a href="<?php echo $base_url; ?>/products/index/next/dvd/<?php echo ($dvd_page - 1); ?>/">Prev</a></li>
						    <?php 
						    for ($i = 1; $i <= $dvds_num_pages; $i++)
						    {
						    	if($dvd_page == $i)
						    		echo '<li class="active"><a href="'.$base_url.'/products/index/next/dvd/'.$ebook_page.'/'.$i.'/">'.$i.'</a></li>';
						    	else
						    		echo '<li><a href="'.$base_url.'/products/index/next/dvd/'.$ebook_page.'/'.$i.'/">'.$i.'</a></li>';
						    }	
						    		
						   
						    ?>
						    <li <?php echo ($dvd_page == $dvds_num_pages)? 'class="disabled" ':''; ?>><a href="<?php echo $base_url; ?>/products/index/next/dvd/<?php echo ($dvd_page + 1); ?>/">Next</a></li>
					    </ul>
				    </div>
            </div>

          
        </div>

        </div>   
      </div>
       
     </div>


</div> <!-- /container -->
    
    <footer>
      <div id="footer_SG">
		<div id="footersections_SG">
			<div class="half_SG">
				<h2>Useful Links</h2>
				<ul>
					<li><a href="http://www.arcada.fi" >Arcada.fi</a></li> 
					<li><a href="http://www.hs.fi/" >Helsingin Sanomat</a></li> 
					<li><a href="http://www.youtube.com/" >Youtube</a></li>
					<li><a href="http://www.wired.com/" >Wired</a></li>
					<li><a href="http://www.imdb.com/" >IMDB</a></li>
					<li><a href="https://www.paypal.com" >PayPal</a></li>
				</ul>
			</div>

			<div class="quarter_SG">
				<h2>Web Templates</h2>
				<p>If you want to learn more about HTML, CSS & web templates building go to <a href="http://andreasviklund.com/" >Andreasviklund.com</a></p>
				<p>You can also experiment on your own with freely available templates!</p>
			</div>

			<div class="lastquarter_SG">
				<h2>Programming</h2>
				<ul>
					<li><a href="http://www.php.net/">Php.net</a></li>
					<li><a href="http://jqueryui.com/">jQuery</a></li>
					<li><a href="http://www.apachefriends.org/en/index.html">Apache Friends</a></li>
					<li><a href="http://www.debian.org/">Debian</a></li>
					<li><a href="http://www.mysql.com/">MySQL</a></li>
					<li><a href="http://stackoverflow.com/">Stackoverflow</a></li>
					<li><a href="http://www.evoluted.net/thinktank/web-development/paypal-php-integration">PayPal Integration</a></li>
					
				</ul>	
			</div>     
			<div class="clear_SG">&nbsp;</div> 
		</div>
	</div> 

	<div id="credits_SG">
		<p>&copy;&nbsp;<?php echo $site_title ?>&nbsp;[sguessou 2013]</p>
	<br />
		<p>Powered by <img src="<?php echo $base_url ?>/css/images/codeigniter_logo2.png"></p>
	</div>  
</div>
</footer>

    <?php
    		$cart_data = '';
    		$item_num = 1;
    		foreach ($cart_content as $cart_item)
    		{
    			if ( $cart_item['attributes']['product_type'] == 'Dvd' ) 
    			{
    				$item_type = '<i class="icon-film"></i>';
    			} 
    			elseif ( $cart_item['attributes']['product_type'] == 'Book' )
    			{
    				$item_type = '<i class="icon-book"></i>';
    			}

    			$cart_data .= '#'.$item_num.'&nbsp;'.$item_type.'&nbsp<small class="text-info">'.$cart_item['attributes']['name'].'</small>,&nbsp;';
    			$cart_data .= '<small><em class="muted">Quantity:'.$cart_item['quantity'].'</em></small><br />';
    			$item_num++;
    		}
    		$cart_data .= '<a href="'.$base_url.'/cart/" class="btn btn-small btn" type="button">View Cart ('.$cart_total_items;

    		if ($cart_total_items == 1) 
    		{
    			$cart_data .= ' item)';
    		}
    		else
    		{
    			$cart_data .= ' items)';
    		}
   		//$cart_data .= '<button type="button" class="close" data-dismiss="alert">&times;</button>';
    		$cart_data = str_replace("'","\\'", $cart_data);
    ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $base_url?>/js/jquery-1.10.1.js"></script>
    <script src="<?php echo $base_url?>/js/bootstrap.min.js"></script>
    <script>  
		$(function() {  
	
			$("#example").popover({ html:true,
									title: '<h5>My Cart Content</h5>',
				 					content: '<?php echo $cart_data ?>'  });  
			
		}); 
		$(function() {  
			$('#cart_items').popover('show');
		});
	</script> 

  </body>
</html>
