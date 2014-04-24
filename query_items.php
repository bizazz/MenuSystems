	<?php
	
	include ('connect.php');
	
	$last_category = "";
	
	$menu_id_item = $_POST['menu_id_item'];
	
	//ORDER BY categories.position,items.position
	$sql = "SELECT * FROM categories,items WHERE categories.cat_id=items.item_cat AND categories.menu_id = '$menu_id_item' AND items.item_menu = '$menu_id_item' ORDER BY categories.cat_categ,items.item_item";
	$result = mysqli_query($con,$sql);

	$category = '';

	// open list of topics
	//echo "<ol class='default vertical'>";
	
	// loop through topics
	while($row = mysqli_fetch_array($result)) {
	    if (!$row['item_cat']) {
	        // fake topic name for unsorted stuff
	        $row['cat_categ'] = 'Sort Me';
	    }
	    if ($category != $row['cat_categ']) {
	        if($category != ''){
	            // had a category, means we opened a list
	            // that hasn't been closed, close it.
	            echo "</div>";
	        }
	        // print this category and open the list of items
	        echo "<div class='row grid span8'>" . $row['cat_categ'] . '<div>'; //'</div><div>';
	        // update the current category to be this cat_categ
	        $category = $row['cat_categ']; 
	    }
	    // the items
	    echo "<div class='well span2 tile'>" . $row['item_item'] . "</div>";
	}
	if($category != ''){
	    // we saw at least one cat_categ, we need to close
	    // the last open list.
	    echo "</div>";
	}
	// end category list
	//echo "</div>";
		
	// Free result set
	mysqli_free_result($result);
	
	mysqli_close($con);
	
	?>