<?php
	echo '<div id = "nav-bar" class = "nav-bar">
			<div class = "nav-bar-element">';
			echo strtoupper($_SESSION['name']);
			$type;
			if($_SESSION['type'] == "Admin"){
				$type = "admin";
			}else {
				$type = "employee";
			}
			echo '</div>
			<a class = "nav-bar-element" href = "../'.$type.'/addProduct.php"><div>Add Product</div></a>
			<a class = "nav-bar-element" href = "../'.$type.'/updateProduct.php"><div>Update Product</div></a>
			<a class = "nav-bar-element" href = "../'.$type.'/deleteProduct.php"><div>Delete Product</div></a>
			<a class = "nav-bar-element" href = "../'.$type.'/searchProduct.php"><div>Search Product</div></a>
			<form action = "displayProductController.php" method = "post"><input class = "nav-bar-button" type = "submit" name = "display-all" value = "Display All Products"></form>
			<form action = "createInvoice.php" method = "post"><input class = "nav-bar-button" type = "submit" name = "create-invoice" value = "Create Invoice"></form>';
			if($type == "admin"){
				echo '<a class = "nav-bar-element" href = "../'.$type.'/addUser.php"><div>Add user</div></a>';
			}
			echo '<a class = "nav-bar-element" href = "logout.php"><div>Log Out</div></a>
		</div>';

?>