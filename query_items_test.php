	<?php
	
	include ('connect.php');
	
	$lastTFM_nest = "";
	
	$menu_id_item = 1;

	$sql2 = "SELECT cat_id FROM categories WHERE menu_id = '$menu_id_item'";
	$catid_result = mysqli_query($con,$sql2);
	
	$sql = "SELECT * FROM categories,items WHERE categories.cat_id=items.item_cat AND categories.menu_id = '$menu_id_item' AND items.item_menu = '$menu_id_item' ORDER BY categories.position,items.position";
	$item_result = mysqli_query($con,$sql);
	
	while ($item_result['cat_categ'] = $item_result['cat_categ']) {
    echo $item_result['itm_item'];
}

	// Free result set
	mysqli_free_result($item_result);
	
	mysqli_close($con);
	
	?>