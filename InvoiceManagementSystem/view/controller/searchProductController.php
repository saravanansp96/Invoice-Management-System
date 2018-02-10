<?php
//require '../../api/operations/read.php';
//require '../../api/objects/productBean.php';
require '../util.php'; 
if(isset($_POST['search-product'])){
	$product_id = $_POST['product-id']; 
	$json = array();
	$json['product_id'] = $product_id;
	$json = json_encode($json);
	echo postData("http://localhost/restAPI/controller/readProductsController.php",$json);
}
?>