<?php 
include('connection.php');
$id = $_GET['id'];
$c = 0;
$query = "DELETE FROM `homeproducts` WHERE `homeproducts`.`PRODUCT_ID`=$id";
print_r($query);
$queryfire = mysqli_query($conn, $query);

echo '<script>alert("Product deleted successfully");
	</script>';
header("location:adminproducts.php");
	
?>

 