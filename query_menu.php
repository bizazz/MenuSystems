<?php 
	
	include ('connect.php');
	
	//$menu_id = $_GET['menu_id'];
	$menu_id = 1;
	
	$sql = "SELECT 
	categories.cat_id,categories.cat_categ,group_concat(items.item_item) as items
	FROM items items LEFT JOIN categories categories ON items.item_cat = categories.cat_id 
	WHERE categories.menu_id = '$menu_id'
	group by categories.cat_id";
	$result = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($result)) {
	  echo "<li class='row clearfix'><h3>" . $row['cat_categ'] . "</h3>";
	  	echo "<ol>";
			$items = explode(",", $row['items']);
			foreach ($items as $key => $value) {
			echo "<li class='list-group-item col-lg-6'>" .  $value . "</li>";	
		}
		echo "</ol>";
	}
?>