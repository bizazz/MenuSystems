<html>
<head>
	<script src="jquery/jquery-1.11.0.min.js"></script>
	<script src='jquery-form/jquery.form.min.js'></script>
</head>
<body>
	<form id="htmlForm" action="html-echo.php" method="post"> 
    Message: <input type="text" name="message" value="Hello HTML" /> 
    <input type="submit" value="Echo as HTML" /> 
</form>
<script>
	// prepare the form when the DOM is ready 
$(document).ready(function() { 
    // bind form using ajaxForm 
    $('#htmlForm').ajaxForm({ 
        // target identifies the element(s) to update with the server response 
        target: '#htmlExampleTarget', 
 
        // success identifies the function to invoke when the server response 
        // has been received; here we apply a fade-in effect to the new content 
        success: function() { 
            $('#htmlExampleTarget').fadeIn('slow'); 
        } 
    }); 
});
</script>
</body>
</html>