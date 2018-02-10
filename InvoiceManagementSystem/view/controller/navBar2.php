<?php
	echo '<div id = "nav-bar" class = "nav-bar">
			<div class = "nav-bar-element">';
			echo strtoupper($_SESSION['name']);
			echo '</div>
			<a class = "nav-bar-element" href = "../addProduct.php"><div>Add Product</div></a>
			<a class = "nav-bar-element" href = "../updateProduct.php"><div>Update Product</div></a>
			<a class = "nav-bar-element" href = "../deleteProduct.php"><div>Delete Product</div></a>
			<a class = "nav-bar-element" href = "../searchProduct.php"><div>Search Product</div></a>
			<form action = "../../controller/displayProductController.php" method = "post"><input class = "nav-bar-button" type = "submit" name = "display-all" value = "Display All Products"></form>';
			if($_SESSION['type'] == "Admin"){
				echo '<a class = "nav-bar-element" href = "../addUser.php"><div>Add user</div></a>';
			}
			echo '<a class = "nav-bar-element" href = "../../controller/logout.php"><div>Log Out</div></a>
		</div>';	
?>