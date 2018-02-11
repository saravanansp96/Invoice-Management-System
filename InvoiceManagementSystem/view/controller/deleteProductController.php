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
//require '../../api/operations/delete.php';
//require '../../api/objects/productBean.php';
session_start();
if(!isset($_SESSION['id'])&&!isset($_SESSION['type'])){
	header("location: ../../index.php");
}
require '../util.php';
require 'navBar2.php';
if(isset($_POST['delete-product'])){
//	$product = new Product();
	$product_id = $_POST['product-id']; 
	$json = array();
	$json['product_id'] = $product_id;
	$json = json_encode($json);
	echo postData("http://localhost/restAPI/controller/deleteProductController.php",$json);
}
?>
</body>
</html>