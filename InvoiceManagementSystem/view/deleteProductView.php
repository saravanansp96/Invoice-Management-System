<?php 
function deleteProductView(){
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
echo '<div class = "container"><h3>Delete Product</h3>
	<form method = "post" action = "../controller/deleteProductController.php">
		<label for = "product-id">Enter the product id</label><br>
		<input type = "number" name = "product-id" id = "product-id" required><br>
		<input id = "submit-button" type = "submit" value = "delete product" name = "delete-product">
	</form>
	</div>
</body>
</html>';
}
?>