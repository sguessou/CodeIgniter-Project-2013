<?php

	$this->load->view('header');
?>
<!****************************************************************************************/>
<div id="menu"> 
		<ul>     
			<li><a href="<?php echo $base_url; ?>/welcome/">Main</a></li>
			<li><a class="current" href="<?php echo $base_url; ?>/books/">Books</a></li>
			<li><a href="">Movies</a></li>
			<li><a href="">Login</a></li>
			
		</ul>
	</div>
	
	<div id="feature">	
		<div class="left">		
		
			<h2 class="cart" id="viewCart">Cart</h2>
			</div>
	
		<div class="right">
			<h2>NOTICE!</h2>
			<p>Log in as <u class="click">saruman</u> with the password: <u class="click">return0</u>, to experiment with the user CMS!</p>	
		</div>	
	  
<div class="clear">&nbsp;</div>
</div>

<div id="main">	


			
			
<p>&nbsp;</p>
 <div class="clear">&nbsp;</div>
</div>
<!****************************************************************************************>	
	
	
	
<?php
	
	$this->load->view('footer');
	
?>
