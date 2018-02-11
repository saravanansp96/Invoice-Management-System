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
//require '../../api/operations/update.php';
//require '../../api/objects/productBean.php';
session_start();
if(!isset($_SESSION['id'])&&!isset($_SESSION['type'])){
	header("location: ../../index.php");
}
require '../util.php';
require 'navBar2.php'; 
if(isset($_POST['update-product'])){ 
	if(isset($_POST['product-quantity'])){
		$json['product_quantity'] = $_POST['product-quantity'];
	}
	if(isset($_POST['product-price'])){
		$json['product_price'] = $_POST['product-price'];
	}
	$json['product_id'] = $_POST['product-id'];
	$json = json_encode($json);
	echo postData("http://localhost/restAPI/controller/updateProductController.php",$json);
	echo '<a href = " ">go back</a>';
}
?>
</body>
</html>