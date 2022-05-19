<?php 
include('connection.php');

session_start();
//include('categorydisplay.php');
include('userloginvalidation.php');
if(verifyuser())
{
	$email=$_SESSION['susername'];
	$q="SELECT `USER_ID`,`NAME` FROM `users` WHERE `EMAIL_ID`='$email'";
	$qf = mysqli_query($conn, $q);
	$data = mysqli_fetch_assoc($qf);
	$name=$data['NAME'];
	$uid=$data['USER_ID'];
	include('logologout.php');
	//echo $name;
	$_SESSION['sname'] = $name;
	$_SESSION['sid'] = $uid;
	//print_r($_SESSION['sname']);
	//die;
	include('navbar.php');
	include('carousal.php');
}
else
{
	$name="";
	include('logologin.php');
	include('navbar.php');
	include('carousal.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>

<body>	
<div class="DisplayName" style="text-align:center; color:red; margin-top:650px; font-size:2rem; text-decoration:underline 2px wavy black; font-family:'Satisfy', cursive;"> 
	<?php echo "Hello, ".$name ?>
	</div>
	
	<?php
			include('categorydisplay.php');
			include('footer.php');
	?>
	
</body>
</html>
