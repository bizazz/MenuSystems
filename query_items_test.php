	<?php
	
	include ('connect.php');
	
	$lastTFM_nest = "";
	
	$menu_id_item = 1;
	
	$sql = "SELECT * FROM categories,items WHERE categories.cat_id=items.item_cat AND categories.menu_id = '$menu_id_item' AND items.item_menu = '$menu_id_item' ORDER BY categories.position,items.position";
	$result = mysqli_query($con,$sql);
	
	$num_articles = 0;

		// $dataset will contain array( 'Topic1' => array('News 1', 'News2'), ... )
		$dataset = array();
		while($row = mysql_fetch_array($result)) {
		    if (!$row['item_cat']) {
		        $row['cat_categ'] = 'Sort Me';
		    }
		    $dataset[$row['cat_categ']][] = $row['cat_id'];
		    $num_articles++;
		}
		
		$num_topics = count($dataset);
		
		// naive topics to column allocation
		$topics_per_column = ceil($num_topics / $columns);
		
		$i = 0; // keeps track of number of topics printed
		$c = 1; // keeps track of columns printed
		foreach($dataset as $topic => $items){
		    if($i % $topics_per_columnn == 0){
		        if($i > 0){
		            echo '</ol></div>';
		        }
		        echo '<div class="Columns' . $columns . 'Group' . $c . '"><ol>';
		        $c++;
		    }
		    echo '<li>' . $topic . '</li>';
		    // this lists the articles under this topic
		    echo '<ol>';
		    foreach($items as $article){
		        echo '<li>' . $article . '</li>';
		    }
		    echo '</ol>';
		    $i++;
		}
		if($i > 0){
		    // saw at least one topic, need to close the list.
		    echo '</ol></div>';
		}
			
	// Free result set
	mysqli_free_result($result);
	
	mysqli_close($con);
	
	?>