<?php

	$this->load->view('header');
?>
<!****************************************************************************************/>
<div id="menu"> 
		<ul>     
			<li><a href="<?php echo $base_url; ?>/welcome/">Main</a></li>
			<li><a class="current" href="<?php echo $base_url; ?>/books/index/begin/">Books</a></li>
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

<h3><strong>IT-Books:</strong></h3>
   
	<div class="wrapper-book">
	<ul class="gallery">
	<?php
		foreach ( $products as $product ) { 
		echo '<li>';
		$cover_path = $base_url."/images/products_images/" . $product['product_id'] . ".jpg";
	    echo '<a href="'.$base_url.'/index.php?controller=books&action=showproduct&pid='.$product['product_id'].'"><img src="'.$cover_path.'" alt="'.$product['product_name'].'" height="225" width="150" /></a>';        
	    echo '<span><strong>'.$product['product_name'].'</strong><br /><strong>Price:</strong>&nbsp;'.$product['product_price'].'&nbsp;&euro;<br /><br /><a class="dvd" href="'.$base_url.'/index.php?controller=books&action=showproduct&pid='.$product['product_id'].'"><strong class="click">CLICK FOR MORE DETAILS!</strong></a></span>';
	    echo '<br /><a class="add-cart-book" href="index.php?controller=cart&action=addcart&pid='.htmlspecialchars( $product['product_id'] ).'">Add to cart</a>';
	    echo '</li>';	
	   }
	?>		
	</ul>
	
	<div style="width: 80%; margin-top: 20px; text-align: center; float: left;">
        <?php 
        
        if($start > 0) 
        { 
           echo '<a href="'.$base_url.'/books/index/next/'.max( $start - $page_size, 0 ).'/'.max( $first - 1, 1 ).'/"><strong>Previous Page</strong></a>';
        } 
        echo '&nbsp;&nbsp;&nbsp;';
        
      if($start + $page_size < $total_rows) 
      { 
        echo '<a href="'.$base_url.'/books/index/next/'.min( $start + $page_size, $total_rows ).'/'.min( $first + 1, ($total_rows / $page_size) + 1 ).'/"><strong>Next Page</strong></a>';
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
	
/* End of file books_main_v.php */
/* Location: ./application/views/books_main_v.php */
