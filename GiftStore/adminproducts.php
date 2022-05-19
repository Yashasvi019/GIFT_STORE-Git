<?php 
session_start();
include('header.php');
include('connection.php');

include('adminnav.php');
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script src = "https://code.jquery.com/jquery-3.5.1.js" ></script>
	<script src = "https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" ></script>
	<script src = "https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" ></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" ></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>
	<script src = "https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" ></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="styleadminproducts.css">
<head>


<body>	

<div class="container">
<h1>Products List</h1>
<?php
$query="SELECT homeproducts.PRODUCT_ID, homeproducts.NAME, homeproducts.DESCRIPTION, category.CATEGORY_NAME, 
		homeproducts.IMAGE, homeproducts.PRICE, homeproducts.DISCOUNT, homeproducts.QUANTITY 
		FROM homeproducts INNER JOIN category ON homeproducts.CATEGORY_ID=category.CATEGORY_ID;";
$queryfire=mysqli_query($conn, $query);
$count = mysqli_num_rows($queryfire);
//print_r($queryfire);
$product = [];
echo "<br>";
?>
<p class="page">
  		Want to add more products? <a href="productregister.php">Click Here!</a>
  	</p>

<table id="example" style="margin-left: 150px;width: 80%;height:200px;">
<?php

echo "<thead>";
echo "<tr>";
echo "<th>PRODUCT_ID</th>";
echo "<th>NAME</th>";
echo "<th>CATEGORY</th>";
echo "<th>IMAGE</th>";
echo "<th>DESCRIPTION</th>";
echo "<th>PRICE</th>";
echo "<th>DISCOUNT</th>";
echo "<th>QUANTITY</th>";
echo "<th>DELETE</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while( $product = mysqli_fetch_assoc($queryfire)) {
echo "<br>";	  
echo "<tr class='row'>";
	echo "<td>".$product['PRODUCT_ID']."</td>";
	echo "<td>".$product['NAME']."</td>";
	echo "<td>".$product['CATEGORY_NAME']."</td>";
	echo "<td>"."<img src = ".$product['IMAGE']." width=150 height=100>"."</td>";
	echo "<td>".$product['DESCRIPTION']."</td>";
	echo "<td>".$product['PRICE']."</td>";
	echo "<td>".$product['DISCOUNT']."</td>";
	echo "<td>".$product['QUANTITY']."</td>";
	$pid=$product['PRODUCT_ID'];
	echo "<td><a href='deleteproduct.php?id=$pid'><i class='fas fa-times'></i></td>";
echo "</tr>";
}
?>
</table>


<script style="margin-left: 150px;">
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>

</div>
</body>
</html>



