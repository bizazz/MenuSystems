<?php
$menu_id = 1;
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
    
    <!-- custom CSS -->
    <link href="css/menusystems.css" rel="stylesheet">
    <link href="jquery-sortable/application.css" rel="stylesheet">
    
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

  <body class="">
  	
  	<input type="hidden" id="menu_id" value="<?php echo $menu_id; ?> "/>

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
	
	<!--begin menu-->
	<div id="menu">
		<ol class="default vertical">
			
		</ol>
	</div>
	<!--end  menu-->
	
	
	

	<!-- container end
    ================================================== -->
      </div>
      
    <div id="footer">
      <div class="container">
        <p class="text-muted">© MenuSystems by Bizazz 2014</p>
      </div>
    </div>
    <input type="hidden" id="menu_id" value="<?php echo $menu_id; ?> "/>


    <!-- Core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery/jquery-1.11.0.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src='jquery-sortable/Sortable_files/application.js'></script>
    
    
    <!-- Sortable Items -->
    <script>
		var adjustment

		$("ol.vertical").sortable({
		  group: 'vertical',
		  // animation on drop
		  onDrop: function  (item, targetContainer, _super) {
		    var clonedItem = $('<li/>').css({height: 0})
		    item.before(clonedItem)
		    clonedItem.animate({'height': item.height()})
		    
		    item.animate(clonedItem.position(), function  () {
		      clonedItem.detach()
		      _super(item)
		    })
		  },
		
		  // set item relative to cursor position
		  onDragStart: function ($item, container, _super) {
		    var offset = $item.offset(),
		    pointer = container.rootGroup.pointer
		
		    adjustment = {
		      left: pointer.left - offset.left,
		      top: pointer.top - offset.top
		    }
		
		    _super($item, container)
		  },
		  onDrag: function ($item, position) {
		    $item.css({
		      left: position.left - adjustment.left,
		      top: position.top - adjustment.top
		    })
		  }
		})
		
		  
	</script>
    
    <!-- Load Item Data-->
	<script type="text/javascript">
	$(document).ready(function() {
    	$('.default').load("query_items.php", 
		    {
		        'menu_id_item': '<?php echo $menu_id; ?>'
		    } 
		);

    });
	</script>


			
		
  </body>
</html>
