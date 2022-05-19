<?php 
session_start();
include('connection.php');

function verifyuser()
{
	global $conn;
	$uu = "";
	$up = "";
//print_r(($_SESSION['susername']));
//print_r(($_SESSION['spassword']));

	if(isset($_SESSION['susername']) && isset($_SESSION['spassword'])) 
	{
		$uu = $_SESSION['susername'];
		$up = $_SESSION['spassword'];
	}
	//print_r($uu);
	
	//$passwordEncrypt = MD5($up);
 //print_r($up);

	$q = "SELECT * FROM `users` WHERE EMAIL_ID='$uu' and PASSWORD='$up'";
	//print_r($q);
	
	$qf = mysqli_query($conn, $q);
//print_r($qf);
	
	$c=0;
	//print_r($c);
    $c = mysqli_num_rows($qf);
	//echo $c;
	
	//die;
    if($c == 1)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}


?>