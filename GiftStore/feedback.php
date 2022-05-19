<?php
	include('connection.php');
	session_start();
	include('logologout.php');
?>
<!DOCTYPE HTML>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="stylefeedback.css">
 <head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION["susername"];
    $name = $_SESSION['sname'];
	$date=date("Y-m-d");
	$day=date("l");
	$message=$_POST["message"];
	// print_r($date);
	 // print_r($day);
	$query="SELECT `PHONE_NUMBER` FROM users WHERE EMAIL_ID='$username'";
    $queryfire = mysqli_query($conn, $query);
	$data = mysqli_fetch_assoc($queryfire);
	$phone_number=$data['PHONE_NUMBER'];    
	//print_r($queryfire);
	//print_r($phone_number);
    //die;
	$query = "INSERT INTO `feedback`(`NAME`, `PHONE_NUMBER`, `EMAIL_ID`, `DATE`, `DAY`, `MESSAGE`)
						VALUES ('$name','$phone_number','$username','$date','$day','$message')";
			if ($conn->query($query)) {
				 echo '<script> alert("Thankyou For your feedback!!!"); 
						window.location.href="userhome.php";
						</script>';	
			} else {
				 echo '<script> alert("Error: " . "<br>" . $conn->error); </script>';
			}
			
}
?>
<div class="DisplayName"> 
	<?php echo "Hello, ".$_SESSION['sname'];  ?>
</div>
<h2 class="fd">GIVE YOUR FEEDBACK HERE!!!</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class = "form">
   	<label class = "label">Your Message Please!</label>
	<textarea  class = "form" rows=15 cols=100 placeholder="Enter your Feedback" name="message"></textarea>
	</br>
  	<button class="button" type="submit" class="btn" name="feedback">Submit</button></tr></td>	 
</form>
</body>
</html>