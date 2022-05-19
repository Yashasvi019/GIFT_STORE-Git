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
<h1>Feedback List</h1>
<?php
$query="SELECT FEEDBACK_ID,NAME,PHONE_NUMBER,EMAIL_ID,DATE,MESSAGE FROM feedback";
$queryfire=mysqli_query($conn, $query);
$count = mysqli_num_rows($queryfire);
//print_r($queryfire);
//die;
$product = [];
echo "<br>";
?>
<table id="example" style="margin-left: 150px;width: 80%;height:200px;">
<?php

echo "<thead>";
echo "<tr>";
echo "<th>FEEDBACK_ID</th>";
echo "<th>EMAIL_ID</th>";
echo "<th>NAME</th>";
echo "<th>PHONE_NUMBER</th>";
echo "<th>DATE</th>";
echo "<th>MESSAGE</th>";
echo "<th>DELETE</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while( $product = mysqli_fetch_assoc($queryfire)) {
echo "<br>";	  
echo "<tr class='row'>";
	echo "<td>".$product['FEEDBACK_ID']."</td>";
	echo "<td>".$product['EMAIL_ID']."</td>";
	echo "<td>".$product['NAME']."</td>";
	echo "<td>".$product['PHONE_NUMBER']."</td>";
	echo "<td>".$product['DATE']."</td>";
	echo "<td>".$product['MESSAGE']."</td>";
	$fid=$product['FEEDBACK_ID'];
	echo "<td><a href='deletefeedback.php?id=$fid'><i class='fas fa-times'></i></td>";
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



