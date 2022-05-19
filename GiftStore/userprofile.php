<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" type="text/css" href="styleuserprofile.css">
</head>


<body>	


<?php 
session_start();
include('header.php');
include('connection.php');
include('logologout.php');
//include('navbar.php');
include('userloginvalidation.php');
//print_r(verifyuser());
if(verifyuser())
{
	$email=$_SESSION['susername'];
	$q="SELECT * FROM `users` WHERE `EMAIL_ID`='$email'";
	$qf = mysqli_query($conn, $q);
	
	$data = mysqli_fetch_assoc($qf);
	$uid=$data['USER_ID'];
	$username=$data['EMAIL_ID'];
	$name=$data['NAME'];
	$phonenumber=$data['PHONE_NUMBER'];
	//print_r($uid);
	//print_r($username);
	//print_r($name);
	//print_r($phonenumber);
	//sdie;
	//echo $name;
	//die;
}
?>
<div  class='name'>
<?php
echo "<br>&nbsp;<a href='userprofile.php'> Welcome, ".$name,":)</a>";
echo "<br><br><br><b>Your Profile</b>";
?>
</div>
<br>
<br>
<table class="table">


<tr>
<th>EMAIL_ID</th>
<td><?php echo $username; ?></td>
</tr>
<tr>
<th>NAME</th>
<td><?php echo $name; ?></td>
</tr>
<tr>
<th>PHONE_NUMBER</th>
<td><?php echo $phonenumber; ?></td>
</tr>
<tr>

</table>
<button class="button" type="submit" class="btn" name="edit_user">
<a href="usereditprofile.php">Edit</a>
</button>
<button class="bttn" type="submit" class="btn" name="change_pwd">
<a href="userchangepassword.php">Change Password</a>
</button>


</body>
</html>