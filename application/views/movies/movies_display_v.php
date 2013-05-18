<?php

	$this->load->view('header');
?>
<!****************************************************************************************/>
<div id="menu"> 
		<ul>     
			<li><a href="<?= $base_url ?>/welcome/">Main</a></li>
			<li><a href="<?= $base_url ?>/products/index/begin/Book/">Books</a></li>
			<li><a class="current" href="<?php echo $base_url; ?>/products/index/begin/Dvd/">Movies</a></li>
			<li><a href="">Login</a></li>
			
		</ul>
	</div>
	
	<div id="feature">	
		<div class="left">		
		
			<h2 class="cart" id="viewCart">Cart</h2>
			</div>
	
		<div class="right">
			</div>	
	  
<div class="clear">&nbsp;</div>
</div>

<div id="main">	

<h3><strong>Movies:</strong></h3>
   

<div class="wrapper">
		<div class="product">
			<h1 class="book"><strong><?= $product_data[0]['product_name'] ?></strong></h1>
			<h2 class="instructions"><?= $product_data[0]['type_name'] . " Description" ?></h2>
			<?php	$img = $base_url."/images/products_images/" . $product_data[0]['product_id'] . ".jpg"; ?>
			<img src="<?= $img ?>" alt="<?= $img  ?>" height="180" width="160" />
			<p><?= $product_data[0]['product_description'] ?></p>
			<ul class="author">
				<li><h2 class="author">More About the Director</h2>
				<strong>Biography</strong></li>
				
			</ul>
			
			<h2 class="details">Product Details</h2>
			<ul>
				<li><strong>Paperback:</strong>&nbsp;</li>
				<li><strong>Language:</strong>&nbsp;<?= $product_data[0]['product_language'] ?></li>
				<li><strong>ISBN-10:</strong>&nbsp;<?= $product_data[0]['product_isbn10'] ?></li>
				<li><strong>Price:</strong>&nbsp;<?= $product_data[0]['product_price'] ?>&nbsp;&euro;</li>
			</ul>
			<a class="add-cart" href="index.php?controller=cart&action=addcart&pid=">Add to cart</a>
			<a class="more" href="<?= $base_url ?>/products/index/begin/Dvd/">Go Back</a>
		</div>
	</div>	
			
 <div class="clear">&nbsp;</div>
</div>
<!****************************************************************************************>	
	
	
	
<?php
	
	$this->load->view('footer');
	
/* End of file movies_display_v.php */
/* Location: ./application/views/movies/movies_display_v.php */
