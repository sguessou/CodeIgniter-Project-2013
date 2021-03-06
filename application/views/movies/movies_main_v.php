<?php

	$this->load->view('header');
?>
<!--****************************************************************************************/-->
<div id="menu"> 
		<ul>     
			<li><a href="<?php echo $base_url; ?>/welcome/">Main</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Book/">Books</a></li>
			<li><a class="current" href="<?php echo $base_url; ?>/products/index/begin/Dvd/">Movies</a></li>
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
				&nbsp;<a href="<?= $base_url ?>/welcome/empty_cart/<?=$cart['product_id']?>/dvd/"><img src="<?= $base_url.'/css/images/bin_closed.png' ?>"></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/update_cart/<?=$cart['product_id']?>/<?php echo $num_pos = ($cart['quantity'] + 1); ?>/dvd/"><img src="<?= $base_url ?>/css/images/plus-small-white.png"></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/update_cart/<?=$cart['product_id']?>/<?php echo $num_neg = ($cart['quantity'] - 1); ?>/dvd/"><img src="<?= $base_url ?>/css/images/minus-small-white.png"></a>
				&nbsp;<strong><?= $cart['quantity']. ($cart['quantity'] == 1 ? ' Item ' : ' Items ') ?></strong>à&nbsp;€&nbsp;
				<?=$cart['attributes']['price']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Subtotal:</strong>&nbsp;
				<font color="#FF0000"><strong>€&nbsp;<?= $cart['attributes']['price'] * $cart['quantity'] ?></strong></font></li>		
				
			<?php endforeach; ?>
				<li>&nbsp;</li>
				<li><strong>Total Sum: € <font color="#FF0000"><?= $cart_total ?></strong></font></li>
			    <li>&nbsp;</li>
			    <li><a href="<?= $base_url ?>/welcome/empty_cart/0/dvd/" class="no-style"><img src="<?= $base_url ?>/css/images/RecBin.png">&nbsp;<font color="#FF0000">Click to empty cart!</font></a></li>
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

<h3><strong>Movies:</strong></h3>
   
	<div class="wrapper-dvd">
	<ul class="gallery-dvd">
	<?php
		foreach ( $products as $product ) { 
		echo '<li>';
		$cover_path = $base_url."/images/products_images/" . $product['product_id'] . ".jpg";
	    echo '<a href="'.$base_url.'/products/describe_product/Dvd/'.$product['product_id'].'/"><img src="'.$cover_path.'" alt="'.$product['product_name'].'" height="225" width="150" /></a>';        
	    echo '<span><strong>'.$product['product_name'].'</strong><br /><strong>Price:</strong>&nbsp;'.$product['product_price'].'&nbsp;&euro;<br /><br /><a class="dvd" href="'.$base_url.'/products/describe_product/Dvd/'.$product['product_id'].'/"><strong class="click">CLICK FOR MORE DETAILS!</strong></a></span>';
	    echo '<br /><a class="add-cart-book" href="'.$base_url.'/welcome/add_to_cart/'.$product['product_id'].'/'.$product['product_price'].'/'.urlencode($product['product_name']).'/'.$product['type_name'].'/Dvd/">Add to cart</a>';
	    echo '</li>';	
	   }
	?>		
	</ul>
	
	<div style="width: 80%; margin-top: 20px; text-align: center; float: left;">
        <?php 
        
        if($start > 0) 
        { 
           echo '<a href="'.$base_url.'/products/index/next/Dvd/'.max( $start - $page_size, 0 ).'/'.max( $first - 1, 1 ).'/"><strong>Previous Page</strong></a>';
        } 
        echo '&nbsp;&nbsp;&nbsp;';
        
      if($start + $page_size < $total_rows) 
      { 
        echo '<a href="'.$base_url.'/products/index/next/Dvd/'.min( $start + $page_size, $total_rows ).'/'.min( $first + 1, ($total_rows / $page_size) + 1 ).'/"><strong>Next Page</strong></a>';
      } 
		$last = $total_rows / $page_size;
			if($total_rows % $page_size) { $last += 1; }
			echo '&nbsp;&nbsp;<strong>( Page '.$first.' of '.(int)$last.' )</strong>'; 
        echo '</div>';	
        ?>			
</div>




 <div class="clear">&nbsp;</div>
</div>
<!--****************************************************************************************-->	
	
	
	
<?php
	
	$this->load->view('footer');
	
/* End of file movies_main_v.php */
/* Location: ./application/views/movies/movies_main_v.php */
