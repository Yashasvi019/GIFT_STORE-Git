<?php 
session_start();
include('header.php');
include('connection.php');
include('logologout.php');

?>


<!DOCTYPE html>
<html>
<head>
    <title></title>
	
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>

<body>
	<div>
	<h2 class="text1">Your Cart</h2>
	<hr align="center">
	<a href="clearcart.php">Remove All Items</a>
	<br>
	<br>
	</div>
<?php
//$q1="SELECT `CART_ID`, `P_ID`, `U_ID`, `QUANTITY` FROM `cart`";
//$queryfire=mysqli_query($conn, $query);
//$count = mysqli_num_rows($queryfire);
print_r($_SESSION['susername']);
die;
//$product = [];
echo "<br>";
?>	
	
<table style="margin-left: 150px;width: 80%;height:200px;">
<?php
echo "<thead>";
echo "<tr>";
echo "<th>NAME</th>";
echo "<th>IMAGE</th>";
echo "<th>ITEM PRICE</th>";
echo "<th>QUANTITY</th>";
echo "<th>PRICE</th>";
echo "<th>REMOVE</th>";	
echo "</tr>";
echo "</thead>";

echo "<tbody>";

echo "<br>";
	  
echo "<tr>";
	echo "<td>".$pid."</td>";
	echo "<td>".$pid."</td>";
	echo "<td>".$pid."</td>";
	echo "<td>".$pid."</td>";
	echo "<td>".$pid."</td>";
	echo "<td><a href='deletecartitem.php?id=$pid'><i class='fas fa-times'></i></td>";
echo "</tr>";

echo "</tbody>";

?>
</table>
</body>
</html>