<?php 
include('connection.php');
$id = $_GET['id'];
$c = 0;
$query = "DELETE FROM `users` WHERE `users`.`USER_ID`=$id";
print_r($query);
$queryfire = mysqli_query($conn, $query);

echo '<script>alert("User deleted successfully");
	</script>';
header("location:adminusers.php");
	
?>

 