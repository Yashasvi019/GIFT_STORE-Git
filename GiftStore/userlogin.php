<?php 
	include('connection.php'); 
	session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styleuserlogin.css">
<head>

<body>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $count=0;
    $username = $_POST["username"];
    $password = $_POST["password"];

    $passwordEncrypt = MD5($password);
    $query="SELECT * FROM users WHERE EMAIL_ID='$username' AND PASSWORD='$passwordEncrypt'";
    $queryfire = mysqli_query($conn, $query);
    $count = mysqli_num_rows($queryfire);
	print_r($queryfire);
	print_r($count);
    if($count == 1){
	$_SESSION['susername'] = $username;
	$_SESSION['spassword'] = $passwordEncrypt;
	//$_SESSION['sname'] = $name;
print_r($_SESSION['susername']);
	print_r($_SESSION['spassword']);

	echo '<script> alert(" you are a member!"); 
		window.location.href="userhome.php";
	</script>';
    }
    else {
    echo '<script> alert(" Invalid Login Credentials!"); </script>';
    }
}
?>

  <div>
  	<h2>Login</h2>
  </div>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	<div>
  		<label class="label">Username</label>
  		<input class="input" required type="email" placeholder="Enter your username or email" name="username" >
  	</div>
  	</br>

  	<div>
  		<label class="label">Password</label>
  		<input class="input" required type="password" placeholder="Enter your password" name="password">
  	</div>
  	</br>

  	<div>
  		<button class="button" type="submit" class="btn" name="login_user">Login</button>
  	</div>

  	<p class="page">
  		Not yet a member? <a href="userregister.php">Sign up</a>
  	</p>

  </form>
</body>
</html>