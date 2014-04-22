	<?php
	
	include ('connect.php');
	
	
	$menu_id_item = $_POST['menu_id_item'];
	
	$sql = "SELECT * FROM categories,items WHERE categories.cat_id=items.item_cat AND categories.menu_id = '$menu_id_item' AND items.item_menu = '$menu_id_item' ORDER BY categories.position,items.position";
	$result = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($result)) {
	  
	  echo "<li>" . $row['item_item'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	  echo $row['item_price'] . "<br />";
	  echo $row['item_desc'] . "</li>";
	
	}
	
	
	
	// Free result set
	mysqli_free_result($result);
	
	mysqli_close($con);
	
	?>