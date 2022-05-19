
<?php
	session_start();
	$_SESSION['sadminusername'] = "";
	$_SESSION['sadminpassword'] = "";
	session_destroy();
    header("location:adminlogin.php");
?>