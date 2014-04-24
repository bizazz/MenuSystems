	<?php
	
	include ('connect.php');
	
	$lastTFM_nest = "";
	
	$menu_id_item = $_POST['menu_id_item'];
	
	$sql = "SELECT * FROM categories,items WHERE categories.cat_id=items.item_cat AND categories.menu_id = '$menu_id_item' AND items.item_menu = '$menu_id_item' ORDER BY categories.position,items.position";
	$item_result = mysqli_query($con,$sql);
	
	while($item_row = mysqli_fetch_array($item_result)) {
	    	
	    $TFM_nest = $item_row['cat_categ'];
		if ($lastTFM_nest != $TFM_nest) { 
		$lastTFM_nest = $TFM_nest;
	    echo "<li class='" . $item_row['cat_categ'] . "'>" . $item_row ['cat_categ'] . "<ol>";
		}
	
		echo "<li class='" . $item_row['item_item'] . "'>" . $item_row ['item_item'] . "</li>";
	    
	
	}

	// Free result set
	mysqli_free_result($item_result);
	
	mysqli_close($con);
	
	?>