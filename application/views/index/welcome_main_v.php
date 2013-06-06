<?php

	$this->load->view('header');
?>
<!****************************************************************************************/>

<div id="menu"> 
		<ul>     
			<li><a class="current" href="<?php echo $base_url; ?>/welcome/">Main</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Book/">Books</a></li>
			<li><a href="<?php echo $base_url; ?>/products/index/begin/Dvd/">Movies</a></li>
			<? if (isset($session['auth']['logged'])) :?>
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
				&nbsp;<a href="<?= $base_url ?>/welcome/empty_cart/<?=$cart['product_id']?>/"><img src="<?= $base_url.'/css/images/bin_closed.png' ?>"></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/update_cart/<?=$cart['product_id']?>/<?php echo $num_pos = ($cart['quantity'] + 1); ?>/"><img src="<?= $base_url ?>/css/images/plus-small-white.png"></a>
				&nbsp;<a href="<?= $base_url ?>/welcome/update_cart/<?=$cart['product_id']?>/<?php echo $num_neg = ($cart['quantity'] - 1); ?>/"><img src="<?= $base_url ?>/css/images/minus-small-white.png"></a>
				&nbsp;<strong><?= $cart['quantity']. ($cart['quantity'] == 1 ? ' Item ' : ' Items ') ?></strong>à&nbsp;€&nbsp;
				<?= ($cart['attributes']['price'] * $cart['quantity']) ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Subtotal:</strong>&nbsp;
				<font color="#FF0000"><strong>€&nbsp;<?= $cart['attributes']['price'] * $cart['quantity'] ?></strong></font></li>		
				
			<?php endforeach; ?>
				<li>&nbsp;</li>
				<li><strong>Total Sum: € <font color="#FF0000"><?= $cart_total ?></strong></font></li>
			    <li>&nbsp;</li>
			    <li><a href="<?= $base_url ?>/welcome/empty_cart/" class="no-style"><img src="<?= $base_url ?>/css/images/RecBin.png">&nbsp;<font color="#FF0000">Click to empty cart!</font></a></li>
			</ul>
			<a class="checkout" id="checkout" href="<?= $base_url ?>/index.php?controller=login&action=index&checkout=checkout">Proceed to Checkout</a>
			<a class="close" id="close" href="#">Close</a>
		 	</div>	
		 	

		</div> 
	</div>
	
	<div class="right">
			<h2>NOTICE!</h2>
			<p>This project was started on the: 01-05-2013,I have chosen to work on the main sections (main,books...) first. I will try
			to get the cart working at some point, then on to the admin and user CMS.</p>	
	</div>	
	  
<div class="clear">&nbsp;</div>

</div>

<div id="main">	
     
  <?php
	//print_r($mycart); 
  ?>
   
 <table width="100%" border="0" align="center">
   <tbody>
    <tr>
    <td>
    <h3><strong>Last Upload eBooks:</strong></h3><br />
     <table width="100%" align="center">
      <tbody>
      <?php
      	$rowCount = 0;
      	echo '<tr height="150">';
      	foreach ( $books as $book ) 
      	{ 
      	 $rowCount++;
		 $coverSrc = $base_url."/images/products_images/" . $book['product_id'] . ".jpg";
		 $description = implode(' ', array_slice(explode(' ', $book['product_description']), 0, 40));
		 $description .= '...'; 
		 
		 echo '<td width="120">';
		 echo '<a title="Price: '.$book['product_price'].' €" href="'.$base_url.'/products/describe_product/Book/'.$book['product_id'].'/">';
		 echo '<img class="border" width="100" alt="Price: '.$book['product_price'].' €" src="'.$coverSrc.'"></a></td>';
		 echo '<td width="370" style="border-bottom:1px dashed green;">';
		 echo '<a title="Price: '.$book['product_price'].' €" href="'.$base_url.'/products/describe_product/Book/'.$book['product_id'].'/">'.$book['product_name'].'</a>';
		 echo '<div style="padding-top:10px; text-align:justify;">'.htmlentities($description).'</div>';
		 $book_name = urlencode($book['product_name']);
		 echo '<div style="padding-top:10px;padding-bottom:10px; text-align:justify;"><a class="cart-dvd" href="'.$base_url.'/welcome/add_to_cart/'.$book['product_id'].'/'.$book['product_price'].'/'.$book_name.'/'.$book['type_name'].'/">Add to cart</a></div></td>';
		 echo '<td width="20"> </td>';
		 if($rowCount % 2 == 0 && $rowCount != 4) echo '</tr><tr height="150">';
		 elseif($rowCount % 2 == 0 && $rowCount == 4) echo '</tr>'; 
		}
		echo '</tr>';
      ?>
      </tbody>
     </table>
    </td>
    </tr>
   </tbody>
   </table>
   <br />
   <br />
   
   <h3><strong>Last Upload Dvd's:</strong></h3><br />
 <table width="100%" align="center">
      <tbody>
      <?php 
      
      	$rowCnt = 0;
      	echo '<tr height="150">';
      	foreach ( $dvds as $dvd ) 
      	{ 
      	 $rowCnt++;
		 $cvrSrc = $base_url."/images/products_images/" . $dvd['product_id'] . ".jpg";
		 $descp = implode(' ', array_slice(explode(' ', $dvd['product_description']), 0, 40));
		 $descp .= '...'; 
		 
		 echo '<td width="120">';
		 echo '<a title="Price: '.$dvd['product_price'].' €" href="'.$base_url.'/products/describe_product/Dvd/'.$dvd['product_id'].'/">';
		 echo '<img class="border" width="100" alt="Price: '.$dvd['product_price'].' €" src="'.$cvrSrc.'"></a></td>';
		 echo '<td width="370" style="border-bottom:1px dashed green;">';
		 echo '<a title="Price: '.$dvd['product_price'].' €" href="'.$base_url.'/products/describe_product/Book/'.$dvd['product_id'].'/">'.$dvd['product_name'].'</a>';
		 echo '<div style="padding-top:10px; text-align:justify;">'.$descp.'</div>';
		 $dvd_name = urlencode($dvd['product_name']);
		 echo '<div style="padding-top:10px;padding-bottom:10px; text-align:justify;"><a class="cart-dvd" href="'.$base_url.'/welcome/add_to_cart/'.$dvd['product_id'].'/'.$dvd['product_price'].'/'.$dvd_name.'/'.$dvd['type_name'].'/">Add to cart</a></div></td>';
		 echo '<td width="20"> </td>';
		 if($rowCnt % 2 == 0 && $rowCnt != 4) echo '</tr><tr height="150">';
		 elseif($rowCnt % 2 == 0 && $rowCnt == 4) echo '</tr>'; 
		}
		echo '</tr>';
      ?>
      </tbody>
     </table>
    </td>
    </tr>
   </tbody>
   </table>
		
 <p>&nbsp;</p>
 <div class="clear">&nbsp;</div>
</div>

<!****************************************************************************************>	
	
	
	
<?php
	
	$this->load->view('footer');
	
/* End of file welcome_main_v.php */
/* Location: ./application/views/welcome_main_v.php */
