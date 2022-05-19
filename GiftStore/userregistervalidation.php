<?php include('connection.php') ?>
<!DOCTYPE HTML>
<html>
<body>

<?php
// define variables and set to empty values
$usernameErr = $nameErr = $phonenumberErr = $passwordErr = $confirmpasswordErr = "";
$username = $name = $phonenumber = $password = $confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["username"])) {
    $usernameErr = "E-mail or Username is required";
  } else {
    $username = $_POST["username"];
        if (!validate_email($username)) {
            $usernameErr = "E-mail is not valid";
            }
        else{
            $usernameErr = "";
        }
	}

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
        if (!validate_name($name)) {
            $nameErr = "Name is not valid";
            }
        else{
            $nameErr = "";
        }
  }
  
  if (empty($_POST["phonenumber"])) {
    $phonenumberErr = "Phone Number is required";
  } else {
    $phonenumber = test_input($_POST["phonenumber"]);
    if (!validate_phonenumber($phonenumber)) {
            $phonenumberErr = "Phone Number is of length 10 with no characters and symbols!";
            }
    else{
            $phonenumberErr = "";
        }
  }

if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
} else {
        $password = $_POST["password"];
        if(!validate_password($password)){
                $passwordErr = "Your Password Must Contain At Least 8 Characters, 1 Number, 1 Capital Letter, 1 Lowercase Letter!";
        }
        else{
            $passwordErr = "";
        }
        $passwordEncrypt = MD5($password);
}

if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "Password is required";
  } else {
    $confirmpassword = $_POST["confirmpassword"];
        if(!validate_confirmpassword($password, $confirmpassword)){
            $confirmpasswordErr = "Confirm password does not match";
        }
        else{
            $confirmpasswordErr = "";
        }
  }
//print_r($usernameErr);
//print_r($nameErr);
//print_r($phonenumberErr);
//print_r($passwordErr);
//print_r($confirmpasswordErr);
//die;

if(empty($usernameErr) && empty($nameErr) && empty($phonenumberErr) && empty($passwordErrempty) && empty($confirmpasswordErr)){

			$query = "INSERT INTO `users`(`EMAIL_ID`, `NAME`, `PHONE_NUMBER`, `PASSWORD`)
						VALUES ('$username','$name','$phonenumber','$passwordEncrypt')";
			if ($conn->query($query)) {
				 echo "New record created successfully";
			} else {
				 echo "Error: " . "<br>" . $conn->error;
			}
         }

   //mysqli_query($conn, $query);
  }


function validate_email($email) {
    $str = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
        if(preg_match($str, $email)){
            return True;
           }
        else{
            return False;
            }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function validate_name($name) {
    $str = "/^([a-zA-Z' ]+)$/";
        if(preg_match($str, $name)){
            return True;
            }
        else{
            return False;
            }
}

function validate_phonenumber($phonenumber) {
        if(preg_match('/^[0-9]{10}+$/', $phonenumber)) {
            return True;
            }
        else{
            return False;
            }
}

//password must be 8 char long, 1 special character and one digit
function validate_password($password) {
        if ((strlen($password) >= '8') && (preg_match("#[0-9]+#",$password)) &&
                    (preg_match("#[A-Z]+#",$password)) && (preg_match("#[a-z]+#",$password))){
            return True;
        }
        else{
            return False;
    }
}

//check password and confirm password are same
function validate_confirmpassword($password, $confirm_password){
    if($password == $confirm_password){
        return True;
    }else{
        return False;
    }
}

?>

</body>
</html>
