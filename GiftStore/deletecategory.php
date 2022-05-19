<?php 
include('connection.php');
$id = $_GET['id'];
$c = 0;
$query = "DELETE FROM `category` WHERE `category`.`CATEGORY_ID`=$id";
print_r($query);
$queryfire = mysqli_query($conn, $query);

echo '<script>alert("Category deleted successfully");
	</script>';
header("location:admincategory.php");
	
?>