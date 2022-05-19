<?php include('connection.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="styleproduct.css">

</head>

<body class="container">

<h1> Products Available! :) </h1>
<?php

$query = "SELECT `NAME`, `IMAGE`, `PRICE` FROM homeproducts ORDER BY 'PRODUCT_ID' ASC";

$queryfire = mysqli_query($conn, $query);

$count = mysqli_num_rows($queryfire);
//print_r(mysqli_fetch_assoc($queryfire));

$products = [];
$i = 0;
while( $product = mysqli_fetch_assoc($queryfire)) {
    $products[$i]['IMAGE'] = $product['IMAGE'];
    $products[$i]['NAME'] = $product['NAME'];
    $products[$i]['PRICE'] = $product['PRICE'];
    $i++;
}
?>
<div class="container-fluid">
        <div class="row">
<?php
    if($count>0){
        foreach( $products as $product) {
        ?>
            <div class="col-lg-4 col-md-3 col-12">
                <div class="card">
                    <img src="<?php echo $product['IMAGE'];?>"></img>
                    <hr align = "center">
                    <h3><?php echo $product['NAME'];?></h3>
                    <p class="price"><?php echo "Rs. ".$product['PRICE'];?></p>
                    <p class="btn"><button>Add to Cart</button></p>
                </div>
            </div>
<?php   } ?>

        </div>
</div>
<?php   } ?>
</body>
</html>