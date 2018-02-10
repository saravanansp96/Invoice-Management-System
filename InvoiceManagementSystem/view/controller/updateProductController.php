<?php
//require '../../api/operations/update.php';
//require '../../api/objects/productBean.php';
require '../util.php'; 
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