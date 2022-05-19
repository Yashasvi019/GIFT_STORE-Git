<?php 
include('header.php');
include('userloginvalidation.php');
if(!verifyuser())
{
	echo '<script> alert(" first login!"); 
		window.location.href="userlogin.php";
	</script>';
}
//session_start();
include('connection.php');
include('logologout.php');
$cgid=$_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="stylegiftbycategory.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<script src="https://kit.fontawesome.com/yourcode.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital@1&display=swap" rel="stylesheet">
</head>

<body>
<?php 
	$query = "SELECT `CATEGORY_NAME` FROM category where CATEGORY_ID='$cgid'";
	$queryfire = mysqli_query($conn, $query);
	$data=mysqli_fetch_assoc($queryfire);
	//print_r($data);
	$cgname=$data['CATEGORY_NAME'];
	?>
	<div class="prdtDisplay">
	<h2 class="text1">Our Products</h2>
	<center><img class="lineimage" src="image/line2.png"></center>
	<h2 class="text2"><?php echo $cgname ?><i class="far fa-grin-wink"></i></h2>
	<hr class = "cat_hr" align="center">
	<?php
	
	$query = "SELECT * FROM homeproducts where CATEGORY_ID='$cgid'";
	$queryfire = mysqli_query($conn, $query);
	$count = mysqli_num_rows($queryfire);
	
	$products = [];
	$i = 0;
	while( $product = mysqli_fetch_assoc($queryfire)) {
		$products[$i]['PRODUCT_ID'] = $product['PRODUCT_ID'];
		$products[$i]['NAME'] = $product['NAME'];
		$products[$i]['DESCRIPTION'] = $product['DESCRIPTION'];
		$products[$i]['IMAGE'] = $product['IMAGE'];
		$products[$i]['PRICE'] = $product['PRICE'];
		$products[$i]['DISCOUNT'] = $product['DISCOUNT'];
		$products[$i]['QUANTITY'] = $product['QUANTITY'];
		$i++;
		//print_r("<pre>");
		//print_r($product);
		//print_r("</pre>");
	}
	?>
	
<div class="grid-contain">

	<?php
	
	if($count>0){
        foreach( $products as $product) {
			$pid=$product['PRODUCT_ID'];
	?>
			<div class="grid-items">
		
			<img src="<?php echo $product['IMAGE'];?>"></img>
			
            <h3><?php echo $product['NAME'];?></h3>
			<hr align = "center">

			<p class="description"><?php echo $product['DESCRIPTION'];?></p>
			<p class="prd"><span class="price"><?php echo "₹".$product['PRICE'];?></span>
			<span class="discount"><?php echo $product['DISCOUNT']."%";?></span>
			<?php 	
					$price=$product['PRICE'];
					$discount=$product['DISCOUNT'];
					$newPrice=$price-(($price*$discount)/100.0);
			?>
			<span class="newprice"><?php echo "₹".$newPrice;?></p>
			
			<div>
			<div class="Qty">
			
			  <label for="quantity">Quantity:</label>
			  <input type="number" id="quantity" name="quantity" min="1" value="1">
			
			
			<button class="bttn" type="button" name="addtocart" id="add_cart" value = "<?php echo $pid ?>">Add to Cart</button>			
			<button class="bttn" type="submit" name="buynow">Buy Now</button>
			</div>
			<div class="heart">
			<a href="addtowhislist.php?id=<?php echo $pid; ?>" >
			<i class="far fa-heart"></i></a>
			<i class="fas fa-heart"></i>
			</div>
			
			</div>
			</div>		
			
<?php   } 
	}
	else {
		echo "NO PRODUCTS AVIALABLE";
	}
	?> 
	
</div>
</div>
	
	<script type="text/javascript">
	
		$(document).ready(function(){
			
			$('.bttn').click(function(){
				
				var product_id = this.value;
				
				var quantity = $("#quantity").val();
				
				console.log(product_id);
				console.log(quantity);
				
				$.ajax({
					url:'addtocart.php',
					type: 'POST',
					data:  {pid:product_id,quantity:quantity},
					dataType: 'json',
					success: function(result){
						alert(result['message']);
						//console.log(data['message']);
						
					}
				});
			
			});
			
		});
			
	</script>		


</body>
</html>