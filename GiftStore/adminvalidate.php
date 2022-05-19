<?php 
include('connection.php');
session_start();
function verifyadmin()
{
	global $conn;
	$au = "";
	$ap = "";
	
	if(isset($_SESSION['sadminusername']) && isset($_SESSION['sadminpassword'])) 
	{
		$au = $_SESSION['sadminusername'];
		$ap = $_SESSION['sadminpassword'];
	}
//print_r($au);
	$q = "SELECT * FROM admin WHERE ADMIN_EMAIL='$au' and PASSWORD='$ap'";
	//print_r($q);
	
	$qf = mysqli_query($conn, $q);
	//print_r($qf);
	$c=0;
	//print_r($c);
    $c = mysqli_num_rows($qf);
	//echo $c;
    if($c == 1)
	{
		return true;
	}
	else
	{
		return false;
	}
}

if(verifyadmin())
{
	$email=$_SESSION['sadminusername'];
	$q="SELECT `ADMIN_NAME` FROM `admin` WHERE `ADMIN_EMAIL`='$email'";
	$qf = mysqli_query($conn, $q);
	$data = mysqli_fetch_assoc($qf);
	$name=$data['ADMIN_NAME'];
}
else
{
	header('location: adminlogin.php');
}
?>