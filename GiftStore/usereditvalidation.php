<?php include('connection.php'); ?>
<!DOCTYPE HTML>
<html>
<body>

<?php
$nameErr = $phonenumberErr = "";

if (isset($_POST['edit_user'])) 
{
	
	$username=$_POST['username'];

	if (empty($_POST["name"])) 
	{
		$nameErr = "Name is required";
	} 
	else 
	{
		$name = test_input($_POST["name"]);
        if (!validate_name($name)) 
		{
            $nameErr = "Name is not valid";
        }
        else
		{
            $nameErr = "";
        }
	}
  
  if (empty($_POST["phonenumber"])) 
  {
    $phonenumberErr = "Phone Number is required";
  } else 
  {
    $phonenumber = test_input($_POST["phonenumber"]);
    if (!validate_phonenumber($phonenumber)) 
	{
            $phonenumberErr = "Phone Number is of length 10 with no characters and symbols!";
    }
    else
	{
            $phonenumberErr = "";
        }
  }
  
  if($nameErr == "" && $phonenumberErr = ""){
	  
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
	  
	  
	  
                    /*$query = "UPDATE `users` SET `NAME` = '$name', `PHONE_NUMBER` = '$phonenumber' 
					WHERE `EMAIL_ID` = '$username'";
					//print_r($query);
					//die;
                    if ($conn->query($query) === TRUE) {
                         echo "New record created successfully";
                    } else {
                         echo "Error: " . "<br>" . $conn->error;
                    }
         } else {
                echo "Error: ".$conn->error;
                }
				*/
}  }

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

?>
</body>
</html>
  	 <label class="error"><?php echo $nameErr?></label>
  	   	  <label class="error"><?php echo $phonenumberErr?></label>
