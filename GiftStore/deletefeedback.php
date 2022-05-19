<?php 
include('connection.php');
$id = $_GET['id'];
$c = 0;
$query = "DELETE FROM `feedback` WHERE `feedback`.`FEEDBACK_ID`=$id";
print_r($query);
$queryfire = mysqli_query($conn, $query);

echo '<script>alert("Feedback deleted successfully");
	</script>';
header("location:adminfeedback.php");
	
?>