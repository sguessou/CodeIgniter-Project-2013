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

<div id="main">	

<?php //var_dump($_POST); ?>

<div class="wrapper-login">
 <p>&nbsp;</p> 
<!--?php 
	if($warning)
	{
		echo '<h2 class="warning">You should be logged in to proceed!</h2>';
    }
    elseif($loginProblem)
	{
		echo '<h2 class="warning-2">The entered password doesn\'t match or the account doesn\'t exist. Reenter the password or <a href="index.php?controller=login&action=register">get a new account.</a></h2>';
    }
    else { echo '<h2 class="login">Sign in to access your account:</h2>'; }
?-->
	
	<h2 class="login">Sign in to access your account:</h2>	
      <br />
		<div class="login-form">
   	
		<form action="<?=$base_url?>/users/login/" method="post" class="style-form">
		
			<div><label for="login">Username:</label>
			<input type="text" name="login" id="username" required="required" /></div>
			
			<div><label for="password">Password:</label>
			<input type="password" name="password" id="password" required="required"/></div>
			
			<div class="submit"><input type="submit" name="login-submit" id="login-submit" value="Sign In" /></div>
			
			<div><a class="login" href="" >New customer? Start here.</a>
	 		</div>
		</form>
		</div>	
		
<p>&nbsp;</p>
 <div class="clear">&nbsp;</div>
</div>
</div>
<!****************************************************************************************>	
	
	
	
<?php
	
	$this->load->view('footer');
	
/* End of file users_main_v.php */
/* Location: ./application/views/users/users_main_v.php */
