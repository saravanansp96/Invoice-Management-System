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
if(isset($_POST['display-all'])){
	$json = postData("http://localhost/restAPI/controller/readProductsController.php",[]);
	$json = json_decode($json,true);
	if($json['status']=="success"){
		$json = $json['product'];
	echo '<div class = "container"><h3>Product Details</h3>
		<table>
			<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>';
	for($i = 0; $i < count($json);$i++){
		if($json[$i]['product_quantity']>0){
		echo "<tr><td>".$json[$i]['product_id']."</td><td>".$json[$i]['product_name']."</td><td>".$json[$i]['product_price']."</td><td>".$json[$i]['product_quantity'].$json[$i]['quantity_type']."</td><tr>";
	}
	}
	echo "</table>";
	}else {
		echo "<h3>No products exists</h3>";
	}
}
echo "</div>"
?>
</body>
</html>