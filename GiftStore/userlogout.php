
<?php
	session_start();
	$_SESSION['susername'] = "";
	$_SESSION['spassword'] = "";
	session_destroy();
    header("location:userhome.php");
?>