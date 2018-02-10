<?php
//require '../../api/operations/create.php';
//require '../../api/objects/productBean.php';
require '../util.php';

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
