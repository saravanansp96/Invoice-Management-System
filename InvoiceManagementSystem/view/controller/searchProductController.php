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
if(isset($_POST['search-product'])){
	$product_id = $_POST['product-id']; 
	$json = array();
	$json['product_id'] = $product_id;
	$json = json_encode($json);
	$response = json_decode(postData("http://localhost/restAPI/controller/readProductsController.php",$json),true);
	echo '<div class = "container">';
	if($response['status'] == "success"){
		echo '<h3>Product Details</h3>';
		echo '<table><tr><td><h3>Product Id: </h3></td><td><h3>'.$response['product'][0]['product_id'].'</h3></td></tr>';
		echo '<tr><td><h3>Product Name: </h3></td><td><h3>'.$response['product'][0]['product_name'].'</h3></td></tr>';
		echo '<tr><td><h3>Product Price</h3></td><td><h3>'.$response['product'][0]['product_price'].'</h3></td></tr>';
		echo '<tr><td><h3>Product Quantity</h3></td><td><h3>'.$response['product'][0]['product_quantity'].'</h3></td></tr></table>';
	}else {
		echo '<h3>No such Product Exists</h3>';
	}
	echo '</div>';
}
?>
</body>
</html>