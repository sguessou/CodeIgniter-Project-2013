<?php

	$this->load->view('header');
?>
<!****************************************************************************************/>

<div id="menu"> 
		<ul>     
			<li><a class="current" href="index.php?controller=index">Main</a></li>
			<li><a href="index.php?controller=books&flag=begin">Books</a></li>
			<li><a href="index.php?controller=dvd&flag=begin">Movies</a></li>
			
		</ul>
	</div>
	
	<div id="feature">	
		<div class="left">		
		
			<h2 class="cart" id="viewCart">Cart</h2>
			

			<!--div class="arrow-up2"></div-->
		
				
			<!--h2 style="font-size:120%;font-weight:bold;color:#3f4c6b;clear:both;border-bottom: 1px solid #999;margin: 0 auto 1em auto;padding: 0 0 1em 30px;">Your Shopping Cart:</h2-->
			
			
			
				
				
		  
	</div>
	
	<div class="right">
			<h2>NOTICE!</h2>
			<p>Log in as <u class="click">saruman</u> with the password: <u class="click">return0</u>, to experiment with the user CMS!</p>	
		</div>	
	  
<div class="clear">&nbsp;</div>

</div>

<div id="main">	
     
   
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
      	foreach ( $products as $product ) 
      	{ 
      	 $rowCount++;
		 $coverSrc = $base_url."/images/products_images/" . $product['product_id'] . ".jpg";
		 $description = implode(' ', array_slice(explode(' ', $product['product_description']), 0, 40));
		 $description .= '...'; 
		 
		 echo '<td width="120">';
		 echo '<a title="Price: '.$product['product_price'].' €" href="'.$base_url.'/index.php?controller=books&action=showproduct&pid='.$product['product_id'].'&flag=begin">';
		 echo '<img class="border" width="100" alt="Price: '.$product['product_price'].' €" src="'.$coverSrc.'"></a></td>';
		 echo '<td width="370" style="border-bottom:1px dashed green;">';
		 echo '<a title="Price: '.$product['product_price'].' €" href="'.$base_url.'/index.php?controller=books&action=showproduct&pid='.$product['product_id'].'&flag=begin">'.$product['product_name'].'</a>';
		 echo '<div style="padding-top:10px; text-align:justify;">'.htmlentities($description).'</div>';
		 echo '<div style="padding-top:10px;padding-bottom:10px; text-align:justify;"><a class="cart-dvd" href="index.php?controller=cart&action=addcart&pid='.htmlspecialchars( $product['product_id']).'&front=front">Add to cart</a></div></td>';
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
		
 <p>&nbsp;</p>
 <div class="clear">&nbsp;</div>
</div>

<!****************************************************************************************>	
	
	
	
<?php
	
	$this->load->view('footer');
	
?>
