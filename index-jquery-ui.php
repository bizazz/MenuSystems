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
	});
	</script>
    
    <!-- Load url parameter and menu Data-->
	<script type="text/javascript">
		$(document).ready(function() {
			function getUrlParameter(sParam)
		{
		    var sPageURL = window.location.search.substring(1);
		    var sURLVariables = sPageURL.split('&');
		    for (var i = 0; i < sURLVariables.length; i++) 
		    {
		        var sParameterName = sURLVariables[i].split('=');
		        if (sParameterName[0] == sParam) 
		        {
		            return sParameterName[1];
		        }
		    }
		}
			var menu_id = getUrlParameter('menu_id');
			
	    	$('#unique-ul').load("query_menu.php?menu_id=" + menu_id, 
			    {
			    } 
			);
	    });
		</script>
		
		<script>
		    $('input[type="submit"]').one('click', function() {
			     $('#unique-ul').load("query_menu.php?menu_id=" + menu_id)
			});
		</script>	
		
  </body>
</html>
