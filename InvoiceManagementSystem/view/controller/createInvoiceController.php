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
session_start();
if(!isset($_SESSION['id'])&&!isset($_SESSION['type'])){
	header("location: ../../index.php");
}
require '../util.php';
//require 'navBar2.php';

if($_POST['create-invoice']) {
	$json = $_POST['data'];
	$response = json_decode(postData("http://localhost/restAPI/controller/createInvoiceController.php",$json),true);
	//var_dump($response);
	if($response['status'] == "success") {
		echo '<div class = "invoice-container" ><h3>ABC SUPER MARKET</h3>
		<h3>INVOICE</h3>
		<p>'.date("d/m/Y").'</p>
		<p>'.date("h:i:sa").'</p>';
		$invoice = $response['invoice']['product'];
		$i = 0;
		echo '<table class="invoiceTable"><th>PRODUCT NAME</th><th>UNIT PRICE</th><th>PRODUCT QUANTITY</th><th>AMOUNT</th>';
		while($i < count($invoice)){
			echo "<tr><td>".$invoice[$i]['product_name'] ."</td><td>". $invoice[$i]['product_price'] . "</td><td>" . $invoice[$i]['product_quantity'] ."</td><td>".$invoice[$i]['product_quantity']*$invoice[$i]['product_price']."</td></tr>";
			$i++;
		}
		echo "</table><h3>total:".$response['invoice']['total_amount']."</h3><a href = \"createInvoice.php\">go back</a></div>";
	}
}

?>
<input type = "button" value = "PRINT" onclick = "printInvoice()">
<script src="../javascripts/application.js" type="text/javascript"></script>
</body>
</html>