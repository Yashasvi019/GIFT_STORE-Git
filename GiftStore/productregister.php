<?php include('connection.php') ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styleproductregister.css">
</head>
 
<body>
<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			$productname = $_POST["productname"];
			$description = $_POST["description"];
			//$productimage = $_POST["productimage"];
			$price = $_POST["price"];
			$discount = $_POST["discount"];
			$quantity = $_POST["quantity"];

			
			$target_dir = "image/";
			$target_file = $target_dir . basename($_FILES["productimage"]["name"]);
			$uploadOk = 1;
			
			if (move_uploaded_file($_FILES["productimage"]["tmp_name"], $target_file)) {
				echo "<center><i><h4>The file ". $target_file . " has been uploaded.</h4></i></center>";
				$productimage = $target_file;
			}
			
			if(!empty($_POST['category'])) {
				$cgname = $_POST['category'];
			} else {
				echo 'Please select the category.';
			}
				//		print_r($cgname);

			//$q = "SELECT * FROM `category` WHERE CATEGORY_NAME='$cgname'";
			//$qf = mysqli_query($conn, $q);
			//$data = mysqli_fetch_assoc($qf);
			//$categoryid=$data['CATEGORY_ID'];
			//print_r($q);
			//print_r($qf);
			//print_r($data);
			//print_r($categoryid);

			$query = "INSERT INTO homeproducts(NAME, DESCRIPTION, IMAGE, CATEGORY_ID, PRICE, DISCOUNT, QUANTITY)
                                VALUES ('$productname','$description', '$productimage', '$cgname', '$price', '$discount', '$quantity')";
			if ($conn->query($query) === TRUE) {
				 echo '<script>alert("Product added successfully");
				window.location="adminproducts.php";
				 </script>';
			} else {
				 echo "Error: " . "<br>" . $conn->error;
			}
	}
 ?>
 
 <?php  
 $productname = $productimage = $discount = $price = "";
 ?>
 <div class="main">
 <table>
<tr><td><h2> ADD NEW PRODUCTS </h2> </td></tr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

     <div>
  	 <tr>
	 <td> <label class="label">Name</label></td>
  	 <td><input class = "input" type="text" placeholder="Enter Product Name" name="productname" value="<?php echo $productname; ?>" required></td></tr>
  	 </div>
  	 </br>

    <div>
  	  <tr>
	 <td> <label class="label">Image</label> </td>
  	 <td> <input class = "img" type="file" placeholder="Upload Product Image" name="productimage" id="productimage" value="<?php echo $productimage; ?>" accept="image/x-png,image/jpeg" required> </td></tr>
     </div>
    </br>
	
	<div>
	<?php 
			$count=0;
			$query = "SELECT `CATEGORY_ID`,`CATEGORY_NAME` FROM category";

			$queryfire = mysqli_query($conn, $query);

			$count = mysqli_num_rows($queryfire);
			$products = [];
			$i = 0;
			while( $product = mysqli_fetch_assoc($queryfire)) {
				$products[$i]['CATEGORY_ID'] = $product['CATEGORY_ID'];
				$products[$i]['CATEGORY_NAME'] = $product['CATEGORY_NAME'];
				$i++;
			}
			
		?>
  	  <tr>
	 <td> <label class="label">Category</label> </td>
  	  <td> <select class="categories" name="category" required>

		<?php 
		foreach( $products as $product) {
		?>
	  	  <option value="<?php echo $product['CATEGORY_ID'];?>"><?php echo $product['CATEGORY_NAME'];?></option>
		<?php  } ?>
	  </select> </td></tr>
     </div>
    </br>
	
	<div>
  	  <tr>
	 <td> <label class = "label">Description</label></td>
	<td><textarea  class = "form" rows=5 cols=100 placeholder="Enter description of product" name="description"></textarea></td></tr>
	 </div>
	 </br>
	
	
     <div>
  	  <tr>
	 <td> <label class="label">Price</label> </td>
  	 <td> <input class = "input" type="text" placeholder="Enter Price" name="price" value="<?php echo $price; ?>" required> </td></tr>
  	 </div>
    </br>
	
	<div>
  	 <tr>
	 <td>  <label class="label">Discount</label> </td>
  	 <td> <input class = "input" type="text" placeholder="Enter Discount" name="discount" value="<?php echo $discount; ?>" required> </td></tr>
  	 </div>
    </br>
	
	<div>
  	 <tr>
	 <td>  <label class="label">Quantity</label> </td>
  	 <td> <input class = "input" type="number" placeholder="Enter Quantity" name="quantity" value="<?php echo $quantity; ?>" required> </td></tr>
  	 </div>
    </br>
	
  	 <div>
  	  <tr><td><button class="button" type="submit" class="btn" name="add_product">Add Product</button></td>
		<td><button class="bttn" type="submit" class="btn" name="add_category"><a href="categoryregister.php">Add Category</button></td></tr>
  	 </div>
</form>
</table>
</div>
</body>
</html>