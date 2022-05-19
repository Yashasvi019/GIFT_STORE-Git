<?php include('connection.php') ?>
<!DOCTYPE HTML>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="styleuserregister.css">


 <head>
<body style="background : #97cfe6;">

<?php include('userregistervalidation.php') ?>
<table>
<h2> REGISTER YOUR ACCOUNT </h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class = "form">
	<tr>
   	 <td> <label class = "label">E-mail Id</label></td>
  	 <td> <input  class = "input" type="email" placeholder="Enter your E-mail Id" name="username" value="<?php echo $username; ?>"></td></tr>
  	  <label class="error"><?php echo $usernameErr; ?></label>
  	 </div>
  	 </br>

      <div>
  	  <tr><td><label class="label">Name</label></td>
  	  <td><input class = "input" type="text" placeholder="Enter your Name" name="name" value="<?php echo $name; ?>"></td></tr>
  	  <label class="error"><?php echo $nameErr?></label>
  	 </div>
  	 </br>
	 
	 <div>
  	  <tr><td><label class="label">Phone Number</label></td>
  	  <td><input class = "input" type="text" placeholder="Enter your Phone Number" name="phonenumber" value="<?php echo $phonenumber; ?>"></td></tr>
  	  <label class="error"><?php echo $phonenumberErr?></label>
  	 </div>
    </br>
	 
  	 <div>
  	  <tr><td><label class="label">Password</label></td>
  	  <td><input class = "input" type="password" placeholder="Enter your Password" name="password"></td></tr>
  	  <label class="error"><?php echo $passwordErr; ?></label>
  	 </div>
  	</br>

  	 <div>
  	  <tr><td><label class="label">Confirm password</label></td>
  	 <td> <input class = "input" type="password" placeholder="Enter your Confirm password" name="confirmpassword"></td></tr>
  	  <label class="error"><?php echo $confirmpasswordErr; ?></label>
  	 </div>
  	</br>

</div>
</div>
  	 <div align = "center">
  	  <tr><td><button class="button" type="submit" class="btn" name="register_user">Register</button></tr></td>
  	 </div>

  	<tr><td><p class="page">
  		Already a member? <a href="userlogin.php">Sign in</a>
  	</p></td></tr>
	</table>
</form>

</body>
</html>
