<?php 
session_start();
include('connection.php');

$pid=$_POST['pid'];
$quantity=$_POST['quantity'];
$username = $_SESSION['susername'];
if(isset($_POST['pid']) && isset($_POST['quantity'])){
	
	$query="INSERT INTO `cart`(`P_ID`, `U_ID`, `QUANTITY`) 
		VALUES ('$pid','$username','$quantity')";
	$queryfire = mysqli_query($conn, $query);
	
	//print_r($queryfire);
	$data= array();
	if($queryfire){
		$data['success'] = true;
		$data['message'] = "added";
		
	}else{
		$data['success'] = false;
		$data['message'] = "not added";

	}
	echo json_encode($data);

}
?>
