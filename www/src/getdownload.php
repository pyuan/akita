<!DOCTYPE html>
<html>
<head>
<?php require("head.php"); ?>

<script type="text/javascript">
	
	$(function() {
		
		//get the file
		var file = window.location.hash.replace("#", "");
		window.location = "downloads/" + file;
		
		//close window after a pause to allow download to start
		setTimeout(function(){
			window.close();
		}, 500);
		
	});	
	
</script>

</head>
<body>
</body>
</html> 	