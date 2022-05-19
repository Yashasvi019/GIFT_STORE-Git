<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" type="text/css" href="styleusereditprofile.css">
 </head>


<body>	


<?php 
session_start();
include('header.php');
include('connection.php');
//include('usereditvalidation.php');
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

	include('logologout.php');
	//include('navbar.php');

?>
<div  class='name'>
<?php
echo "&nbsp;<a href='userprofile.php'> Welcome, ".$name,":)</a>";
echo "<br><br><b>Enter Your New Details</b>";
?>
</div>

<table class="table">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class = "form">
	<tr>
   	 <td>E-mail Id</td>
  	 <td><input class="input" type="email" readonly name="username" value="<?php echo $username; ?>"></td></tr>
  	 </div>
  	 </br>

      <div>
  	  <tr><td>Name</td>
  	  <td><input class="input" type="text" name="name" value="<?php echo $name; ?>"></td></tr>
	 </div>
  	 </br>
	 
	 <div>
  	  <tr><td>Phone Number</td>
  	  <td><input class="input" type="text" name="phonenumber" value="<?php echo $phonenumber; ?>"></td></tr>
		  </div>
    </br>

</table>

  	 <div align = "center">
  	  <button class="button" type="submit" class="btn" name="edit_user">Submit</button>
  	 </div>

</form>

<?php 
if(isset($_POST['edit_user']))
{
	$count=0;
		$username=$_POST['username'];
		$name=$_POST['name'];
		$phonenumber=$_POST['phonenumber'];
		
$query="UPDATE `users` SET `NAME` = '$name', `PHONE_NUMBER` = '$phonenumber' 
					WHERE `EMAIL_ID` = '$username'";
if ($conn->query($query) === TRUE) {
  echo '<script>alert("User updated successfully");
window.location="userprofile.php";
	</script>';
} else {
  echo '<script>alert("Something went wrong. Try Again! ");
  window.location="usereditprofile.php";
	</script>';
}
}

?>

</body>
</html>



