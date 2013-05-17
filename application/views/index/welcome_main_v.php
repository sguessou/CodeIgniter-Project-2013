<?php

	$this->load->view('header');
?>
<!****************************************************************************************/>

<div id="menu"> 
		<ul>     
			<li><a class="current" href="<?php echo $base_url; ?>/welcome/">Main</a></li>
			<li><a href="<?php echo $base_url; ?>/books/index/begin/">Books</a></li>
			<li><a href="">Movies</a></li>
			<li><a href="">Login</a></li>
			
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
			<p>The project was started on: 01-05-2013,I have started working on the main sections(books, movies), will try
			to get the cart working at some point, then on to the admin and user CMS.</p>	
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
      	foreach ( $books as $book ) 
      	{ 
      	 $rowCount++;
		 $coverSrc = $base_url."/images/products_images/" . $book['product_id'] . ".jpg";
		 $description = implode(' ', array_slice(explode(' ', $book['product_description']), 0, 40));
		 $description .= '...'; 
		 
		 echo '<td width="120">';
		 echo '<a title="Price: '.$book['product_price'].' €" href="'.$base_url.'/index.php?controller=books&action=showproduct&pid='.$book['product_id'].'&flag=begin">';
		 echo '<img class="border" width="100" alt="Price: '.$book['product_price'].' €" src="'.$coverSrc.'"></a></td>';
		 echo '<td width="370" style="border-bottom:1px dashed green;">';
		 echo '<a title="Price: '.$book['product_price'].' €" href="'.$base_url.'/index.php?controller=books&action=showproduct&pid='.$book['product_id'].'&flag=begin">'.$book['product_name'].'</a>';
		 echo '<div style="padding-top:10px; text-align:justify;">'.htmlentities($description).'</div>';
		 echo '<div style="padding-top:10px;padding-bottom:10px; text-align:justify;"><a class="cart-dvd" href="index.php?controller=cart&action=addcart&pid='.htmlspecialchars( $book['product_id']).'&front=front">Add to cart</a></div></td>';
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
		 echo '<a title="Price: '.$dvd['product_price'].' €" href="'.$base_url.'/index.php?controller=dvd&action=showDvd&pid='.$dvd['product_id'].'&flag=begin">';
		 echo '<img class="border" width="100" alt="Price: '.$dvd['product_price'].' €" src="'.$cvrSrc.'"></a></td>';
		 echo '<td width="370" style="border-bottom:1px dashed green;">';
		 echo '<a title="Price: '.$dvd['product_price'].' €" href="'.$base_url.'/index.php?controller=dvd&action=showDvd&pid='.$dvd['product_id'].'&flag=begin">'.$dvd['product_name'].'</a>';
		 echo '<div style="padding-top:10px; text-align:justify;">'.$descp.'</div>';
		 echo '<div style="padding-top:10px;padding-bottom:10px; text-align:justify;"><a class="cart-dvd" href="index.php?controller=cart&action=addcart&pid='.htmlspecialchars($dvd['product_id']).'&front=front">Add to cart</a></div></td>';
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
