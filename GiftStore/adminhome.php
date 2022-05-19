<?php 
session_start();
include('header.php');
include('connection.php');
include('adminvalidate.php');
//print_r(verifyadmin());

include('adminnav.php');

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	
    <link rel="stylesheet" type="text/css" href="styleadminhome.css">
 </head>


<body>	
<div class="name">
<?php
 echo "Hello ".$name;
?>
</div>

<div class="grid-container">
  <div class="grid-item"><a href="adminbooking.php">Total Bookings</a></div>
  <div class="grid-item"><a href="admincustomers.php">Total Customers</a></div>
  <div class="grid-item"><a href="adminfeedback.php">Total Feebacks</a></div> 
  <div class="grid-item">
  
	<?php
		$count=0;
		$query="SELECT BOOKING_ID FROM booking";
		$queryfire=mysqli_query($conn, $query);
		$count = mysqli_num_rows($queryfire);
		print_r($count);
		//die;
		echo "<br>";
	?>

  </div>
  <div class="grid-item">
  
	<?php
		$count=0;
		$query="SELECT USER_ID FROM users";
		$queryfire=mysqli_query($conn, $query);
		$count = mysqli_num_rows($queryfire);
		print_r($count);
		//die;
		echo "<br>";
	?>
	
</div>
  <div class="grid-item">
  
	<?php
		$count=0;
		$query="SELECT FEEDBACK_ID FROM feedback";
		$queryfire=mysqli_query($conn, $query);
		$count = mysqli_num_rows($queryfire);
		print_r($count);
		//die;
		echo "<br>";
	?>

  </div>  
    
</div>
<?php 
include('footer.php');
?>
</body>
</html>



