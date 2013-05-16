<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.5 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Project for Arcada php course 2012-2013 : online store" />
	<meta name="keywords" content="Books, dvd's" />
	<meta name="author" content="sguessou" />
	<link rel="stylesheet" type="text/css" href="<?php echo $base_url.'/'.$css; ?>" title="Variant Multi" media="all" />
	<script src="_js/jquery-1.9.1.min.js"></script>
	<title>Online Store</title>
	<script>
		$(document).ready(function(){
			$('#cartLink').click(function(){
				$('#cartSlider').slideToggle(300);
				return false;
			});//end click
			$('#close').click(function(){
				$('#cartSlider').slideToggle(300);
				return false;
			});// end #close
		});//end ready
	</script>
	<script type="text/javascript">
			// using some javascript to make the user experience a bit better
			// this script simply automatically submits the filter form whenever the
			// user changes a selection.			
			window.onload = function(){
				// fetch references to each form element
				var PrdTypeSelect = document.getElementById('TypeSelect');
				var form = document.getElementById('PrdTypeForm');
				
				// connect a event listener to the country drop down that listens for when it changes
				// send the form again so that we load specific country information
				PrdTypeSelect.onchange = function(){
					form.submit();
				}
			}
			
		</script>
</head>
<body>
<div id="containerfull"><!-- Use"containerfull" for 100% width. For fixed width, use "container980", "container760" or "container600" (the number is the layout width in pixels). -->
	<div id="header">
	<h1><a href="">Online Store</a></h1>
		<h2>[Porting the online Store from a generic framework to the&nbsp;<a href="http://ellislab.com/"><img src="<?php echo $base_url; ?>/css/images/codeigniterlogo1.png" height="35px" width="120px"/></a>&nbsp;framework!]</h2>
	</div>
