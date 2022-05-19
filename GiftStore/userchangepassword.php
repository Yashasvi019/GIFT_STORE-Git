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
echo "&nbsp;<a href='userhome.php'> Welcome, ".$name,":)</a>";
echo "<br><br><b>Enter Your Passwords</b>";
$opassword="";
$npassword="";
$cpassword="";
?>
</div>

<table class="table">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class = "form">
	<tr>
   	 <td>Old Password</td>
  	 <td><input class="input" type="password" name="opassword" required value="<?php echo $opassword; ?>"></td></tr>
  	 </div>
  	 </br>

      <div>
  	  <tr><td>New Password</td>
  	  <td><input class="input" type="password" name="npassword" required value="<?php echo $npassword; ?>"></td></tr>
	 </div>
  	 </br>
	 
	 <div>
  	  <tr><td>Confirm New Password</td>
  	  <td><input class="input" type="password" name="cpassword" required value="<?php echo $cpassword; ?>"></td></tr>
		  </div>
    </br>

</table>

  	 <div align = "center">
  	  <button class="button" type="submit" class="btn" name="change_password">Submit</button>
  	 </div>

</form>

<?php 
if(isset($_POST['change_password']))
{
	
		$opassword=$_POST['opassword'];
		$npassword=$_POST['npassword'];
		$cpassword=$_POST['cpassword'];
		
		if($npassword==$cpassword)
		{
			$encrypt_opassword = MD5($opassword);
			$encrypt_npassword = MD5($npassword);
			
			//print_r("old pass : ". $encrypt_opassword);
			//$query="SELECT PASSWORD FROM `users` WHERE `EMAIL_ID`='$username";
			//$result = mysqli_query($conn, $query);
			//$data = mysqli_fetch_assoc($result);
			
			//print_r($data['PASSWORD']);
			//die;
			
			$query="UPDATE `users` SET `PASSWORD` = '$encrypt_npassword' WHERE `EMAIL_ID`='$username' AND `PASSWORD` = '$encrypt_opassword'";
			mysqli_query($conn, $query);
			if(mysqli_affected_rows($conn) == 1)
			{
				echo '<script>alert("User updated successfully");
				window.location="userlogin.php";
				</script>';
			} 
			else 
			{
				echo '<script>alert("Something went wrong. Try Again! ");
				window.location="userchangepassword.php";
				</script>';
			}
		}
		else
		{
			echo '<script>alert("new and confirm password does not match");
			window.location="userchangepassword.php";
					</script>';
		}
}

?>

</body>
</html>



