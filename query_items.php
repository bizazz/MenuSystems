	<?php
	
	include ('connect.php');
	
	$hide_cat = "";

	$menu_id_item = $_POST['menu_id_item'];
	
	$sql = "SELECT * FROM categories,items WHERE categories.cat_id=items.item_cat AND categories.menu_id = '$menu_id_item' AND items.item_menu = '$menu_id_item' ORDER BY categories.position,items.position";
	$result = mysqli_query($con,$sql);
	
		
	while($row = mysqli_fetch_array($result)) {
	    	
	    $show_cat = $row['cat_categ'];
	    if ($hide_cat != $show_cat) { 
	    $hide_cat = $show_cat;
	    
		echo "<li>" . $row ['cat_categ'] ; 
		} //End of Repeat
		
		echo "<ol>";
		
		echo "<li>" . $row['item_item'] . "</li>"; 
		
		echo "</ol>";

		echo "</li>";
	} 
	
	//<li>Appetizers
		//<ol>
			//<li>Item 2</li>
		//</ol
	//</li>
	
	
	// Free result set
	mysqli_free_result($result);
	
	mysqli_close($con);
	
	?>