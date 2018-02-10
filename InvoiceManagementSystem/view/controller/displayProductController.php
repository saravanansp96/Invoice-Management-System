<?php
//require '../../api/operations/read.php';
//require '../../api/objects/productBean.php';
require '../util.php';

if(isset($_POST['display-all'])){
	$json = postData("http://localhost/restAPI/controller/readProductsController.php",[]);
	$json = json_decode($json,true);
	if($json['status']=="success"){
		$json = $json['product'];
	echo '<h3>Product Details</h3>
		<table>
			<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Quantity</th>
			</tr>';
	for($i = 0; $i < count($json);$i++){
		echo "<tr><td>".$json[$i]['product_id']."</td><td>".$json[$i]['product_name']."</td><td>".$json[$i]['product_price']."</td><td>".$json[$i]['product_quantity'].$json[$i]['quantity_type']."</td><tr>";
	}
	echo "</table>";
	}else {
		echo "<h3>No products exists</h3>";
	}
}
?>