<?php
//require '../../api/operations/delete.php';
//require '../../api/objects/productBean.php';
require '../util.php';
if(isset($_POST['delete-product'])){
//	$product = new Product();
	$product_id = $_POST['product-id']; 
	$json = array();
	$json['product_id'] = $product_id;
	$json = json_encode($json);
	echo postData("http://localhost/restAPI/controller/deleteProductController.php",$json);
}
?>