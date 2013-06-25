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
              <li class="active"><a href="<?php echo $base_url; ?>/welcome/"><i class="icon-home icon-white"></i>&nbsp;Home</a></li>
              <li><a href="<?php echo $base_url; ?>/products/index/begin/"><i class="icon-eye-open icon-white"></i>&nbsp;Products</a></li>
            </ul>

             <a id="example" class="btn btn-info" rel="popover" data-placement="bottom"><i class="icon-shopping-cart icon-white"></i>&nbsp;<strong>Cart</strong><?php echo($cart_total_items == 1)? ' (You have '.$cart_total_items.' item)': ' (You have '.$cart_total_items.' items)'; ?></a>
            
             <ul class="nav pull-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i>&nbsp;Your Account <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="<?php echo $base_url; ?>/users/"><i class="icon-signin"></i>&nbsp;<strong>Login</strong></a></li>
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
      <div class="hero-unit">
        <h1>Welcome To Online Store!<small>&nbsp;Powered by:&nbsp;<a href="http://ellislab.com/codeigniter">
        <img src="<?php echo $base_url; ?>/css/images/codeigniterlogo2.png" /></a></img></small></h1><br />
        <p>I have redesigned my old "<a href="http://rascal.mooo.com/online_store_original/">Online Store</a>" site, JQuery &amp; Bootstrap libraries have been used for the template layout.
        <br />The original "Online Store" was developed using a Framework built from scratch.
        This time around I'm using the <a href="http://ellislab.com/codeigniter">CodeIgniter</a> PHP Framework to power the site.<br />
        As soon as the <strong>CMS</strong> section will be ready, you'll be able to access the user section by logging in as user <strong>saruman</strong> with 
        the password <strong>return0</strong>, for the administrator section log in as user <strong>sguessou</strong> and use <strong>return0</strong>
         as the password.</p>
      </div>
      
     

      <div class="row-fluid">
       
        <div class="span3">
         </div>
         <div class="span5">
         <h3><i class="icon-signin"></i>&nbsp;Sign in to access your account</h3><br />
          <form class="form-horizontal">
              <div class="control-group">
              <label class="control-label" for="inputEmail">Email</label>
              <div class="controls">
              <input type="text" id="inputEmail" name="email" placeholder="Email">
              </div>
              </div>
              <div class="control-group">
              <label class="control-label" for="inputPassword">Password</label>
              <div class="controls">
              <input type="password" id="inputPassword" name="password" placeholder="Password">
              </div>
              </div>
              <div class="control-group">
              <div class="controls">
              
              <button type="submit" class="btn">Sign in</button>
              </div>
              </div>
          </form>
              <br />
              <br />

              
                           
                       <button class="btn btn-link" data-toggle="collapse" data-target="#registration">
                        <strong><i class="icon-exclamation-sign"></i>&nbsp;New customer?</strong>&nbsp;Start Here
                        </button>
                                   
                      <div id="registration" class="collapse">
                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-key"></i>&nbsp;New Registration</h5>
                                    <br />
                                    <form class="form-horizontal">
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="username">My Username Is:</label>
                                      <div class="controls">
                                        <input type="text" name="username" placeholder="Username">
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="firstname">My Firstname Is:</label>
                                      <div class="controls">
                                        <input type="text" name="firstname" placeholder="Firstname">
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                      <label class="control-label" for="lastname">My Lastname Is:</label>
                                      <div class="controls">
                                        <input type="text" name="lastname" placeholder="Lastname">
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="email">My E-mail Address Is:</label>
                                      <div class="controls">
                                        <input type="text" name="email" placeholder="Email">
                                      </div>
                                    </div>

                                    <div class="control-group">
                                      <label class="control-label" for="email_2">Type It Again:</label>
                                      <div class="controls">
                                        <input type="text" name="email_2" placeholder="Re-enter your email">
                                      </div>
                                    </div>

                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;<i class="icon-lock"></i>&nbsp;Protect Your Information With A Password</h5>

                                    <div class="control-group">
                                      <label class="control-label" for="password">Enter A New Password:</label>
                                      <div class="controls">
                                        <input type="password" name="password" placeholder="Password">
                                      </div>
                                    </div>  

                                    <div class="control-group">
                                      <label class="control-label" for="password_2">Type It Again:</label>
                                      <div class="controls">
                                        <input type="password" name="password_2" placeholder="Re-enter your password">
                                      </div>
                                    </div>

                                    <div class="control-group">
                                    <div class="controls">
                                    
                                    <button type="submit" class="btn">Register</button>
                                    </div>
                                    </div>
                                </form>
                      </div>             


                                <!--div class="accordion-group">
                                    <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                  
                                    <strong><i class="icon-exclamation-sign"></i>&nbsp;New customer?</strong>&nbsp;Start Here
                                  
                                    </div>
                                    <div id="collapseOne" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                    <h5>New Registration</h5>
                                    <br />
                                    <form class="form-horizontal">
                                    <div class="control-group">
                                      <label class="control-label" for="username">My Username Is:</label>
                                      <div class="controls">
                                        <input type="text" name="username" placeholder="Username">
                                      </div>
                                    </div>
                                    <div class="control-group">
                                      <label class="control-label" for="firstname">My Firstname Is:</label>
                                      <div class="controls">
                                        <input type="text" name="firstname" placeholder="Firstname">
                                      </div>
                                    </div>
                                    
                                    <div class="control-group">
                                    <div class="controls">
                                    
                                    <button type="submit" class="btn">Register</button>
                                    </div>
                                    </div>
                                </form>
                                    </div>
                                </div>
                               </div--> 
                            
                          


              
          </div>
          <div class="span4">
          </div>
       
      </div>  
     
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
  </script> 

  </body>