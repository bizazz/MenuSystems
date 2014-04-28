<?php

	include ('connect.php');
	
	$item_menu = $_GET['item_menu'];
	$item_cat = $_POST['item_cat'];
	$item_item = $_POST['item_item'];
	$item_price = $_POST['item_price'];
	$item_desc = $_POST['item_desc'];
	$position = $_POST['position'];
	
	mysqli_query($con,"INSERT INTO items (item_menu, item_cat, item_item, item_price, item_desc, position)
	VALUES ('$item_menu','$item_cat', '$item_item', '$item_price', '$item_desc', '$position')");

	
	mysqli_close($con);
	
?>