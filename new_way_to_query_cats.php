<?php 
	
	include ('connect.php');
	$menu_id = $_POST['menu_id'];
	
	$sql = "SELECT 
	categories.cat_id,categories.cat_categ,group_concat(items.item_item) as items
	FROM items items LEFT JOIN categories categories ON items.item_cat = categories.cat_id 
	WHERE categories.menu_id = '$menu_id'
	group by categories.cat_id";
	$result = mysqli_query($con,$sql);
	
	while($row = mysqli_fetch_array($result)) {
	  echo "<ol class='default vertical'>" . $row['cat_categ'];
		$items = explode(",", $row['items']);
		foreach ($items as $key => $value) {
		echo "<li>" .  $value . "</li>";	
		}
		echo "</ol>";
		
	}
?>