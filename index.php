<?php 
	
	include ('connect.php');
	
	//$menu_id = $_GET['menu_id'];
	$menu_id = 1;
	
	$sql = "
	SELECT 
	categories.cat_id,categories.cat_categ,categories.cat_desc,group_concat(items.item_item) as items,group_concat(items.item_price)as prices,group_concat(items.item_desc)as descriptions,group_concat(items.item_id) as item_ids
	FROM items items LEFT JOIN categories categories ON items.item_cat = categories.cat_id 
	WHERE categories.menu_id = 1
	group by categories.cat_id";
	$result = mysqli_query($con,$sql);		
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>MenuSystems</title>
    
    <!-- custom CSS  -->
    <link href="css/menusystems.css" rel="stylesheet">
    <link href="jquery-ui/application.css" rel="stylesheet">
    
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
    <link href="bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    
    <!-- X-editable CSS -->
    <link href="x-editable/css/bootstrap-editable.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
  </head>

  <body>
  	
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Bizazz MenuSystems</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">
            <li class="active"><a href="#">Generate a New Menu</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu Actions<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Generate a New Menu</a></li>
                <li><a href="#">Delete This Menu</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Jump To Category<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Category</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Menu Name</h1>
	</div>	
	
	<!-- begin menu -->
	<ul id="unique-ul">
		<?php while($row = mysqli_fetch_array($result)) { ?>
		<li id="<?php echo $row['cat_id']; ?>" class="row clearfix cursor-sort">
			<div>
				<h3><?php echo $row['cat_categ']; ?></h3>
					<h5><?php echo $row['cat_desc']; ?></h5>
			</div>
					<div class="formWrap">
						<form action="insert_item.php" id="add_item<?php echo $row['cat_id']; ?>" >
							<input type="hidden" name="item_menu" id="item_menu<?php echo $row['cat_id']; ?>" value="<?php echo $menu_id; ?>">
							<input type="hidden" name="item_cat" id="item_cat<?php echo $row['cat_id']; ?>" value="<?php echo $row['cat_id']; ?>">
							<input type="hidden" name="item_item" id="item_item<?php echo $row['cat_id']; ?>" value="New Item">
							<input type="hidden" name="item_price" id="item_price<?php echo $row['cat_id']; ?>" value="Empty Price">
							<input type="hidden" name="item_desc" id="item_desc<?php echo $row['cat_id']; ?>" value="New Description">
							<input type="hidden" name="position" id="position<?php echo $row['cat_id']; ?>" value="1">
							<input type="submit" id="FormSubmit<?php echo $row['cat_id']; ?>" value="Add Item" class="btn btn-primary btn-xs">
						</form>
						<script>
							// Attach a submit handler to the form
							$( "add_item<?php echo $row['cat_id']; ?>" ).submit(function( event ) {
							 
							  // Stop form from submitting normally
							  event.preventDefault();
							 
							  // Get some values from elements on the page:
							  var $form = $( this ),
							    term = $form.find( "input[name='s']" ).val(),
							    url = $form.attr( "action" );
							 
							  // Send the data using post
							  var posting = $.post( url, { s: term } );
							 
							  // Put the results in a div
							  posting.done(function( data ) {
							    var content = $( data ).find( ".list-group-item" );
							    $( "#result" ).empty().append( content );
							  });
							});
						</script>
					</div>
					<ul id="<?php echo $row['cat_id']; ?>">
						<?php
						$items = explode(",", $row['items']);
						$prices = explode(",", $row['prices']);
						$descriptions = explode(",", $row['descriptions']);
						$item_ids = explode(",", $row['item_ids']);
						foreach ($items as $key => $item) {
						$item_id = $item_ids[$key];	
						$price = $prices[$key];
						$description = $descriptions[$key];
						?>
						<li id="<?php echo $item_id; ?>" class="list-group-item col-sm-6 col-xs-12 cursor-sort pull-left">
							<div id="<?php echo $row['cat_id']; ?>" class="col-xs-6">
								<h4><?php echo $item; ?></h4>
							</div>
							<div class="col-xs-6 text-right nowrap"><?php echo $price; ?></div>
							<div class="col-xs-12"><?php echo $description; ?></div>
						</li>
						<div id="result"></div>
		<?php }
			} ?>
	</ul>
	<!--end  menu-->
	
	
	

	<!-- container end
    ================================================== -->
    </div>
      
    <div id="footer">
      <div class="container">
        <p class="text-muted">© MenuSystems by Bizazz 2014</p>
      </div>
    </div>

    <!-- Core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery/jquery-1.11.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src='jquery-ui/js/jquery-ui-1.10.4.min.js'></script>
    <script src='jquery-form/jquery.form.min.js'></script>
    
    <!-- Sortable Items -->
    <script>
	$(function(){
    $('#unique-ul').sortable({
    	items:'li',
    	cursor: "move",
    	toleranceElement: '> div'
    	});
    $( "#unique-ul" ).sortable({ cursorAt: { left: 5 } });
    $( "#unique-ul" ).sortable({ opacity: 1 });
    $( "#unique-ul" ).sortable({ revert: true });
    $( "#unique-ul" ).sortable({ scroll: true });
    $( "#unique-ul" ).sortable({ tolerance: "pointer" });
    $( "#unique-ul" ).sortable({ helper: "clone" });
    $( "#unique-ul" ).sortable({ forcePlaceholderSize: true });
	});
	</script>
	
	
  </body>
</html>
