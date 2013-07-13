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
            <button class="btn btn-success disabled" type="button"><i class="icon-info-sign"></i>&nbsp;You're currently logged in</button>
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
        <h1>My Account <small>{ Change Account Settings }</small></h1>  
    </div>

    <div class="row">
    
    <div class="span3"> 
    
    <div class="well">
    	<ul class="nav nav-list">
		    <li class="nav-header"><h5><i class="icon-user icon-2x"></i>&nbsp;My Account</h5></li>
		    <li class="divider"></li>
		    <li><a href="<?php echo $base_url; ?>/users/view_open_orders/"><i class="icon-eye-open"></i>&nbsp;View Open Orders</a></li>
		    <li class="active"><a href="<?php echo $base_url; ?>/users/update_user_data/"><i class="icon-pencil"></i>&nbsp;Change Account Settings</a></li>
		    <li class="divider"></li>
		    <li><a href="<?php echo $base_url; ?>/users/logout/"><i class="icon-signout"></i>&nbsp;Logout</a></li>
		</ul>
		</div>
    </div>
    
    
    
    <div class="span6">  
   
   		  <ul class="nav nav-tabs" id="my_tab">
            <li <?php if($user_personal) echo 'class="active"'; ?>><a data-toggle="tab" href="#personal"><i class="icon-user"></i>&nbsp;Change Personal Info</a></li>
            <li <?php if($user_password) echo 'class="active"'; ?>><a data-toggle="tab" href="#password"><i class="icon-home"></i>&nbsp;Change Password</a></li>
            <li <?php if($user_address) echo 'class="active"'; ?>><a data-toggle="tab" href="#address"><i class="icon-lock"></i>&nbsp;Change Address</a></li>
          </ul>

          <div class="tab-content">

          <div class="tab-pane <?php if($user_personal) echo 'active'; ?>" id="personal">

          	<form class="form-horizontal" action="<?php echo $base_url; ?>/users/change_personal_info/personal/" method="post">
                                    
                 <div class="control-group">
                  <label class="control-label" for="username">My Username Is<strong class="text-error">(*)</strong>:</label>
                   <div class="controls">
                     <input type="text" name="username" readonly="readonly" value="<?php echo $user_data['login']; ?>"/>
                    </div>
                  </div>

                  <input type="hidden" name="user_id" value="<?php echo $user_data['user_id']; ?>"/>

                  <div class="control-group">
                  <label class="control-label" for="firstname">My Firstname Is:</label>
                   <div class="controls">
                     <input type="text" name="firstname" value="<?php echo $user_data['firstname']; ?>"/>
                    </div>
                  </div>

                  <div class="control-group">
                  <label class="control-label" for="lastname">My Laststname Is:</label>
                   <div class="controls">
                     <input type="text" name="lastname" value="<?php echo $user_data['lastname']; ?>"/>
                    </div>
                  </div>  	
                   
                   <div class="control-group">
                    <label class="control-label" for="email">My E-mail Address Is:</label>
                    <div class="controls">
                     <input type="text" name="email" value="<?php echo $user_data['email']; ?>"/>
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="controls">
                     <button type="submit" class="btn btn-warning"><i class="icon-pencil"></i>&nbsp;Change Personal Info</button>
                    </div>
                  </div>	

               </form>   
              <p><strong class="text-error">(*)</strong> Value can't be changed.</p>

              <?php if ( $personal_success ) :?>

              	    <div class="alert alert-success">
					    <button type="button" class="close" data-dismiss="alert">&times;</button>
					    <strong>Success!</strong> Your personal info was updated successfully.
				    </div>
              <?php endif ?>
    	
          </div>

          
          <div class="tab-pane <?php if($user_password) echo 'active'; ?>" id="password">

          <form class="form-horizontal" action="<?php echo $base_url; ?>/users/change_personal_info/password/" method="post">
                                    
                 <div class="control-group">
                  <label class="control-label" for="password">Current Password:</label>
                   <div class="controls">
                     <input type="password" name="password" readonly="readonly" value="<?php echo substr($user_data['password'], 0, 10); ?>"/>
                    </div>
                  </div>

                  <input type="hidden" name="username" value="<?php echo $user_data['login']; ?>"/>  
                  <input type="hidden" name="user_id" value="<?php echo $user_data['user_id']; ?>"/>

                  <div class="control-group">
                  <label class="control-label" for="new_password_1">New Password:</label>
                   <div class="controls">
                     <input type="password" name="new_password_1" />
                    </div>
                  </div>

                  <div class="control-group">
                  <label class="control-label" for="new_password_2">Reenter Password:</label>
                   <div class="controls">
                     <input type="password" name="new_password_2" />
                    </div>
                  </div>

                  <div class="control-group">
                    <div class="controls">
                     <button type="submit" class="btn btn-warning"><i class="icon-pencil"></i>&nbsp;Change Password</button>
                    </div>
                  </div>

           </form>
           <?php if ( $password_success ) :?>

                    <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Success!</strong> Your password was updated successfully.
            </div>
              <?php endif ?>
          </div>

          <div class="tab-pane <?php if($user_address) echo 'active'; ?>" id="address">

          <form class="form-horizontal" action="<?php echo $base_url; ?>/users/change_personal_info/address/" method="post">
                                    
                 <div class="control-group">
                  <label class="control-label" for="address_line_1">Address Line1:</label>
                   <div class="controls">
                     <input type="text" name="address_line_1" value="<?php echo $user_data['address_line_1']; ?>"/>
                    </div>
                  </div>

                  <input type="hidden" name="username" value="<?php echo $user_data['login']; ?>"/>  
                  <input type="hidden" name="user_id" value="<?php echo $user_data['user_id']; ?>"/>

                  <div class="control-group">
                  <label class="control-label" for="address_line_2">Address Line2:</label>
                   <div class="controls">
                     <input type="text" name="address_line_2" value="<?php echo $user_data['address_line_2']; ?>"/>
                    </div>
                  </div>

                  <div class="control-group">
                  <label class="control-label" for="city">City:</label>
                   <div class="controls">
                     <input type="text" name="city" value="<?php echo $user_data['town_city']; ?>"/>
                    </div>
                  </div>  	
                   
                   <div class="control-group">
                    <label class="control-label" for="county">State/Province/Region:</label>
                    <div class="controls">
                     <input type="text" name="county" value="<?php echo $user_data['county']; ?>"/>
                    </div>
                  </div>

                 	<div class="control-group">
                    <label class="control-label" for="country">Country:</label>
                    <div class="controls">
                     <select name="country" size="1">
	                     <?php foreach($countries as $country) :?> 
	                     	<?php if($country['name'] == $user_data['country']) :?>		
	                          <option value="<?php echo $country['name']; ?>" selected="selected"><?php echo $country['printable_name']; ?></option>
	                 	 	<?php else :?>
	                 	 	   <option value="<?php echo $country['name']; ?>"><?php echo $country['printable_name']; ?></option>	
	                 	 	<?php endif ?>	
	                 	 <?php endforeach ?>
                     </select>
                   </div>
                  </div>


                  <div class="control-group">
                    <div class="controls">
                     <button type="submit" class="btn btn-warning"><i class="icon-pencil"></i>&nbsp;Change User Address</button>
                    </div>
                  </div>	

               </form> 
               <?php if ( $address_success ) :?>

                    <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Success!</strong> Your address was updated successfully.
            </div>
              <?php endif ?>
          </div>

          </div>  <!-- / tab-content  -->   
     
     


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
	
	
/* End of file users_update_main_v.php */
/* Location: ./application/views/users/users_update_main_v.php */
