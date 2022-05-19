<?php 
include('connection.php');
$id = $_GET['id'];
$c = 0;
$query = "DELETE FROM `booking` WHERE `booking`.`BOOKING_ID`=$id";
print_r($query);
$queryfire = mysqli_query($conn, $query);

echo '<script>alert("Booking deleted successfully");
	</script>';
header("location:adminbooking.php");
	
?>