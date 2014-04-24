	<html>
		<head>
			<style type="text/css">
    /* show the move cursor as the user moves the mouse over the panel header.*/
    #draggablePanelList .panel-heading {
        cursor: move;
    }
</style>
		</head>
		<body>
			<!-- Bootstrap 3 panel list. -->
			<ul id="draggablePanelList" class="list-unstyled">
			    <li class="panel panel-info">
			        <div class="panel-heading">You can drag this panel.</div>
			        <div class="panel-body">Content ...</div>
			    </li>
			    <li class="panel panel-info">
			        <div class="panel-heading">You can drag this panel too.</div>
			        <div class="panel-body">Content ...</div>
			    </li>
			</ul>
			
			
			<!-- Assumes that JQuery is already included somewhere. Size: 22kb or 13kb minified. -->
			    <script src="jquery/jquery-1.11.0.min.js"></script>
				<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
			
			<script type="text/javascript">
			    jQuery(function($) {
			        var panelList = $('#draggablePanelList');
			
			        panelList.sortable({
			            // Only make the .panel-heading child elements support dragging.
			            // Omit this to make the entire <li>...</li> draggable.
			            handle: '.panel-heading', 
			            update: function() {
			                $('.panel', panelList).each(function(index, elem) {
			                     var $listItem = $(elem),
			                         newIndex = $listItem.index();
			
			                     // Persist the new indices.
			                });
			            }
			        });
			    });
			</script>
		</body>
	</html>