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
//require '../../api/operations/create.php';
//require '../../api/objects/productBean.php';
session_start();
if(!isset($_SESSION['id'])&&!isset($_SESSION['type'])){
	header("location: ../../index.php");
}
require '../util.php';
require 'navBar2.php';
if(isset($_POST['create-product'])){
	$json = array();
	$json['product_name'] = $_POST['product-name'];
	$json['product_price'] = $_POST['product-price'];
	$json['product_quantity'] = $_POST['product-quantity'];
	$json['quantity_type'] = $_POST['quantity-type'];
	$json = json_encode($json);
	echo postData("http://localhost/restAPI/controller/addProductController.php",$json);
}
?>
</body>
</html>