<?php

	$this->load->view('header');
?>
<!****************************************************************************************/>
<div id="menu"> 
		<ul>     
			<li><a href="<?php echo $base_url; ?>/welcome/">Main</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Book/">Books</a></li>
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
   
	<div class="wrapper-dvd">
	<ul class="gallery-dvd">
	<?php
		foreach ( $products as $product ) { 
		echo '<li>';
		$cover_path = $base_url."/images/products_images/" . $product['product_id'] . ".jpg";
	    echo '<a href="'.$base_url.'/products/describe_product/Dvd/'.$product['product_id'].'/"><img src="'.$cover_path.'" alt="'.$product['product_name'].'" height="225" width="150" /></a>';        
	    echo '<span><strong>'.$product['product_name'].'</strong><br /><strong>Price:</strong>&nbsp;'.$product['product_price'].'&nbsp;&euro;<br /><br /><a class="dvd" href="'.$base_url.'/products/describe_product/Dvd/'.$product['product_id'].'/"><strong class="click">CLICK FOR MORE DETAILS!</strong></a></span>';
	    echo '<br /><a class="add-cart-book" href="index.php?controller=cart&action=addcart&pid='.htmlspecialchars( $product['product_id'] ).'">Add to cart</a>';
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
<!****************************************************************************************>	
	
	
	
<?php
	
	$this->load->view('footer');
	
/* End of file movies_main_v.php */
/* Location: ./application/views/movies/movies_main_v.php */
