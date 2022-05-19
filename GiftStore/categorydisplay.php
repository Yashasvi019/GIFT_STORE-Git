<?php 

include('header.php');
include('connection.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="stylecategorydisplay.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
</head>

<body>
	<div class="catDisplay">
	<h2 class="text">Our Product Categories</h2>
	<center><img class="lineimage" src="image/line1.jpg"></center>
	
	<?php
	
	$query = "SELECT * FROM category";
	$queryfire = mysqli_query($conn, $query);
	$count = mysqli_num_rows($queryfire);
	
	$products = [];
	$i = 0;
	while( $product = mysqli_fetch_assoc($queryfire)) {
		$products[$i]['CATEGORY_ID'] = $product['CATEGORY_ID'];
		$products[$i]['CATEGORY_NAME'] = $product['CATEGORY_NAME'];
		$products[$i]['CATEGORY_IMAGE'] = $product['CATEGORY_IMAGE'];
		$i++;
	}
	
	?>
	
<div class="grid-container1">

	<?php
	
	if($count>0){
        foreach( $products as $product) {
			
			$cid=$product['CATEGORY_ID'];
			$cname=$product['CATEGORY_NAME'];
	?>
			<div class="grid-item1">
			
			<a href="giftbycategory.php?id=<?php echo $cid; ?>">
			<img src="<?php echo $product['CATEGORY_IMAGE'];?>"></img>
            <hr align = "center">
            <h3><?php echo $product['CATEGORY_NAME'];?></h3>
			</a>
			</div>
<?php   } 
	}
	?> 
	
</div>
</div>
</body>
</html>