<?php

	$this->load->view('header');
?>
<!****************************************************************************************/>
<div id="menu"> 
		<ul>     
			<li><a href="<?php echo $base_url; ?>/welcome/">Main</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Book/">Books</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Dvd/">Movies</a></li>
			<? if (isset($session['logged'])) :?>
					<li><a class="current" href="<?=$base_url?>/users/login/">My Account</a></li>
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
				<li><a href="<?= $base_url ?>/products/describe_product/<?=$cart['options']['product_type']?>/<?=$cart['id']?>/" id="cSlider"><?= $cart['name'] ?></a>
				&nbsp;<a href="<?= $base_url ?>/cart/update_cart/<?= $cart['rowid'] ?>/0/Dvd/"><img src="<?= $base_url.'/css/images/bin_closed.png' ?>"></a>
				&nbsp;<a href="<?= $base_url ?>/cart/update_cart/<?= $cart['rowid'] ?>/<?php echo $num_pos = ($cart['qty'] + 1); ?>/Dvd/"><img src="<?= $base_url ?>/css/images/plus-small-white.png"></a>
				&nbsp;<a href="<?= $base_url ?>/cart/update_cart/<?= $cart['rowid'] ?>/<?php echo $num_neg = ($cart['qty'] - 1); ?>/Dvd/"><img src="<?= $base_url ?>/css/images/minus-small-white.png"></a>
				&nbsp;<strong><?= $cart['qty']. ($cart['qty'] == 1 ? ' Item ' : ' Items ') ?></strong>à&nbsp;€&nbsp;
				<?= ($cart['price'] * $cart['qty']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Subtotal:</strong>&nbsp;
				<font color="#FF0000"><strong>€&nbsp;<?= $cart['price'] ?></strong></font></li>		
				
			<?php endforeach; ?>
				<li>&nbsp;</li>
				<li><strong>Total Sum: € <font color="#FF0000"><?= $cart_total ?></strong></font></li>
				<li>&nbsp;</li>
			    <li><a href="<?= $base_url ?>/cart/empty_cart/Dvd/" class="no-style"><img src="<?= $base_url ?>/css/images/RecBin.png">&nbsp;<font color="#FF0000">Click to empty cart!</font></a></li>
			</ul>
			<a class="checkout" id="checkout" href="<?= $base_url ?>/index.php?controller=login&action=index&checkout=checkout">Proceed to Checkout</a>
			<a class="close" id="close" href="#">Close</a>
		 	</div>	
		   </div> 
			
		</div>
	
		<div class="right">
			</div>	
	  
<div class="clear">&nbsp;</div>
</div>
<!******************************************[ MAIN ]********************************************************>
<div id="main">	

<div id="sidebar">
			<div class="sidebarbox">
               <h2>My Account Menu</h2>
				<ul class="sidemenu">
					<li><a href="<?php echo $base_url; ?>">View Open Orders</a></li>
					<li><a href="<?php echo $base_url; ?>">Change Account Settings</a></li>
					<li><a href="<?php echo $base_url; ?>/users/logout/">Logout</a></li>	
				</ul>
			</div>
	  </div> 		   

<h4 class="my-account">My Account Menu-></h4><br />
	
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
<!************************************************************************************************************>	
	
	
	
<?php
	
	$this->load->view('footer');
	
/* End of file users_account_v.php */
/* Location: ./application/views/users/users_account_v.php */
