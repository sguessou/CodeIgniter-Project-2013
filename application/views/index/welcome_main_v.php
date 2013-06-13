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
              <li class="active"><a href="<?php echo $base_url; ?>/welcome/">Home</a></li>
              			<li><a href="#">Products</a></li>
              			<li><a href="#">Cart</a></li>
              </li>
            </ul>

            <ul class="nav pull-right">
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Your Account <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li><a href="#">Login</a></li>
                      <li><a href="#">Profile</a></li>
                      <li><a href="#">Cart</a></li>
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
        <img src="<?php echo $base_url; ?>/css/images/codeigniterlogo1.png" height="50" width="150" /></a></img></small></h1><br />
        <p>I have redesigned the old "<a href="http://rascal.mooo.com/project/">Online Store</a>" site, JQuery &amp; Bootstrap libraries have been used for the template layout.
        <br />The original "Online Store" was developed using a Framework built from scratch.
        This time around I'm using the <a href="http://ellislab.com/codeigniter">CodeIgniter</a> PHP Framework to power the site.<br />
        As soon as the <strong>CMS</strong> section will be ready, you'll be able to access the user section by logging in as user <strong>saruman</strong> with 
        the password <strong>return0</strong>, for the administrator section log in as user <strong>sguessou</strong> and use <strong>return0</strong>
         as the password.</p>
      </div>

      <div class="carousel slide" id="home-carousel">
        <div class="carousel-inner">

          <div class="item active">
            <img src="<?php echo $base_url; ?>/images/products_images/carousel_dvd.jpg" alt="dvd" />
            <div class="carousel-caption">
              <p>Go to the "Products" section to see more of our Dvd's</p>
            </div>
          </div>

          <div class="item">
            <img src="<?php echo $base_url; ?>/images/products_images/carousel_ebook.jpg" alt="ebook" />
            <div class="carousel-caption">
              <p>Go to the "Products" section to see more of our Ebook's</p>
            </div>
          </div>

          <div class="item">  
            <img src="<?php echo $base_url; ?>/images/products_images/carousel_dvd_2.jpg" alt="dvd" />
            <div class="carousel-caption">
              <p>Go to the "Products" section to see more of our Dvd's</p>
            </div>
          </div>

          <div class="item">
            <img src="<?php echo $base_url; ?>/images/products_images/carousel_ebook_2.jpg" alt="ebook" />
            <div class="carousel-caption">
              <p>Go to the "Products" section to see more of our Ebook's</p>
            </div>
          </div>
              
        </div><!-- .carousel-inner -->
          <a class="carousel-control left" href="#home-carousel" data-slide="prev">&lsaquo;</a>
          <a class="carousel-control right" href="#home-carousel" data-slide="next">&rsaquo;</a>
      </div><!-- .carousel -->

      <!-- div class="container">
      <!-- Example row of columns -->
      <!--div class="row">
      <h3>Latest DVD's Arrival</h3>

        <ul class="thumbnails">
         <?php foreach ($dvds as $dvd): ?> 	
		  <li class="span3">
		    <div class="thumbnail">
		      <img src="<?php echo $base_url; ?>/images/products_images/<?php echo $dvd['product_id'].'.jpg'; ?>" alt="" style="">
		      <div class="caption">
		        <h3>Meats</h3>
		        <p>Bacon ipsum dolor sit amet sirloin pancetta shoulder tongue doner,
		           shank sausage.</p>
		        <p><a href="#" class="btn btn-primary">Add to cart</a> <a href="#" class="btn">View details</a></p>
		      </div>
		    </div>
		  </li>
		 <?php endforeach; ?>
		</ul>


       
      </div>

      <div class="row">
      <h3>Latest eBooks Arrival</h3>
        <div class="span3">
          <h4>Heading</h4>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
       
      </div>
   </div -->
   <hr>
       <div class="alert alert-info">
	    <button type="button" class="close" data-dismiss="alert">&times;</button>
	    <h4>NOTICE!</h4>
	    Click on the "Products" section in the navigation bar to browse our eBooks and DVD's! 
	   </div>

</div> <!-- /container -->
    
    <footer>
      <div id="footer">
		<div id="footersections">
			<div class="half">
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

			<div class="quarter">
				<h2>Web Templates</h2>
				<p>If you want to learn more about HTML, CSS & web templates building go to <a href="http://andreasviklund.com/" >Andreasviklund.com</a></p>
				<p>You can also experiment on your own with freely available templates!</p>
			</div>

			<div class="lastquarter">
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
			<div class="clear">&nbsp;</div> 
		</div>
	</div> 

	<div id="credits">
		<p>&copy;&nbsp;<?php echo $site_title ?>&nbsp;[sguessou 2013]</p>
	<br />
		<p>Powered by <img src="<?php echo $base_url ?>/css/images/codeigniter_logo.png" height="70" width="120"></p>
	</div>  
</div>
</footer>

    

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo $base_url?>/js/jquery-1.10.1.js"></script>
    <script src="<?php echo $base_url?>/js/bootstrap.min.js"></script>

  </body>
</html>
