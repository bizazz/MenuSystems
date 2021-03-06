<?php 
	
	include ('connect.php');
	
	//$menu_id = $_GET['menu_id'];
	$menu_id = 1;
	
	$sql = "SELECT 
	categories.cat_id,categories.cat_categ,categories.cat_desc,group_concat(items.item_item) as items,group_concat(items.item_price)as prices,group_concat(items.item_desc)as descriptions,group_concat(items.item_id) as item_ids
	FROM items items LEFT JOIN categories categories ON items.item_cat = categories.cat_id 
	WHERE categories.menu_id = 1
	group by categories.cat_id";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)) {
		?>
		<script>
		//insert_item
			$(document).ready(function() {
			  var form = $('#itemForm<?php echo $row['cat_id']; ?>'); // contact form
			  var submit = $('#itemFormSub<?php echo $row['cat_id']; ?>');   // submit button
			  var alert = $('#alert<?php echo $row['cat_id']; ?>'); // alert div for show alert message
			
			  // form submit event
			  form.on('submit', function(e) {
			    e.preventDefault(); // prevent default form submit
			
			    $.ajax({
			      url: 'insert_item.php?item_menu=<?php echo $menu_id ; ?>', // form action url
			      type: 'POST', // form submit method get/post
			      dataType: 'html', // request type html/json/xml
			      data: form.serialize(), // serialize form data 
			      beforeSend: function() {
			        //alert.fadeOut();
			        //submit.html('Sending....'); // change submit button text
			      },
			      success: function(data) {
			      	$( "#unique-ul" ).load( "query_menu.php?menu_id=<?php echo $menu_id; ?>" );
			        //alert.html(data).fadeIn(); // fade in response data
			       // form.trigger('reset'); // reset form
			        submit.html('Send Email'); // reset submit button text
			      },
			      error: function(e) {
			        console.log(e)
			      }
			    });
			  });
			});
		</script>

		
		
		<?php
		echo "<li id='" . $row['cat_id'] . "'" . "class='row clearfix cursor-sort'><div><h3>" . $row['cat_categ'] . "</h3>
		<h5>" . $row['cat_desc'] . "</h5>";
			//add item form
			echo "<div class='formWrap'><form class='itemForm' id='itemForm" . $row['cat_id'] . "'" . "action='" . "method='POST'>"; //insert_item.php?item_menu=" . $menu_id . "
		    echo "<input type='hidden' name='item_menu' value='" . $menu_id . "' /> ";
		    echo "<input type='hidden' name='item_cat' value='" . $row['cat_id'] . "' /> ";
			echo "<input type='hidden' name='item_item' value='Item' /> ";
			echo "<input type='hidden' name='item_price' value='Price' /> ";
			echo "<input type='hidden' name='item_desc' value='Description' /> ";
			echo "<input type='hidden' name='position' value='1' /> ";
		    echo "<input type='submit' id='itemFormSub" . $row['cat_id'] . "' value='Add Item' class='btn btn-primary btn-xs'/>";
		    echo "</form></div>";
				echo "<ul id='" . $row['cat_id'] . "' " . " >";
				$items = explode(",", $row['items']);
				$prices = explode(",", $row['prices']);
				$descriptions = explode(",", $row['descriptions']);
				$item_ids = explode(",", $row['item_ids']);
				foreach ($items as $key => $item) {
				$item_id = $item_ids[$key];	
				echo "<li id='" . $item_id . "' " . "class='list-group-item col-sm-6 col-xs-12 cursor-sort pull-left'><div id='" . $row['cat_id'] . "' " . " class='col-xs-6'>" . "<h4>" .  $item . "</h4>" . "</div>";
				$price = $prices[$key];
				$description = $descriptions[$key];
				
				echo "<div class='col-xs-6 text-right nowrap'>" . $price . "</div>";
				echo "<div class='col-xs-12'>" . $description . "</div>";
				echo "</li>"; 
				}
		echo "</ul>";
	}
?>