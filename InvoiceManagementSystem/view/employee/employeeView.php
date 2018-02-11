<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("location: ../../index.php");
	}else if($_SESSION['type'] != "Employee"){
			header("location: ../../index.php");
		}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="../CSS/stylesheet.css">
</head>
<body>
	<div id = "nav-bar" class = "nav-bar">
		<div class = "nav-bar-element"><?php echo strtoupper($_SESSION['name']);  ?></div>
		<a class = "nav-bar-element" href = "addProduct.php"><div>Add Product</div></a>
		<a class = "nav-bar-element" href = "updateProduct.php"><div>Update Product</div></a>
		<a class = "nav-bar-element" href = "deleteProduct.php"><div>Delete Product</div></a>
		<a class = "nav-bar-element" href = "searchProduct.php"><div>Search Product</div></a>
		<form action = "../controller/displayProductController.php" method = "post"><input class = "nav-bar-button" type = "submit" name = "display-all" value = "Display All Products"></form>
		<form action = "../controller/createInvoice.php" method = "post"><input class = "nav-bar-button" type = "submit" name = "create-invoice" value = "Create Invoice"></form>
		<a class = "nav-bar-element" href = "../controller/logout.php"><div>Log Out</div></a>
	</div>
	<div class = "container">
		<h2>ABC SUPER MARKET</h2>
		<h3>Employee Portal</h3>
		<h3>Welcome <?php echo $_SESSION['name'];  ?></h3>
		<h4>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</h4>
	</div>
</body>
</html>
