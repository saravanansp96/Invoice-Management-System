<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../CSS/stylesheet.css">
</head>
<body>
<?php
//require '../../api/operations/read.php';
//require '../../api/objects/productBean.php';
session_start();
if(!isset($_SESSION['id'])&&!isset($_SESSION['type'])){
	header("location: ../../index.php");
}
require '../util.php';
require 'navBar2.php';
if(isset($_POST['create-invoice'])){
	$json = postData("http://localhost/restAPI/controller/readProductsController.php",[]);
	$json = json_decode($json,true);
	if($json['status']=="success"){
		$json = $json['product'];
	echo '<div class = "container"><h3>Cart</h3><div class = "display-none" id = "cart-container"></div><h3>Product Details</h3>
		<table id ="table-container">
			<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>';
	for($i = 0; $i < count($json);$i++){
		echo "<tr><td class = \"productDetails-".$json[$i]['product_id']."\">".$json[$i]['product_id']."</td><td class = \"productDetails-".$json[$i]['product_id']."\">".$json[$i]['product_name']."</td><td class = \"productDetails-".$json[$i]['product_id']."\">".$json[$i]['product_price']."</td><td class = \"productDetails-".$json[$i]['product_id']."\">".$json[$i]['product_quantity']."</td><td class = \"productDetails-".$json[$i]['product_id']."\"><input type = \"number\" id = \"quantity-".$json[$i]['product_id']."\" pattern = '[0-9]*'></td><td><input type = \"button\" data-id = \"".$json[$i]['product_id']."\" value = \"ADD TO CART\"></td></tr>";
	}
	echo "</table>";
	}else {
		echo "<h3>No products exists</h3>";
	}
}
echo "</div>";
?>
<script src="../javascripts/application.js" type="text/javascript"></script>
</body>
</html>