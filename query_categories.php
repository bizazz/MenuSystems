	<?php
	
	include ('connect.php');

	$hide_cat = "";
	
	$menu_id_cat = $_POST['menu_id_cat'];
	
	$sql = "SELECT * FROM categories,items WHERE categories.cat_id=items.item_cat AND categories.menu_id = '$menu_id_cat' AND items.item_menu = '$menu_id_cat' ORDER BY categories.position,items.position";
	$result = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($result)) {
	  
	  $show_cat = $row['cat_categ'];
	  if ($hide_cat != $show_cat) { 
	  $hide_cat = $show_cat;	
	  echo "<li>" . $row['cat_categ'] . "</li>";
	  } //End of Basic-UltraDev Simulated Nested Repeat
	
	}
	
	
	
	// Free result set
	mysqli_free_result($result);
	
	mysqli_close($con);
	
	?>