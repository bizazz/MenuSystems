<?php

	include ('connect.php');
	
	$item_menu = $_GET['item_menu'];
	$item_cat = $_GET['item_cat'];
	$item_item = $_GET['item_item'];
	$item_price = $_GET['item_price'];
	$item_desc = $_GET['item_desc'];
	$position = $_GET['position'];
	
	mysqli_query($con,"INSERT INTO items (item_menu, item_cat, item_item, item_price, item_desc, position, visible)
	VALUES ('$item_menu','$item_cat', '$item_item', '$item_price', '$item_desc', '$position', 1)");
	
	$item_id = mysqli_insert_id($con); //Get ID of last inserted row from MySQL
	
	$result = mysqli_query($con,"SELECT * FROM items WHERE item_id = '$item_id' LIMIT 1");
	
	while($row = mysqli_fetch_array($result)) { 
	echo "<li id='" . $row['item_id'] . "' " . "class='list-group-item col-sm-6 col-xs-12 cursor-sort pull-left'><div id='" . $row['item_cat'] . "' " . " class='col-xs-6'>" . "<h4>" .  $row['item_item'] . "</h4>" . "</div>";
	echo "<div class='col-xs-6 text-right nowrap'>" . $row['item_price'] . "</div>";
	echo "<div class='col-xs-12'>" . $row['item_desc'] . "</div>";
	echo "</li>"; 
	}
	mysqli_close($con);
	
?>