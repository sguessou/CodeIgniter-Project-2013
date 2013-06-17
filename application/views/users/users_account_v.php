<?php

	$this->load->view('header');
?>
<!--****************************************************************************************/-->
<div id="menu"> 
		<ul>     
			<li><a href="<?php echo $base_url; ?>/welcome/">Main</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Book/">Books</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Dvd/">Movies</a></li>
			<? if ($logged) :?>
					<? if (isset($user_data['admin'])) :?>
					   <li><a class="current" href="<?=$base_url?>/users/login/">Admin</a></li>
					<? else: ?>  
						<li><a class="current" href="<?=$base_url?>/users/login/">My Account</a></li>
					<? endif ?>	
			<? else: ?>
					<li><a class="current" href="<?=$base_url?>/users/index/">Login</a></li>
			<? endif ?>
		</ul>
	</div>
	
	<div id="feature">	
		<div class="left">		
		
			<h2 class="cart" id="viewCart">Cart</h2>
			<?php
	
			if($cart_total_items == 0) 
			{
				echo "<div><p>Your Shopping Cart is empty!</p>";
			}
			elseif($cart_total_items == 1)
			{
				echo '<div class="link"><p>You have <a href="#" id="cartLink">'.$cart_total_items.' product</a> in your Shopping Cart!</p>';
			}
			elseif($cart_total_items > 1)
			{	
				echo '<div class="link"><p>You have <a href="#" id="cartLink">'.$cart_total_items.' products</a> in your Shopping Cart!</p>';
			}
			?>
			
			<div id="cartSlider">	
			<h1 class="cart_header">Your Shopping Cart:</h1>
			<ul class="cartUl">       
			 <?php foreach($cart_content as $cart): ?>                     
				<li><a href="<?= $base_url ?>/products/describe_product/<?=$cart['attributes']['product_type']?>/<?=$cart['product_id']?>/" id="cSlider"><?= $cart['attributes']['name'] ?></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/empty_cart/<?=$cart['product_id']?>/users/"><img src="<?= $base_url.'/css/images/bin_closed.png' ?>"></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/update_cart/<?=$cart['product_id']?>/<?php echo $num_pos = ($cart['quantity'] + 1); ?>/users/"><img src="<?= $base_url ?>/css/images/plus-small-white.png"></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/update_cart/<?=$cart['product_id']?>/<?php echo $num_neg = ($cart['quantity'] - 1); ?>/users/"><img src="<?= $base_url ?>/css/images/minus-small-white.png"></a>
				&nbsp;<strong><?= $cart['quantity']. ($cart['quantity'] == 1 ? ' Item ' : ' Items ') ?></strong>à&nbsp;€&nbsp;
				<?=$cart['attributes']['price']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Subtotal:</strong>&nbsp;
				<font color="#FF0000"><strong>€&nbsp;<?= $cart['attributes']['price'] * $cart['quantity'] ?></strong></font></li>		
				
			<?php endforeach; ?>
				<li>&nbsp;</li>
				<li><strong>Total Sum: € <font color="#FF0000"><?= $cart_total ?></strong></font></li>
			    <li>&nbsp;</li>
			    <li><a href="<?= $base_url ?>/welcome/empty_cart/0/users/" class="no-style"><img src="<?= $base_url ?>/css/images/RecBin.png">&nbsp;<font color="#FF0000">Click to empty cart!</font></a></li>
			</ul>
			<a class="checkout" id="checkout" href="<?= $base_url ?>/index.php?controller=login&action=index&checkout=checkout">Proceed to Checkout</a>
			<a class="close" id="close" href="#">Close</a>
		 	</div>	
		   </div> 
			
		</div>
	
		<div class="right">
			<h2>NOTICE!</h2>
			<p>Log in as <u class="click">saruman</u> with the password: <u class="click">return0</u>, to experiment with the user CMS!
			To Log in as the admin use:<u class="click">sguessou</u> with same password as above!</p>	
		</div>		
	  
<div class="clear">&nbsp;</div>
</div>
<!--******************************************[ MAIN ]********************************************************-->
<div id="main">	

<? if(!$user_data['admin']): ?>

<div id="sidebar">
			<div class="sidebarbox">
               <h2>My Account Menu</h2>
				<ul class="sidemenu">
					<li><a href="<?php echo $base_url; ?>/users/view_open_orders/">View Open Orders</a></li>
					<li><a href="<?php echo $base_url; ?>/users/update_user_data/">Change Account Settings</a></li>
					<li><a href="<?php echo $base_url; ?>/users/logout/">Logout</a></li>	
				</ul>
			</div>
	  </div> 		   

<h4 class="my-account">My Account Menu-></h4><br />

<? elseif($user_data['admin']): ?>

<div id="sidebar">
			<div class="sidebarbox">
               <h2>Admin Menu</h2>
				<ul class="sidemenu">
					<li><a href="<?php echo $base_url; ?>">Manage Users</a></li>
					<li><a href="<?php echo $base_url; ?>">Manage Product Types</a></li>
					<li><a href="<?php echo $base_url; ?>">Manage Products</a>
						<ul>
							<li><a href="<?php echo $base_url; ?>">Add Product</a></li>
							<li><a href="<?php echo $base_url; ?>">Update or Remove</a></li>
						</ul></li>
					<li><a href="#">Manage Orders</a></li>	
					<li><a href="<?php echo $base_url; ?>">View Access Log</a></li>
					<li><a href="<?php echo $base_url; ?>/users/logout/">Logout</a></li>	
				</ul>
			</div>
	    </div> 		   

	<h4 class="admin-sign">Admin Menu-></h4><br />

<? endif ?>
	
<?php if($user_data['last_log']): ?>
	<h4><?php echo $msg.' '.$user_data['firstname'].'!'; ?>
	</h4><br /> 
	    <?php echo 'Last login: '.$user_data['last_log']; ?>
	<br /><br />
<?php else :?>	 
	 <p><h4> Welcome for the first time <?=$user['firstname']?> !</h4>';
<?php endif ?>
		
<p>&nbsp;</p>
 <div class="clear">&nbsp;</div>
</div>
<!--************************************************************************************************************-->	
	
	
	
<?php
	
	$this->load->view('footer');
	
/* End of file users_account_v.php */
/* Location: ./application/views/users/users_account_v.php */