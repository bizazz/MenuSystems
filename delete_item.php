<?php

	include ('connect.php');
	
	$item_id = $_POST['item_id'];
	$visible = 0;
	mysqli_query($con,"UPDATE items SET item_id = '$item_id', visible = '$visible'");
	
	if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
}
	mysqli_close($con);
	
?>