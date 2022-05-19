<?php include('connection.php') ?>
<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" type="text/css" href="stylecategoryregister.css">

 </head>
 

<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			$categoryname = $_POST["categoryname"];
			
			$target_dir = "image/";
			$target_file = $target_dir . basename($_FILES["categoryimage"]["name"]);
			$uploadOk = 1;
			
			if (move_uploaded_file($_FILES["categoryimage"]["tmp_name"], $target_file)) {
			echo "<center><i><h4>The file ". $target_file . " has been uploaded.</h4></i></center>";
			$categoryimage = $target_file;
			}

			$query = "INSERT INTO category(CATEGORY_NAME,CATEGORY_IMAGE)
                                VALUES ('$categoryname','$categoryimage')";
                    if ($conn->query($query) === TRUE) {
                         echo '<script>alert("Category added successfully");
						window.location="admincategory.php";
						 </script>';
                    } else {
                         echo "Error: " . "<br>" . $conn->error;
                    }
	}
 ?>
 
 <?php  $categoryname = "";
 ?>
 <div class="main">
 <table>
<tr><td><h2> ADD NEW CATEGORIES </h2> </td></tr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

      <div>
  	 <tr>
	 <td> <label class="label">Category Name</label></td>
  	 <td><input class = "input" type="text" placeholder="Enter Category Name" name="categoryname" value="<?php echo $categoryname; ?>" required></td></tr>
  	 </div>
  	 </br>
	 
	 <div>
  	 <tr>
	 <td> <label class="label">Category Image</label></td>
  	 <td><input class = "img" type="file" placeholder="Upload Category Image" name="categoryimage" value="<?php echo $categoryimage; ?>" accept="image/x-png,image/jpeg" required></td></tr>
  	 </div>
  	 </br>
	
  	 <div>
  	  <tr><td><button class="button" type="submit" class="btn" name="add_category">Add category</button></td>
  	 </div>
</form>
</table>
</div>
</body>
</html>
