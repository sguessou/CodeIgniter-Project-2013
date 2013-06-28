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
              <li><a href="<?php echo $base_url; ?>/products/index/begin/"><i class="icon-eye-open icon-white"></i>&nbsp;Products</a></li>
            </ul>

             <a id="example" class="btn btn-info" rel="popover" data-placement="bottom"><i class="icon-shopping-cart icon-white"></i>&nbsp;<strong>Cart</strong><?php echo($cart_total_items == 1)? ' (You have '.$cart_total_items.' item)': ' (You have '.$cart_total_items.' items)'; ?></a>
            
            <?php if ( $logged ) :?>
            <button class="btn btn-primary disabled" type="button"><i class="icon-info-sign"></i>&nbsp;You're currently logged in</button>
            <?php endif ?> 

             <ul class="nav pull-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i>&nbsp;Your Account <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <?php if ( !$logged ) :?>
                      <li><a href="<?php echo $base_url; ?>/users/"><i class="icon-signin"></i>&nbsp;<strong>Login</strong></a></li>
                    <?php elseif ( $logged ) :?> 
                      <li><a href="<?php echo $base_url; ?>/users/logout/"><i class="icon-signout"></i>&nbsp;<strong>Logout</strong></a></li>
                    <?php endif ?>
                      <li><a href="<?php echo $base_url; ?>/users/"><i class="icon-cog"></i>&nbsp;<strong>Profile</strong></a></li>
                      <li><a href="<?php echo $base_url; ?>/cart/"><i class="icon-shopping-cart"></i>&nbsp;<strong>Cart</strong><em class="muted">&nbsp;(<?php echo($cart_total_items == 1)? $cart_total_items.' item': $cart_total_items.' items'; ?>)</em></a></li>
                  </ul>
                </li>
            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    
    

	<div class="page-header">
        <h1>My Account <small>{ view open orders }</small></h1>  
    </div>

    <div class="row">
    
    <div class="span3"> 
    
    <div class="well">
    	<ul class="nav nav-list">
		    <li class="nav-header"><h5><i class="icon-user icon-2x"></i>&nbsp;My Account</h5></li>
		    <li class="divider"></li>
		    <li class="active"><a href="<?php echo $base_url; ?>/users/view_open_orders/">View Open Orders</a></li>
		    <li><a href="#">Change Account Settings</a></li>
		    <li class="divider"></li>
		    <li><a href="<?php echo $base_url; ?>/users/logout/"><i class="icon-signout"></i>&nbsp;Logout</a></li>
		</ul>
		</div>
    </div>
    
    
    
    <div class="span6">  
   
   <?php if (!$cart_total_items) : ?>
          <div class="alert alert-warning">
            <p>You Have No Open Orders To View!</p>
            </div>
      <?php else : ?>  

           <table class="table table-hover">
            <caption></caption>
              <thead>
                <tr>
                  <th><h5>Items to buy now</h5></th>
                  <th></th>
                  <th><h5>Price</h5></th>
                  <th><h5>Quantity</h5></th>
                </tr>
              </thead>

              <tbody>
                
                  
                  <?php
                    foreach($cart_content as $cart_data)
                    {
                      echo '<tr><td><a href="#modal_'.$cart_data['product_id'].'" data-toggle="modal"><img src="'.$base_url.'/images/products_images/'.$cart_data['product_id'].'_thumb.jpg" width="70" height="100"/></a></td>';
                      echo '<td><a href="#modal_'.$cart_data['product_id'].'" data-toggle="modal">'.$cart_data['attributes']['name'].'</a>
                       <h6 class="text-success">In Stock</h6>
                       <a href="#"><i class="icon-trash"></i></a>&nbsp;<a href="#"><i class="icon-plus"></i></a>
                       &nbsp;<a href="#"><i class="icon-minus"></i></a></td>';
                      echo '<td>'.$cart_data['attributes']['price'].'</td>';
                      echo '<td>'.$cart_data['quantity'].'</td></tr>'; 
                    ?> 
                      <div id="<?php echo 'modal_'.$cart_data['product_id']; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel"><?php echo $cart_data['attributes']['name']; ?></h3>
                              </div>
                                <div class="modal-body">
                                <h4>DVD Description</h4>
                                <div class="product">
                                <img src="<?php echo $base_url; ?>/images/products_images/<?php echo $cart_data['product_id'].'_thumb.jpg'; ?>" height="180" width="160" />
                                <p><?php echo $cart_data['attributes']['description']; ?></p>
                                </div>
                                <h4>DVD Details</h4>
                                <ul>
                                 <li><strong>Language:</strong>&nbsp;<?php echo $cart_data['attributes']['language']; ?></li>  
                                  <li><strong>ISBN-10:</strong>&nbsp;<?php echo $cart_data['attributes']['isbn10']; ?></li>
                                  <li><strong>Price:</strong>&nbsp;<?php echo $cart_data['attributes']['price']; ?>&nbsp;&euro;</li>
                                </ul>
                              </div>
                            <div class="modal-footer">
                           
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        </div>
                      </div> 
                  <?php 

                    }
                  
                  ?>
                  
              
              </tbody>
            </table> 

            <a class="btn btn-primary" href="<?php echo $base_url; ?>/cart/empty_cart/">
              <i class="icon-money icon-large"></i>&nbsp;Proceed To Checkout</a>

            <a class="btn btn-danger" href="<?php echo $base_url; ?>/cart/empty_cart/">
              <i class="icon-trash icon-large"></i>&nbsp;Remove Open Orders</a>
              <hr>
          <?php endif ?>    


    </div>  
     

      
    </div> <!-- /row  -->   
     
      <br />
      <br />

      
       
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
          $cart_data .= ' item)</a>&nbsp;&nbsp;&nbsp;';
        }
        else
        {
          $cart_data .= ' items)</a>&nbsp;&nbsp;&nbsp;';
        }

        if ( $cart_total_items > 0 ) 
        {
          $cart_data .= '<a class="btn btn-small btn-danger" href="'.$base_url.'/cart/empty_cart/"><i class="icon-trash icon-large"></i>&nbsp;Empty Cart</a>';
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
  </script> 

  </body>
  </html>



<!--****************************************************************************************-->	
	
	
	
<?php
	
	
/* End of file users_open_orders_v.php */
/* Location: ./application/views/users/users_open_orders_v.php */
