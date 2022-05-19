<?php 
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styleadminlogin.css">
</head>
 
 <body>
 
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $count=0;
    $adminusername = $_POST["adminusername"];
    $adminpassword = $_POST["adminpassword"];

	$_SESSION['sadminusername'] = "";
	$_SESSION['sadminpassword'] = "";

    $query="SELECT * FROM admin WHERE ADMIN_EMAIL='$adminusername' AND PASSWORD='$adminpassword'";
    $queryfire = mysqli_query($conn, $query);
    $count = mysqli_num_rows($queryfire);
    if($count == 1){
	$_SESSION['sadminusername'] = $adminusername;
	$_SESSION['sadminpassword'] = $adminpassword;
    header('location: adminhome.php');
    }
    else {
    echo '<script> alert(" Invalid Login Credentials! "); </script>';
    }
}
?>

  <div>
  	<h2>Admin Login</h2>
  </div>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	<div>
  		<label class="label">Username</label>
  		<input class="input" required type="email" placeholder="Enter your username or email" name="adminusername" >
  	</div>
  	</br>

  	<div>
  		<label class="label">Password</label>
  		<input class="input" required type="password" placeholder="Enter your password" name="adminpassword">
  	</div>
  	</br>

  	<div>
  		<button class="button" type="submit" class="btn" name="login_admin">Login</button>
  	</div>

  </form>
  
</body>
</html>