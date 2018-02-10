<?php

function updateProductView(){
	echo '<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../CSS/stylesheet.css">
</head>
<body>';
	require "navBar.php";
echo '<div class = "container"><h3>Update Product</h3>
	<form method = "post" action = "../controller/updateProductController.php">
		<label for = "product-id">Enter the product id</label><br>
		<input type = "number" name = "product-id" id = "product-id" required><br>
		<label for = "product-quantity">Enter the product quantity</label><br>
		<input type = "number" name = "product-quantity" id = "product-quantity"><br> 
		<label for = "product-price">Enter the product price</label><br>
		<input type = "number" name = "product-price" id = "product-price"><br>
		<input id = "submit-button" type = "submit" value = "update product" name = "update-product">
	</form></div>
</body>
</html>';
}

?>