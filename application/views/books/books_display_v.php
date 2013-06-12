<?php

	$this->load->view('header');
?>
<!--****************************************************************************************/-->
<div id="menu"> 
		<ul>     
			<li><a href="<?= $base_url ?>/welcome/">Main</a></li>
			<li><a class="current" href="<?= $base_url ?>/products/index/begin/Book/">Books</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Dvd/">Movies</a></li>
			<? if ($logged) :?>
					<? if (isset($user_data['admin'])) :?>
					   <li><a href="<?=$base_url?>/users/login/">Admin</a></li>
					<? else: ?>  
						<li><a href="<?=$base_url?>/users/login/">My Account</a></li>
					<? endif ?>	
			<? else: ?>
					<li><a href="<?=$base_url?>/users/index/">Login</a></li>
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
				&nbsp;<a href="<?= $base_url ?>/welcome/empty_cart/<?=$cart['product_id']?>/book/"><img src="<?= $base_url.'/css/images/bin_closed.png' ?>"></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/update_cart/<?=$cart['product_id']?>/<?php echo $num_pos = ($cart['quantity'] + 1); ?>/book/"><img src="<?= $base_url ?>/css/images/plus-small-white.png"></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/update_cart/<?=$cart['product_id']?>/<?php echo $num_neg = ($cart['quantity'] - 1); ?>/book/"><img src="<?= $base_url ?>/css/images/minus-small-white.png"></a>
				&nbsp;<strong><?= $cart['quantity']. ($cart['quantity'] == 1 ? ' Item ' : ' Items ') ?></strong>à&nbsp;€&nbsp;
				<?=$cart['attributes']['price']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Subtotal:</strong>&nbsp;
				<font color="#FF0000"><strong>€&nbsp;<?= $cart['attributes']['price'] * $cart['quantity'] ?></strong></font></li>		
				
			<?php endforeach; ?>
				<li>&nbsp;</li>
				<li><strong>Total Sum: € <font color="#FF0000"><?= $cart_total ?></strong></font></li>
			    <li>&nbsp;</li>
			    <li><a href="<?= $base_url ?>/welcome/empty_cart/0/book/" class="no-style"><img src="<?= $base_url ?>/css/images/RecBin.png">&nbsp;<font color="#FF0000">Click to empty cart!</font></a></li>
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

<h3><strong>IT-Books:</strong></h3>
   

<div class="wrapper">
		<div class="product">
			<h1 class="book"><strong><?= $product_data[0]['product_name'] ?></strong></h1>
			<h2 class="instructions"><?= $product_data[0]['type_name'] . " Description" ?></h2>
			<?php	$img = $base_url."/images/products_images/" . $product_data[0]['product_id'] . ".jpg"; ?>
			<img src="<?= $img ?>" alt="<?= $img  ?>" height="180" width="160" />
			<p><?= $product_data[0]['product_description'] ?></p>
			<ul class="author">
				<li><h2 class="author">More About the Author</h2>
				<strong>Biography</strong></li>
				
			</ul>
			
			<h2 class="details">Product Details</h2>
			<ul>
				<li><strong>Paperback:</strong>&nbsp;</li>
				<li><strong>Language:</strong>&nbsp;<?= $product_data[0]['product_language'] ?></li>
				<li><strong>ISBN-10:</strong>&nbsp;<?= $product_data[0]['product_isbn10'] ?></li>
				<li><strong>Price:</strong>&nbsp;<?= $product_data[0]['product_price'] ?>&nbsp;&euro;</li>
			</ul>
			<a class="add-cart" href="<?= $base_url ?>/welcome/add_to_cart/<?= $product_data[0]['product_id'] ?>/<?= $product_data[0]['product_price'] ?>/<?php echo urlencode($product_data[0]['product_name']); ?>/<?=$product_data[0]['type_name']?>/Book/">Add to cart</a>
			<a class="more" href="<?= $base_url ?>/products/index/begin/Book/">Go Back</a>
		</div>
	</div>	
			

 <div class="clear">&nbsp;</div>
</div>
<!--****************************************************************************************-->	
	
	
	
<?php
	
	$this->load->view('footer');
	
/* End of file books_display_v.php */
/* Location: ./application/views/books/books_display_v.php */
