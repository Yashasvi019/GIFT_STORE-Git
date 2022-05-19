<?php
	include('connection.php');
	session_start();
	include('logologout.php');
?>
<!DOCTYPE HTML>
<html>
<head>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
	
 <head>
<body>
<div class="DisplayName" style="text-align:center; color:red; text-decoration:none;"> 
	<?php echo "Hello, ".$_SESSION['sname'];  ?>
	</div>
</body>
</html>