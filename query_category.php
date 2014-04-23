	<?php
	
	include ('connect.php');
	
	$hide_cat = "";
	
	$menu_id_categ = $_POST['menu_id_categ'];
	
	
	$sql = "SELECT * FROM categories,items WHERE categories.cat_id=items.item_cat AND categories.menu_id = '$menu_id_categ' AND items.item_menu = '$menu_id_categ' ORDER BY categories.position,items.position";
	$cat_result = mysqli_query($con,$sql);
	
		
	
	    while($cat_row = mysqli_fetch_array($cat_result)) {
		echo "<li>" . $cat_row ['cat_categ'] ;
	    }
	
	
	// Free result set
	mysqli_free_result($cat_result);
	
	mysqli_close($con);
	
	?>