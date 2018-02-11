<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("location: ../../index.php");
	}else if($_SESSION['type'] != "Admin"){
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
		<div class = "nav-bar-element"><?php echo strtoupper($_SESSION['name'])  ?></div>
		<a class = "nav-bar-element" href = "addProduct.php"><div>Add Product</div></a>
		<a class = "nav-bar-element" href = "updateProduct.php"><div>Update Product</div></a>
		<a class = "nav-bar-element" href = "deleteProduct.php"><div>Delete Product</div></a>
		<a class = "nav-bar-element" href = "searchProduct.php"><div>Search Product</div></a>
		<form action = "../controller/displayProductController.php" method = "post"><input class = "nav-bar-button" type = "submit" name = "display-all" value = "Display All Products"></form>
		<form action = "../controller/createInvoice.php" method = "post"><input class = "nav-bar-button" type = "submit" name = "create-invoice" value = "Create Invoice"></form>
		<!--<a class = "nav-bar-element" href = "../../api/controller/displayProductController.php" name = "display-all"><div>Display all products</div></a>-->
		<a class = "nav-bar-element" href = "addUser.php"><div>Add user</div></a>
		<a class = "nav-bar-element" href = "../controller/logout.php"><div>Log Out</div></a>
	</div>
	<div>
		<h1>Admin Portal</h1><br>
		<h1>Welcome <?php echo $_SESSION['name'];  ?></h1>
	</div>
</body>
</html>
