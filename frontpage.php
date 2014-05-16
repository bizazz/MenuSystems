<html>
	<head>
		
	</head>
	<body>
		<div class="content_wrapper">
<ul id="responds">
<?php
//include db configuration file
include_once("config.php");

//MySQL query
$Result = mysql_query("SELECT id,content FROM add_delete_record");

//get all records from add_delete_record table
while($row = mysql_fetch_array($Result))
{
echo '<li id="item_'.$row["id"].'">';
echo '<div class="del_wrapper"><a href="#" class="del_button" id="del-'.$row["id"].'">';
echo '<img src="images/icon_del.gif" border="0" />';
echo '</a></div>';
echo $row["content"].'</li>';
}

//close db connection
mysql_close($connecDB);
?>
</ul>
<div class="form_style">
<textarea name="content_txt" id="contentText" cols="45" rows="5"></textarea>
<button id="FormSubmit">Add record</button>
</div>
</div>
	</body>
</html>