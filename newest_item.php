<?php
	include ('connect.php');
	//$menu_id = $_GET['menu_id'];
	$menu_id = 1;
	
	$result = mysqli_query($con,"SELECT MAX(item_id) AS max_id,item_item,item_price,item_desc,item_menu,item_cat,position,visible FROM items");
	
	while($row = mysqli_fetch_array($result)) {
	    echo "<li id='" . $row['max_id'] . "' " . "class='list-group-item col-sm-6 col-xs-12 cursor-sort pull-left'><div id='" . $row['item_cat'] . "' " . " class='col-xs-6'>" . "<h4>" .  $row ['item_item'] . "</h4>" . "</div>";
		echo "<div class='col-xs-6 text-right nowrap'>" . $row['item_price'] . "</div>";
		echo "<div class='col-xs-12'>" . $row['item_desc'] . "</div>";
		echo "</li>"; 
	}

	mysqli_close($con);
?>