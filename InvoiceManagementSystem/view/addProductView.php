<?php 
function addProductView(){ 
echo '
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../CSS/stylesheet.css">
</head>
<body>';
require 'navBar.php';
echo '<div class = "container"><h3>Add product</h3>
	<form method = "post" action = "../controller/createProductController.php">
		<label for = "product-name">Product Name</label><br>
		<input type = "text" id = "product-name" name = "product-name" required><br>
		<label for = "product-price">Product Price</label><br>
		<input type = "text" id = "product-price" name ="product-price" pattern = "[0-9]*|[0-9]*.[0-9]{2}" required><br>
		<label for = "product-quantity">Product Quantity</label><br>
		<input type = "number" id = "product-quantity" name ="product-quantity" required><br>
		<label for = "quantity-type">Quantity Type</label><br>
		<input type = "text" id = "quantity-type" name ="quantity-type" pattern = "[a-zA-Z]+" required><br>
		<input id = "submit-button" type = "submit" value ="ADD PRODUCT" name = "create-product"><br>
	</form>
	</div>
</body>
</html>';
}
?>